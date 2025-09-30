<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Artisan;
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
//Menu

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/', [PageController::class, 'homepage'])->name('home');
Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/contatti', [PageController::class, 'contactsPage'])->name('contacts');
Route::get('/news', [PageController::class, 'showPosts'])->name('news');
Route::get('/events', [PageController::class, 'showPosts'])->name('events');
Route::get('/edotoriale', [PageController::class, 'showPosts'])->name('edotoriale');
Route::get('/libri', [PageController::class, 'libriPage'])->name('libri');
Route::get('/album', [PageController::class, 'musicaPage'])->name('musica');
Route::get('/single', [PageController::class, 'singlePage'])->name('single');

Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index');
Route::get('/archive/reset', [ArchiveController::class, 'reset'])->name('archive.reset');


//Detail
Route::get('/news/{id}/{title}', [PageController::class, 'postDetails'])->name('news-detail');
Route::get('/events/{id}/{title}', [PageController::class, 'postDetails'])->name('events-detail');
Route::get('/edo/{id}/{title}', [PageController::class, 'postDetails'])->name('edo-detail');
Route::get('/libri/{id}/{title}', [PageController::class, 'bookDetails'])->name('libri-detail');
Route::get('/download-mediabook/{book}', [PageController::class, 'download'])->name('download-mediabook');
Route::get('/download-mediasingle/{single}', [PageController::class, 'downloadSingle'])->name('download-mediasingle');
Route::get('/single/{id}/{title}', [PageController::class, 'singleDetails'])->name('single-detail');




//CD
Route::get('/album/venga-il-tuo-regno', [PageController::class, 'vengaRegno'])->name('venga-regno');
Route::get('/album/venga-il-tuo-regno/presentazione', [PageController::class, 'presentazione'])->name('presentazione');
Route::get('/album/venga-il-tuo-regno/cronaca', [PageController::class, 'cronacaRegno'])->name('cronaca-regno');
Route::get('/album/venga-il-tuo-regno/programma-di-sala-regno', [PageController::class, 'programmaSalaRegno'])->name('programma-di-sala-regno');


Route::get('/album/io-ti-cerchero', [PageController::class, 'tiCerchero'])->name('ti-cerchero');
Route::get('/album/io-ti-cerchero/locandina', [PageController::class, 'locandina'])->name('locandina');
Route::get('/album/io-ti-cerchero/concerto', [PageController::class, 'concerto'])->name('concerto');
Route::get('/album/io-ti-cerchero/programma-di-sala-cerchero', [PageController::class, 'programmaSalaCerchero'])->name('programma-di-sala-cerchero');

Route::get('/album/e-con-questa-vita-ti-canto', [PageController::class, 'tiCanto'])->name('ti-canto');
Route::get('/album/e-con-questa-vita-ti-canto/progetto', [PageController::class, 'tiCantoProgetto'])->name('ti-canto-progetto');

Route::get('/album/due-voci-un-canto', [PageController::class, 'unCanto'])->name('un-canto');

Route::get('/album/compagni-di-viaggio', [PageController::class, 'diViaggio'])->name('di-viaggio');

Route::get('/album/aedo', [PageController::class, 'aedo'])->name('aedo');

Route::get('/album/e-volgeranno-lo-sguardo', [PageController::class, 'loSguardo'])->name('lo-sguardo');


//BOOKLET

Route::get('/booklet/compagni-di-viaggio', [PageController::class, 'bookCompagni'])->name('book-viaggio');


Route::prefix('services')->group(function () {
    Route::post('/send',[MailController::class, 'sendMail'])->name('sendMail');
});


Route::get('admin/posts/sort', [PostsController::class, 'sortIndex'])->name('admin/posts/sort');
Route::post('admin/posts/update-order', [PostsController::class, 'sortUpdate'])->name('admin/posts/sort/update');







/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');

    
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('socials')->name('socials/')->group(static function() {
            Route::get('/',                                             'SocialsController@index')->name('index');
            Route::get('/create',                                       'SocialsController@create')->name('create');
            Route::post('/',                                            'SocialsController@store')->name('store');
            Route::get('/{social}/edit',                                'SocialsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SocialsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{social}',                                    'SocialsController@update')->name('update');
            Route::delete('/{social}',                                  'SocialsController@destroy')->name('destroy');
        });
    });
});








/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('books')->name('books/')->group(static function() {
            Route::get('/',                                             'BooksController@index')->name('index');
            Route::get('/create',                                       'BooksController@create')->name('create');
            Route::post('/',                                            'BooksController@store')->name('store');
            Route::get('/{book}/edit',                                  'BooksController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BooksController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{book}',                                      'BooksController@update')->name('update');
            Route::delete('/{book}',                                    'BooksController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('songs')->name('songs/')->group(static function() {
            Route::get('/',                                             'SongsController@index')->name('index');
            Route::get('/create',                                       'SongsController@create')->name('create');
            Route::post('/',                                            'SongsController@store')->name('store');
            Route::get('/{song}/edit',                                  'SongsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SongsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{song}',                                      'SongsController@update')->name('update');
            Route::delete('/{song}',                                    'SongsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('profiles')->name('profiles/')->group(static function() {
            Route::get('/',                                             'ProfilesController@index')->name('index');
            Route::get('/create',                                       'ProfilesController@create')->name('create');
            Route::post('/',                                            'ProfilesController@store')->name('store');
            Route::get('/{profile}/edit',                               'ProfilesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProfilesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{profile}',                                   'ProfilesController@update')->name('update');
            Route::delete('/{profile}',                                 'ProfilesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('singles')->name('singles/')->group(static function() {
            Route::get('/',                                             'SinglesController@index')->name('index');
            Route::get('/create',                                       'SinglesController@create')->name('create');
            Route::post('/',                                            'SinglesController@store')->name('store');
            Route::get('/{single}/edit',                                'SinglesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SinglesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{single}',                                    'SinglesController@update')->name('update');
            Route::delete('/{single}',                                  'SinglesController@destroy')->name('destroy');
        });
    });
});