<?php
namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuestionnaireController extends Controller
{
    public function index()
    {
       
        return view('user.questionnaires-index');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'interests' => 'required|array',
            'interests.*' => 'required',
        ]);

        $user = Auth::user();
        $user->interests = $request->interests;
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Interests saved successfully.');
    }

    public function showMatches()
    {
        $user = Auth::user();
        $userInterests = $user->interests; // This should be an array due to casting

        // Get all coaches (users with role 'coach')
        $coaches = User::where('role', 'coach')->get();
        $matches = [];

        foreach ($coaches as $coach) {
            $coachInterests = $coach->interests; // This should be an array due to casting

            // Flatten the interests arrays for comparison
            $flatUserInterests = $this->flattenInterests($userInterests);
            $flatCoachInterests = $this->flattenInterests($coachInterests);

            // Calculate shared interests
            $sharedInterests = array_intersect($flatUserInterests, $flatCoachInterests);
            $percentage = (count($sharedInterests) / count($flatUserInterests)) * 100;
            $matches[] = [
                'coach' => $coach,
                'percentage' => $percentage,
            ];
        }

        // Sort matches by percentage descending
        usort($matches, function($a, $b) {
            return $b['percentage'] <=> $a['percentage'];
        });

        return view('user.matches-show', compact('matches'));
    }

    private function flattenInterests($interests)
    {
        $flat = [];
        if (!is_null($interests)) {
            array_walk_recursive($interests, function($item) use (&$flat) {
                $flat[] = $item;
            });
        }
        return $flat;
    }

    public function matchCoach(User $coach)
    {
        $user = Auth::user();
        $user->matched_coach_id = $coach->id;
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'You have been matched with a coach!');
    }



    public function edit($id)
    {
        $questionnaire = Questionnaire::with('questions')->findOrFail($id);
        return view('admin.questionnaires-edit', compact('questionnaire'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions' => 'required|array',
            'questions.*' => 'required|string',
        ]);

        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $questionnaire->questions()->delete();
        foreach ($request->questions as $questionText) {
            $questionnaire->questions()->create(['question_text' => $questionText]);
        }

        return redirect()->route('admin.questionnaires-list')->with('success', 'Questionnaire updated successfully.');
    }

    public function destroy($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->delete();

        return redirect()->route('questionnaires.list')->with('success', 'Questionnaire deleted successfully.');
    }

    public function show()
    {
        

        return view('user.questionnaires-list');
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'answers.*' => 'required|string'
        ]);

        // Process form submission
        foreach ($validatedData['answers'] as $questionId => $answer) {
            // Save answer to the database
            // Example: \App\Models\Answer::create([
            //     'question_id' => $questionId,
            //     'user_id' => auth()->id(),
            //     'answer' => $answer
            // ]);
        }

        return redirect()->route('user.questionnaires')->with('success', 'Your answers have been submitted!');
    }
}

