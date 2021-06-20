<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ButtonController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessangerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocailLinkController;
use App\Http\Controllers\SocailLoginController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// ForndEnd Design Route
Route::get('/', [FrontendController::class, 'frontend'])->name('frontend');
// Route::get('/', [FrontendController::class, 'frontendMaster'])->name('frontendMaster');

// Contact Forms Route.
Route::post('/conatct', [MessangerController::class, 'messageStore'])->name('messageStore');

 // Website Backend Route
 Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){
    // Category Routes
    Route::resource('category', CategoryController::class);
    Route::get('category-trash', [CategoryController::class, 'trashList'])->name('trashList');
    Route::get('category-delete/{id}', [CategoryController::class, 'permanentDelete'])->name('permanentDelete');
    Route::get('category-restore/{id}', [CategoryController::class, 'restore'])->name('restore');

    // Contact Me Info Route.
    Route::get('contact-create', [MessangerController::class, 'contactCreate'])->name('contactCreate');
    Route::get('contact', [MessangerController::class, 'contactIndex'])->name('contactIndex');
    Route::post('contact-post', [MessangerController::class, 'contactPost'])->name('contactPost');
    Route::get('contact-edit/{id}', [MessangerController::class, 'contactEdit'])->name('contactEdit');
    Route::post('contact-update', [MessangerController::class, 'contactUpdate'])->name('contactUpdate');
    Route::delete('contact-delete/{contact}', [MessangerController::class, 'contactDistroy'])->name('contactDistroy');

    // Banner Section Route
    Route::resource('banner', BannerController::class);
    Route::get('active/{id}',[BannerController::class, 'bannerActive'])->name('bannerActive');
    Route::get('deactive/{id}',[BannerController::class, 'bannerDeactive'])->name('bannerDeactive');

    // Button Section Route
    Route::get('button', [ButtonController::class, 'button'])->name('button');
    Route::post('button-store', [ButtonController::class, 'buttonStore'])->name('buttonStore');
    Route::get('button-edit/{id}', [ButtonController::class, 'buttonEdit'])->name('buttonEdit');
    Route::post('button-update', [ButtonController::class, 'buttonUpdate'])->name('buttonUpdate');
    Route::get('button-delete/{id}', [ButtonController::class, 'buttonDelete'])->name('buttonDelete');

    // About
    Route::resource('about', AboutController::class);

    // Education Section Route;
    Route::resource('education', EducationController::class);
    Route::get('education-trash', [EducationController::class, 'trashList'])->name('trashList');
    Route::get('education-restore/{id}', [EducationController::class, 'restore'])->name('restore');
    Route::get('education-delete/{id}', [EducationController::class, 'permanentDelete'])->name('permanentDelete');

    // Experiece Section Route;
    Route::resource('experience', ExperienceController::class);
    Route::get('experience-active/{id}',[ExperienceController::class, 'experienceActive'])->name('experienceActive');
    Route::get('experience-deactive/{id}',[ExperienceController::class, 'experienceDeactive'])->name('experienceDeactive');
    Route::get('experince-trash',[ExperienceController::class, 'ExTrashList'])->name('ExTrashList');
    Route::get('experience-restore/{id}',[ExperienceController::class, 'restore'])->name('restore');
    Route::get('experience-delete/{id}',[ExperienceController::class, 'permanentDelete'])->name('permanentDelete');

    // Skill Section Route;
    Route::resource('skill', SkillController::class);
    Route::get('skill-trashed', [SkillController::class, 'skillTrashList'])->name('skillTrashList');
    Route::get('skill-restore/{id}',[SkillController::class, 'restore'])->name('restore');
    Route::get('skill-delete/{id}',[SkillController::class, 'permanentDelete'])->name('permanentDelete');
    Route::get('skill-active/{id}', [SkillController::class, 'skillActive'])->name('skillActive');
    Route::get('skill-deactive/{id}', [SkillController::class, 'skillDeactive'])->name('skillDeactive');

    // Service Section Route.
    Route::resource('service', ServiceController::class);
    Route::get('service-trashed', [ServiceController::class, 'serviceTrashList'])->name('serviceTrashList');
    Route::get('service-restore/{id}',[ServiceController::class, 'restore'])->name('restore');
    Route::get('service-delete/{id}',[ServiceController::class, 'permanentDelete'])->name('permanentDelete');

    // Testimonial Section Route;
    Route::resource('testimonial', TestimonialController::class);
    Route::get('testimonial-trashed', [TestimonialController::class, 'testimonialTrashList'])->name('testimonialTrashList');
    Route::get('testimonial-restore/{id}',[TestimonialController::class, 'restore'])->name('restore');
    Route::get('testimonial-delete/{id}',[TestimonialController::class, 'permanentDelete'])->name('permanentDelete');

    // Project Section Routes
    Route::resource('project', ProjectController::class);

    // Footer Section Routes
    Route::resource('footer', FooterController::class);

    // Social Link Section Routes
    Route::resource('sociallink', SocialLinkController::class);

    // Setting Section Routes
    Route::resource('setting', SettingController::class);
});


// File Manager Route.
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Social Login Controller.
Route::get('login/github',[ SocailLoginController::class, 'redirectToProvider'])->name('redirectToProvider');
Route::get('login/github/callback', [ SocailLoginController::class, 'handleProviderCallback'])->name('handleProviderCallback');
