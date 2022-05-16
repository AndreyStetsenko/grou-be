<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainSite;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ExComponentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\QuestionaryController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ExtensionsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\Auth\LogoutController;

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

Auth::routes(['verify' => false]);

// Main Site
Route::get('/', [MainSite::class, 'viewSite'])->name('home');

// Logout
Route::get('logout', [LogoutController::class, 'perform'])->name('logout');

// Authentication  Route
Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('login', [AuthenticationController::class, 'loginPage'])->name('auth-login');
    Route::get('register', [AuthenticationController::class, 'registerPage'])->name('auth-register');
    Route::get('forgot-password', [AuthenticationController::class, 'forgetPasswordPage'])->name('auth-forgot-password');
    Route::get('reset-password', [AuthenticationController::class, 'resetPasswordPage'])->name('auth-reset-password');
    Route::get('lock-screen', [AuthenticationController::class, 'authLockPage'])->name('auth-lock-screen');
});

// Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    
    Route::get('questionary', [QuestionaryController::class, 'questionaryPage'])->name('questionary');
    Route::post('questionary/store', [QuestionaryController::class, 'questionaryStore'])->name('questionary-store');

    // Site Settings
    Route::get('settings', [SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::post('settings/tag-create', [SiteSettingsController::class, 'createTags'])->name('site-settings.tag-create');
    Route::delete('settings/tag-destroy', [SiteSettingsController::class, 'destroyTags'])->name('site-settings.tag-destroy');

    // Dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('d/tasks-list', [DashboardController::class, 'dashboardList'])->name('dashboard.tasks-list');

    // Analytics
    Route::get('analytics', [DashboardController::class, 'dashboardAnalytics'])->name('dashboard-analytics');

    // Roles
    Route::resource('roles', RoleController::class);

    // Users
    Route::get('users/list', [UsersController::class, 'listUser'])->name('user-list'); // Список юзеров
    Route::get('users/view/id{id}', [UsersController::class, 'viewUser'])->name('user-view'); // Откр. страницу юзера
    Route::get('users/edit/id{id}', [UsersController::class, 'editUser'])->name('user-edit'); // Редакт. юзера
    Route::get('user/create', [UsersController::class, 'create'])->name('user-create'); // Страница созд. юера
    Route::post('user/store', [UsersController::class, 'store'])->name('users.store'); // Метод созд. юзера
    Route::post('users/update/{id}', [UsersController::class, 'update']); // Обновить юзера
    Route::delete('users/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy'); // Удалить юзера
    Route::put('users/update-avatar/{id}', [UsersController::class, 'updateUserAvatar'])->name('update-avatar'); // Обн. аву

    // Account
    Route::get('profile', ProfileController::class)->name('view-profile');
    Route::get('profile/edit', ProfileEditController::class)->name('edit-profile');

    // Tasks
    Route::get('tasks', [TasksController::class, 'list'])->name('tasks-list');
    Route::get('tasks/view', [TasksController::class, 'view'])->name('tasks.view');
    Route::post('tasks/create', [TasksController::class, 'store'])->name('tasks.store');
    Route::post('tasks/update', [TasksController::class, 'update'])->name('tasks.update');
    Route::post('tasks/status', [TasksController::class, 'status'])->name('tasks.status');
    Route::post('tasks/addcomment', [TasksController::class, 'addComment'])->name('tasks.addcomment');
    Route::delete('tasks/destroy', [TasksController::class, 'destroy'])->name('tasks.delete');
    Route::delete('tasks/favorite', [TasksController::class, 'favorite'])->name('tasks.delete');

    // Calendar
    // Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('calendar', [CalendarController::class, 'index']);
    Route::post('calendarAjax', [CalendarController::class, 'ajax']);
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name('lang-locale');