<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\CoachController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\ChatifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['web', 'auth'])->prefix('chatify')->namespace('Chatify\Http\Controllers')->group(function () {
    Route::post('/send-message', [ChatifyController::class, 'sendMessage'])->name('send.message');
});

    Route::post('/pusher/auth', [MessagesController::class, 'pusherAuth'])->name('pusher.auth');

Route::post('/avatar/update', [MessagesController::class, 'updateSettings'])->name('avatar.update');


Route::get('/', [HomeController::class, 'index']);

// USER DASHBOARD
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('user/goals', [GoalController::class, 'index'])->name('user.goals');
    Route::get('user/goal/create', [GoalController::class, 'create'])->name('user.create');
    Route::post('user/goals/store', [GoalController::class, 'store'])->name('goals.store');
    Route::get('user/goals/{goal}/edit', [GoalController::class, 'edit'])->name('goals.edit');
    Route::put('user/goals/{goal}', [GoalController::class, 'update'])->name('goals.update');
    Route::delete('user/goals/{goal}', [GoalController::class, 'delete'])->name('goals.destroy');

    Route::get('user/achievements', [AchievementController::class, 'index'])->name('user.achievements');
    Route::get('user/create-achievements', [UserController::class, 'createAchievements'])->name('user.create-achievements');
    Route::post('user/achievements/store', [AchievementController::class, 'store'])->name('achievements.store');
    Route::get('user/achievements/{achievement}/edit', [AchievementController::class, 'edit'])->name('achievements.edit');
    Route::put('user/achievements/{achievement}', [AchievementController::class, 'update'])->name('achievements.update');
    Route::delete('user/achievements/{achievement}', [AchievementController::class, 'destroy'])->name('achievements.destroy');

    // User Subscriptions
    Route::get('user/subscriptions/list', [UserController::class, 'subscriptionsList'])->name('user.subscriptions.list');
    Route::post('/subscription/subscribe/{subscription}', [UserController::class, 'subscribe'])->name('subscription.subscribe');





    //Route::post('/subscribe/{package}', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
    Route::get('/my-subscription', [SubscriptionController::class, 'mySubscription'])->name('subscription.my');

    Route::get('/user/sessions/upcoming', [SessionController::class, 'upcomingSessions'])->name('user.sessions.upcoming');
    Route::get('/user/sessions/past', [SessionController::class, 'pastSessions'])->name('user.sessions.past');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/profile/edit', [UserController::class, 'editProfile'])->name('user.edit');
    Route::post('/user/profile/edit', [UserController::class, 'updateProfile'])->name('user.update');
    Route::get('/user/password/change', [UserController::class, 'changePassword'])->name('user.password.change');
    Route::get('/user/questionnaires/list', [QuestionnaireController::class, 'index'])->name('user.questionnaires.list');
    Route::post('/user/questionnaires/store', [QuestionnaireController::class, 'store'])->name('user.questionnaires.store');

    Route::get('/user/matches', [QuestionnaireController::class, 'showMatches'])->name('matches.show');
    Route::post('/user/matches/{coach}', [QuestionnaireController::class, 'matchCoach'])->name('matches.match');

});

// ADMIN DASHBOARD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/users/list', [AdminController::class, 'users_list'])->name('users.list');
    Route::get('admin/coachs/list', [AdminController::class, 'coachs_list'])->name('coachs.list');
    Route::get('admin/subscriptions/edit', [AdminController::class, 'subscriptions_edit'])->name('subscriptions.edit');
    Route::get('admin/subscriptions/list', [AdminController::class, 'subscriptions_list'])->name('subscriptions.list');
    Route::get('admin/subscriptions/add', [AdminController::class, 'subscriptions_add'])->name('subscriptions.add');
    Route::put('/subscriptions/{subscription}', [AdminController::class, 'subscriptions_update'])->name('subscriptions.update');

    Route::put('admin/subscriptions/edit', [AdminController::class, 'subscriptions_edit'])->name('subscriptions.edit');
    Route::delete('admin/subscriptions/{id}', [AdminController::class, 'destroy'])->name('subscriptions.destroy');

    
    Route::post('admin/subscriptions/store', [AdminController::class, 'subscriptions_store'])->name('subscriptions.store');
    Route::delete('user/subscriptions/{subscription}', [AdminController::class, 'destroy'])->name('subscriptions.destroy');
    Route::get('admin/sessions/list', [SessionController::class, 'index'])->name('sessions.list');
    Route::get('admin/sessions/add', [SessionController::class, 'create'])->name('sessions.add');
    Route::post('/admin/sessions/store', [SessionController::class, 'store'])->name('sessions.store');

    Route::delete('/admin/sessions/{id}/destroy', [SessionController::class, 'destroy'])->name('sessions.destroy');


    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.edit');
    Route::post('admin/profile/edit', [AdminController::class, 'update'])->name('admin.update');

    Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.update.user');
    Route::delete('admin/users/{user}', [AdminController::class, 'destroy'])->name('delete');

    Route::get('admin/questionnaires/list', [QuestionnaireController::class, 'index'])->name('questionnaires.index');
    Route::get('admin/questionnaires/create', [QuestionnaireController::class, 'create'])->name('questionnaires.add');
    Route::post('admin/questionnaires', [QuestionnaireController::class, 'store'])->name('questionnaires.store');
    Route::get('admin/questionnaires/{id}/edit', [QuestionnaireController::class, 'edit'])->name('questionnaires.edit');
    Route::put('admin/questionnaires/{id}', [QuestionnaireController::class, 'update'])->name('questionnaires.update');
    Route::delete('admin/questionnaires/{id}', [QuestionnaireController::class, 'destroy'])->name('questionnaires.delete');
});


// COACH DASHBOARD
Route::middleware(['auth'])->group(function () {
    Route::get('/coach/dashboard', [CoachController::class, 'dashboard'])->name('coach.dashboard');
    Route::get('coach/users/list', [CoachController::class, 'users_list'])->name('coach.users.list');
    Route::get('coach/resources/list', [ResourceController::class, 'index'])->name('resources.list');
    Route::get('coach/resources/create', [ResourceController::class, 'create'])->name('resources.create');
    Route::post('coach/resources/store', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('coach/resources/edit', [ResourceController::class, 'update'])->name('resources.edit');
    Route::delete('coach/resources/{resources}', [ResourceController::class, 'destroy'])->name('resources.destroy');
    Route::get('coach/profile', [CoachController::class, 'CoachProfile'])->name('coach.profile');
    Route::get('coach/profile/edit', [CoachController::class, 'EditProfile'])->name('coach.edit');
    Route::post('coach/profile/edit', [CoachController::class, 'update'])->name('coach.update');
    Route::get('coach/questionnaire', [QuestionnaireController::class, 'index'])->name('coach.questionnaire');
    Route::get('coach/upcoming-sessions', [SessionController::class, 'upcoming'])->name('coach.upcomingSessions');
    //Route::get('/coach/matching', [MatchingController::class, 'index'])->name('coach.matching');

});

require __DIR__ . '/auth.php';