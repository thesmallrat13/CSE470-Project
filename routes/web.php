<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResearchInterestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResearchTopicController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EthicsController;
use App\Http\Controllers\ResearchProgressController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupResourceController;
use App\Http\Controllers\GroupProgressController;
use App\Http\Controllers\GroupNoteController;
use App\Http\Controllers\GroupRequestController;
use App\Http\Controllers\ChecklistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Conferences (public)
Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');

// Protected routes
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Research Interests
    Route::get('/research-interests/edit', [ResearchInterestController::class, 'edit'])->name('research.edit');
    Route::post('/research-interests/update', [ResearchInterestController::class, 'update'])->name('research.update');
    Route::get('/research-interests/browse', [ResearchInterestController::class, 'index'])->name('research.index');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // Research tools
    Route::get('/research/topics', [ResearchTopicController::class, 'index'])->name('research.topics');
    Route::get('/research/roadmap', [RoadmapController::class, 'index'])->name('research.roadmap');
    Route::get('/research/timeline', [TimelineController::class, 'index'])->name('research.timeline');

    // Research Progress Tracker
    Route::post('/research/timeline', [ResearchProgressController::class, 'store'])->name('research.timeline.store');
    Route::post('/research/timeline/{id}/toggle', [ResearchProgressController::class, 'update'])->name('research.timeline.toggle');

    // Forum
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');
    Route::post('/forum/{id}/comment', [ForumController::class, 'comment'])->name('forum.comment');
    Route::post('/forum/{id}/vote/{type}', [ForumController::class, 'vote'])->name('forum.vote');

    // Resources
    Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
    Route::get('/resources/create', [ResourceController::class, 'create'])->name('resources.create');
    Route::post('/resources', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('/resources/{id}', [ResourceController::class, 'show'])->name('resources.show');

    // Mentors
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
    Route::get('/mentors/create', [MentorController::class, 'create'])->name('mentors.create');
    Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
    Route::get('/mentors/{mentor}/get', [MentorController::class, 'getMentorship'])->name('mentorship.get');

    // Templates / Announcements
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');

    // Checklist
    Route::get('/checklist', [ChecklistController::class, 'index'])->name('checklist.index');
    Route::post('/checklist/{item}/toggle', [ChecklistController::class, 'toggle'])->name('checklist.toggle');
    Route::post('/checklist/seed-defaults', [ChecklistController::class, 'seedDefaults'])->name('checklist.seed');

    /*
    |--------------------------------------------------------------------------
    | Groups & Subfeatures (Not fully implemented)
    |--------------------------------------------------------------------------
    */
    Route::prefix('groups')->name('groups.')->group(function () {

        // Groups CRUD
        Route::get('/', [GroupController::class, 'index'])->name('index');
        Route::get('/create', [GroupController::class, 'create'])->name('create');
        Route::post('/', [GroupController::class, 'store'])->name('store');
        Route::get('/{group}', [GroupController::class, 'show'])->name('show');
        Route::post('/{group}/join', [GroupController::class, 'join'])->name('join');

        // Group Resources
        Route::get('/{group}/resources', [GroupResourceController::class, 'index'])->name('resources.index');
        Route::post('/{group}/resources', [GroupResourceController::class, 'store'])->name('resources.store');

        // Group Progress (goals/events)
        Route::get('/{group}/progress', [GroupProgressController::class, 'index'])->name('progress.index');
        Route::post('/{group}/progress', [GroupProgressController::class, 'store'])->name('progress.store');
        Route::post('/progress/{progress}/toggle', [GroupProgressController::class, 'toggle'])->name('progress.toggle');

        // Group Notes
        Route::get('/{group}/notes', [GroupNoteController::class, 'index'])->name('notes.index');
        Route::post('/{group}/notes', [GroupNoteController::class, 'store'])->name('notes.store');

        // Group Join Requests
        Route::post('/{group}/request-join', [GroupRequestController::class, 'requestJoin'])->name('requestJoin');
    });

    // Approve/Reject Join Requests (admin/owner only)
    Route::post('/group-requests/{request}/approve', [GroupRequestController::class, 'approve'])->name('groupRequests.approve');
    Route::post('/group-requests/{request}/reject', [GroupRequestController::class, 'reject'])->name('groupRequests.reject');

});
