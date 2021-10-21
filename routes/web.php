<?php

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    // Auth::routes();
    Route::namespace('UserInterface')->group(function () {
        Route::get('/', [App\Http\Controllers\UserInterface\HomeController::class, 'index'])->name('home');
        Route::prefix('kurslar')->group(function () {
            Route::get('/{page?}', [App\Http\Controllers\UserInterface\CoursesController::class, 'index'])->name('courses');
            Route::get('/{cours}/{id}', [App\Http\Controllers\UserInterface\CoursesController::class, 'cours'])->name('cours');
        });
        Route::prefix('testler')->group(function () {
            Route::get('/{page?}', [App\Http\Controllers\UserInterface\TestController::class, 'index'])->name('tests');
            Route::get('/{test}/{id}/', [App\Http\Controllers\UserInterface\TestController::class, 'test'])->name('test');
            Route::post('/login_test', [App\Http\Controllers\UserInterface\TestController::class, 'login'])->name('test.start');
            Route::post('/questions', [App\Http\Controllers\UserInterface\TestController::class, 'all_questions'])->name('test.questions');
            Route::post('/end', [App\Http\Controllers\UserInterface\TestController::class, 'end'])->name('test.end');
            Route::post('/exit', [App\Http\Controllers\UserInterface\TestController::class, 'exit'])->name('test.exit');
            Route::get('/result/{user}/{test}', [App\Http\Controllers\UserInterface\TestController::class, 'result'])->name('test.result');
        });
        Route::prefix('xeberler')->group(function () {
            Route::get('/{page?}', [App\Http\Controllers\UserInterface\NewsController::class, 'index'])->name('news');
            Route::get('/{slug}/{id}/', [App\Http\Controllers\UserInterface\NewsController::class, 'news'])->name('news.single');
        });
        Route::prefix('tedbirler')->group(function () {
            Route::get('/{page?}', [App\Http\Controllers\UserInterface\EventController::class, 'index'])->name('events');
            Route::get('/{event}/{id}/', [App\Http\Controllers\UserInterface\EventController::class, 'event'])->name('event');
        });



        // Route::prefix('muellimler')->group(function () {
        //     Route::get('/{page?}', [App\Http\Controllers\UserInterface\TeacherController::class, 'index'])->name('teachers');
        //     Route::get('/{teacher}/{id}', [App\Http\Controllers\UserInterface\TeacherController::class, 'teacher'])->name('teacher');
        // });

        // Route::get('/vakansiya', [App\Http\Controllers\UserInterface\VacancyController::class, 'index'])->name('vacancy');
        Route::get('/elaqe', [App\Http\Controllers\UserInterface\ContactController::class, 'index'])->name('contact');
        Route::get('/axtaris', [App\Http\Controllers\UserInterface\SearchController::class, 'index'])->name('search');
        Route::get('/muraciet-et', [App\Http\Controllers\UserInterface\ApplyController::class, 'index'])->name('apply');
        Route::post('/send-message', [App\Http\Controllers\UserInterface\ApplyController::class, 'message'])->name('message');
        Route::post('/apply', [App\Http\Controllers\UserInterface\ApplyController::class, 'leads'])->name('leads');
        Route::get('/haqqimizda', [App\Http\Controllers\UserInterface\ContactController::class, 'about'])->name('about');
        Route::get('/method', [App\Http\Controllers\UserInterface\MethodController::class, 'index'])->name('method');
        Route::get('/studies', [App\Http\Controllers\UserInterface\MethodController::class, 'studies'])->name('studies');
        Route::get('/sitemap', [App\Http\Controllers\UserInterface\HomeController::class, 'sitemap'])->name('sitemap');
        Route::get('/gallery', [App\Http\Controllers\UserInterface\GalleryController::class, 'index'])->name('gallery');
        Route::get('/gallery-items', [App\Http\Controllers\UserInterface\GalleryController::class, 'items'])->name('gallery.items');
    });


    Route::namespace('Admin')->prefix('administrator')->group(function () {
        Route::redirect('/', '/administrator/homepage');

        Route::match(['get', 'post'], '/login', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.login');
        Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
        Route::match(['get', 'post'], '/forgot-password', [App\Http\Controllers\Admin\AdminController::class, 'forgot'])->name('admin.forgot.password');
        Route::get('/recovery-password/{token}/{email}', [App\Http\Controllers\Admin\AdminController::class, 'recovery'])->name('admin.recovery.password');
        Route::post('/change-password', [App\Http\Controllers\Admin\AdminController::class, 'change'])->name('admin.change.password');
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/homepage', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.homepage');
            Route::group(['prefix' => 'leads'], function () {
                Route::get('/', [App\Http\Controllers\Admin\LeadsController::class, 'index'])->name('admin.leads');
                Route::get('/index_data', [App\Http\Controllers\Admin\LeadsController::class, 'index_data'])->name('admin.leads.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\LeadsController::class, 'delete_data'])->name('admin.leads.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\LeadsController::class, 'mass_remove'])->name('admin.leads.mass_remove');
                Route::get('/new', [App\Http\Controllers\Admin\LeadsController::class, 'form'])->name('admin.leads.new');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\LeadsController::class, 'form'])->name('admin.leads.edit');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\LeadsController::class, 'save'])->name('admin.leads.save');
                Route::post('/add', [App\Http\Controllers\Admin\LeadsController::class, 'add'])->name('admin.leads.add');
                Route::get('/get_notes', [App\Http\Controllers\Admin\LeadsController::class, 'get_notes'])->name('admin.leads.get_notes');
                Route::get('/delte_note', [App\Http\Controllers\Admin\LeadsController::class, 'delete_note'])->name('admin.leads.delete_note');
            });
            Route::group(['prefix' => 'courses'], function () {
                Route::get('/', [App\Http\Controllers\Admin\CoursesController::class, 'index'])->name('admin.courses');
                Route::get('/index_data', [App\Http\Controllers\Admin\CoursesController::class, 'index_data'])->name('admin.courses.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\CoursesController::class, 'delete_data'])->name('admin.courses.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\CoursesController::class, 'mass_remove'])->name('admin.courses.mass_remove');
                Route::get('/new', [App\Http\Controllers\Admin\CoursesController::class, 'form'])->name('admin.courses.new');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\CoursesController::class, 'form'])->name('admin.courses.edit');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\CoursesController::class, 'save'])->name('admin.courses.save');
                Route::post('/upload_image', [App\Http\Controllers\Admin\CoursesController::class, 'upload_image'])->name('admin.courses.upload_image');
                Route::get('/delete_image/{id}', [App\Http\Controllers\Admin\CoursesController::class, 'delete_image'])->name('admin.courses.delete_image');
            });
            Route::group(['prefix' => 'tests'], function () {
                Route::get('/', [App\Http\Controllers\Admin\TestsController::class, 'index'])->name('admin.tests');
                Route::get('/index_data', [App\Http\Controllers\Admin\TestsController::class, 'index_data'])->name('admin.tests.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\TestsController::class, 'delete_data'])->name('admin.tests.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\TestsController::class, 'mass_remove'])->name('admin.tests.mass_remove');
                Route::get('/new', [App\Http\Controllers\Admin\TestsController::class, 'form'])->name('admin.tests.new');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\TestsController::class, 'form'])->name('admin.tests.edit');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\TestsController::class, 'save'])->name('admin.tests.save');
                Route::post('/add_question', [App\Http\Controllers\Admin\TestsController::class, 'add_question'])->name('admin.tests.add_question');
                Route::get('/all_questions', [App\Http\Controllers\Admin\TestsController::class, 'all_questions'])->name('admin.tests.all_questions');
                Route::get('/get_question', [App\Http\Controllers\Admin\TestsController::class, 'get_question'])->name('admin.tests.get_question');
                Route::get('/delete_question', [App\Http\Controllers\Admin\TestsController::class, 'delete_question'])->name('admin.tests.delete_question');
                Route::post('/upload_image', [App\Http\Controllers\Admin\TestsController::class, 'upload_image'])->name('admin.tests.upload_image');
                Route::get('/delete_image/{id}', [App\Http\Controllers\Admin\TestsController::class, 'delete_image'])->name('admin.tests.delete_image');
            });
            Route::group(['prefix' => 'testscore'], function () {
                Route::get('/', [App\Http\Controllers\Admin\TestsController::class, 'score'])->name('admin.testscore');
                Route::get('/index_data', [App\Http\Controllers\Admin\TestsController::class, 'index_data_testscore'])->name('admin.testscore.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\TestsController::class, 'delete_data_testscore'])->name('admin.testscore.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\TestsController::class, 'mass_remove_testscore'])->name('admin.testscore.mass_remove');
                Route::post('/view', [App\Http\Controllers\Admin\TestsController::class, 'view'])->name('admin.testscore.view');
            });
            Route::group(['prefix' => 'news'], function () {
                Route::get('/', [App\Http\Controllers\Admin\InfoController::class, 'news'])->name('admin.news');
                Route::get('/index_data', [App\Http\Controllers\Admin\InfoController::class, 'index_data_news'])->name('admin.news.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\InfoController::class, 'delete_data_news'])->name('admin.news.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\InfoController::class, 'mass_remove_news'])->name('admin.news.mass_remove');
                Route::get('/new', [App\Http\Controllers\Admin\InfoController::class, 'formNews'])->name('admin.news.new');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\InfoController::class, 'formNews'])->name('admin.news.edit');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\InfoController::class, 'newsSave'])->name('admin.news.save');
                Route::post('/upload_image', [App\Http\Controllers\Admin\InfoController::class, 'upload_image_news'])->name('admin.news.upload_image');
                Route::get('/delete_image/{id}/{image}', [App\Http\Controllers\Admin\InfoController::class, 'delete_image_news'])->name('admin.news.delete_image');
            });
            Route::group(['prefix' => 'events'], function () {
                Route::get('/', [App\Http\Controllers\Admin\InfoController::class, 'events'])->name('admin.events');
                Route::get('/index_data', [App\Http\Controllers\Admin\InfoController::class, 'index_data_events'])->name('admin.events.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\InfoController::class, 'delete_data_events'])->name('admin.events.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\InfoController::class, 'mass_remove_events'])->name('admin.events.mass_remove');
                Route::get('/new', [App\Http\Controllers\Admin\InfoController::class, 'formEvent'])->name('admin.events.new');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\InfoController::class, 'formEvent'])->name('admin.events.edit');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\InfoController::class, 'eventSave'])->name('admin.events.save');
                Route::post('/upload_image', [App\Http\Controllers\Admin\InfoController::class, 'upload_image_events'])->name('admin.events.upload_image');
                Route::get('/delete_image/{id}/{image}', [App\Http\Controllers\Admin\InfoController::class, 'delete_image_events'])->name('admin.events.delete_image');
            });
            // Route::group(['prefix' => 'teachers'], function () {
            //     Route::get('/', [App\Http\Controllers\Admin\TeachersController::class, 'index'])->name('admin.teachers');
            //     Route::get('/index_data', [App\Http\Controllers\Admin\TeachersController::class, 'index_data'])->name('admin.teachers.index_data');
            //     Route::get('/delete_data', [App\Http\Controllers\Admin\TeachersController::class, 'delete_data'])->name('admin.teachers.delete_data');
            //     Route::get('/mass_remove', [App\Http\Controllers\Admin\TeachersController::class, 'mass_remove'])->name('admin.teachers.mass_remove');
            //     Route::get('/new', [App\Http\Controllers\Admin\TeachersController::class, 'form'])->name('admin.teachers.new');
            //     Route::get('/edit/{id}', [App\Http\Controllers\Admin\TeachersController::class, 'form'])->name('admin.teachers.edit');
            //     Route::post('/save/{id?}', [App\Http\Controllers\Admin\TeachersController::class, 'save'])->name('admin.teachers.save');
            //     Route::post('/upload_image', [App\Http\Controllers\Admin\TeachersController::class, 'upload_image'])->name('admin.teachers.upload_image');
            //     Route::get('/delete_image/{id}', [App\Http\Controllers\Admin\TeachersController::class, 'delete_image'])->name('admin.teachers.delete_image');
            // });
            Route::group(['prefix' => 'admin'], function () {
                Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'admin'])->name('admin.index');
                Route::get('/index_data', [App\Http\Controllers\Admin\AdminController::class, 'index_data'])->name('admin.index.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\AdminController::class, 'delete_data'])->name('admin.index.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\AdminController::class, 'mass_remove'])->name('admin.index.mass_remove');
                Route::get('/new', [App\Http\Controllers\Admin\AdminController::class, 'form'])->name('admin.index.new');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'form'])->name('admin.index.edit');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\AdminController::class, 'save'])->name('admin.index.save');
            });
            // Route::group(['prefix' => 'vacancy'], function () {
            //     Route::get('/', [App\Http\Controllers\Admin\VacancyController::class, 'index'])->name('admin.vacancy');
            //     Route::get('/index_data', [App\Http\Controllers\Admin\VacancyController::class, 'index_data'])->name('admin.vacancy.index_data');
            //     Route::get('/delete_data', [App\Http\Controllers\Admin\VacancyController::class, 'delete_data'])->name('admin.vacancy.delete_data');
            //     Route::get('/mass_remove', [App\Http\Controllers\Admin\VacancyController::class, 'mass_remove'])->name('admin.vacancy.mass_remove');
            //     Route::get('/new', [App\Http\Controllers\Admin\VacancyController::class, 'form'])->name('admin.vacancy.new');
            //     Route::get('/edit/{id}', [App\Http\Controllers\Admin\VacancyController::class, 'form'])->name('admin.vacancy.edit');
            //     Route::post('/save/{id?}', [App\Http\Controllers\Admin\VacancyController::class, 'save'])->name('admin.vacancy.save');
            // });
            Route::group(['prefix' => 'messages'], function () {
                Route::get('/', [App\Http\Controllers\Admin\MessagesController::class, 'index'])->name('admin.messages');
                Route::get('/index_data', [App\Http\Controllers\Admin\MessagesController::class, 'index_data'])->name('admin.messages.index_data');
                Route::get('/delete_data', [App\Http\Controllers\Admin\MessagesController::class, 'delete_data'])->name('admin.messages.delete_data');
                Route::get('/mass_remove', [App\Http\Controllers\Admin\MessagesController::class, 'mass_remove'])->name('admin.messages.mass_remove');
            });

            Route::group(['prefix' => 'about'], function () {
                Route::get('/', [App\Http\Controllers\Admin\AboutController::class, 'index'])->name('admin.about');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\AboutController::class, 'save'])->name('admin.about.save');
            });
            Route::group(['prefix' => 'method'], function () {
                Route::get('/', [App\Http\Controllers\Admin\MethodController::class, 'index'])->name('admin.method');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\MethodController::class, 'save'])->name('admin.method.save');
            });
            Route::group(['prefix' => 'studies'], function () {
                Route::get('/', [App\Http\Controllers\Admin\StudiesController::class, 'index'])->name('admin.studies');
                Route::post('/save/{id?}', [App\Http\Controllers\Admin\StudiesController::class, 'save'])->name('admin.studies.save');
            });
            Route::group(['prefix' => 'gallery'], function () {
                Route::get('/', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery');
                Route::get('/get_slides', [App\Http\Controllers\Admin\GalleryController::class, 'get_slides'])->name('admin.gallery.get_slides');
                Route::get('/get_slide', [App\Http\Controllers\Admin\GalleryController::class, 'get_slide'])->name('admin.gallery.get_slide');
                Route::post('/save_slide', [App\Http\Controllers\Admin\GalleryController::class, 'save_slide'])->name('admin.gallery.save_slide');
                Route::get('/status_slide/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'status_slide'])->name('admin.gallery.status_slide');
                Route::get('/delete_slide/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'delete_slide'])->name('admin.gallery.delete_slide');
            });

            Route::group(['prefix' => 'settings'], function () {
                Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
                Route::post('/add_level', [App\Http\Controllers\Admin\SettingsController::class, 'add_level'])->name('admin.settings.add_level');
                Route::get('/delete_level/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'delete_level'])->name('admin.settings.delete_level');
                Route::get('/get_slides', [App\Http\Controllers\Admin\SettingsController::class, 'get_slides'])->name('admin.settings.get_slides');
                Route::get('/get_slide', [App\Http\Controllers\Admin\SettingsController::class, 'get_slide'])->name('admin.settings.get_slide');
                Route::post('/save_slide', [App\Http\Controllers\Admin\SettingsController::class, 'save_slide'])->name('admin.settings.save_slide');
                Route::get('/status_slide/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'status_slide'])->name('admin.settings.status_slide');
                Route::get('/delete_slide/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'delete_slide'])->name('admin.settings.delete_slide');
            });
        });
    });
});
