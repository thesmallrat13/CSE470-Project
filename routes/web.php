<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResearchInterestController;
use App\Http\Controllers\UserController;

// NEW stub feature controllers
use App\Http\Controllers\ResearchTopicController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\EthicsController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ConferenceController;

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

Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');

// Profile Edit
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Mentor
Route::get('/mentor/become', [App\Http\Controllers\MentorController::class, 'create'])->name('mentor.create');
Route::post('/mentor/store', [App\Http\Controllers\MentorController::class, 'store'])->name('mentor.store');

// Protected
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Research Interests
    Route::get('/research-interests', [ResearchInterestController::class, 'edit'])->name('research.edit');
    Route::post('/research-interests', [ResearchInterestController::class, 'update'])->name('research.update');

    // Users directory & profiles
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // ====== STUB FEATURE ROUTES SO DROPDOWN WORKS ======
    Route::get('/research/topics', [ResearchTopicController::class, 'index'])->name('research.topics');
    Route::get('/research/roadmap', [RoadmapController::class, 'index'])->name('research.roadmap');
    Route::get('/research/timeline', [TimelineController::class, 'index'])->name('research.timeline');

    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
    Route::get('/ethics/checklist', [EthicsController::class, 'checklist'])->name('ethics.checklist');
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
});
