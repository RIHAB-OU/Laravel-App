<?php

namespace Chatify\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MessagesController extends Controller
{
    protected $perPage = 30;

    /**
     * Authentifie la connexion pour Pusher.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function pusherAuth(Request $request)
    {
        return Chatify::pusherAuth(
            $request->user(),
            Auth::user(),
            $request->input('channel_name'),
            $request->input('socket_id')
        );
    }

    /**
     * Retourne la vue de l'application avec les données requises.
     *
     * @param int|null $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id = null)
    {
        $messengerColor = Auth::user()->messenger_color;
        return view('Chatify::pages.app', [
            'id' => $id ?? 0,
            'messengerColor' => $messengerColor ?? Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }

    /**
     * Récupère les données (utilisateur, favori, etc.).
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function idFetchData(Request $request)
    {
        $favorite = Chatify::inFavorite($request->input('id'));
        $fetch = User::find($request->input('id'));
        $userAvatar = $fetch ? Chatify::getUserWithAvatar($fetch)->avatar : null;

        return Response::json([
            'favorite' => $favorite,
            'fetch' => $fetch,
            'user_avatar' => $userAvatar,
        ]);
    }

    /**
     * Crée des liens pour que les pièces jointes soient téléchargeables.
     *
     * @param string $fileName
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|void
     */
    public function download($fileName)
    {
        $filePath = config('chatify.attachments.folder') . '/' . $fileName;
        if (Chatify::storage()->exists($filePath)) {
            return Chatify::storage()->download($filePath);
        }
        return abort(404, "Désolé, le fichier n'existe pas sur notre serveur ou a peut-être été supprimé !");
    }

    /**
     * Envoie un message à la base de données.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request)
    {
        // Variables par défaut
        $error = (object) ['status' => 0, 'message' => null];
        $attachment = null;
        $attachmentTitle = null;

        // S'il y a une pièce jointe [fichier]
        if ($request->hasFile('file')) {
            // Extensions autorisées
            $allowedImages = Chatify::getAllowedImages();
            $allowedFiles = Chatify::getAllowedFiles();
            $allowed = array_merge($allowedImages, $allowedFiles);

            $file = $request->file('file');
            // Vérifier la taille du fichier
            if ($file->getSize() < Chatify::getMaxUploadSize()) {
                if (in_array(strtolower($file->extension()), $allowed)) {
                    // Obtenir le nom de la pièce jointe
                    $attachmentTitle = $file->getClientOriginalName();
                    // Télécharger la pièce jointe et stocker le nouveau nom
                    $attachment = Str::uuid() . "." . $file->extension();
                    $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));
                } else {
                    $error->status = 1;
                    $error->message = "Extension de fichier non autorisée !";
                }
            } else {
                $error->status = 1;
                $error->message = "La taille du fichier que vous essayez de télécharger est trop grande !";
            }
        }

        if (!$error->status) {
            $message = Chatify::newMessage([
                'from_id' => Auth::user()->id,
                'to_id' => $request->input('id'),
                'body' => htmlentities(trim($request->input('message')), ENT_QUOTES, 'UTF-8'),
                'attachment' => ($attachment) ? json_encode((object) [
                    'new_name' => $attachment,
                    'old_name' => htmlentities(trim($attachmentTitle), ENT_QUOTES, 'UTF-8'),
                ]) : null,
            ]);
            $messageData = Chatify::parseMessage($message);
            if (Auth::user()->id != $request->input('id')) {
                Chatify::push("private-chatify." . $request->input('id'), 'messaging', [
                    'from_id' => Auth::user()->id,
                    'to_id' => $request->input('id'),
                    'message' => Chatify::messageCard($messageData, true)
                ]);
            }
        }

        // Envoyer la réponse
        return Response::json([
            'status' => '200',
            'error' => $error,
            'message' => Chatify::messageCard($messageData ?? null),
            'tempID' => $request->input('temporaryMsgId'),
        ]);
    }

    // Les autres méthodes restent inchangées pour des raisons de lisibilité et de concision.
}
