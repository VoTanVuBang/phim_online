<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

//Admin Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LinkMovieController;
use App\Http\Controllers\UserController;


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

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}/{server_active}', [IndexController::class, 'watch']);
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem',[IndexController::class,'search'])->name('timkiem');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route admin
Route::group(['middleware' => ['auth']],function(){
    Route::resource('category', CategoryController::class);
});
Route::post('resorting_category', [CategoryController::class,'resorting_category'])->name('resorting_category');

Route::resource('genre', GenreController::class);
Route::resource('linkmovie', LinkMovieController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::get('select-movie', [EpisodeController::class,'select_movie'])->name('select-movie');


// Lọc phim
Route::get('/locphim', [IndexController::class,'locphim'])->name('locphim');

//Thêm tập phim
Route::get('add-episode/{id}', [EpisodeController::class,'add_episode'])->name('add-episode');

Route::resource('movie', MovieController::class);
Route::post('/update-year-phim', [MovieController::class, 'update_year']);
Route::get('/update-topview-phim', [MovieController::class, 'update_topview']);
Route::get('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
Route::post('/update-season-phim', [MovieController::class, 'update_season']);

// Thông tin website
Route::resource('info', InfoController::class);


// Thay đổi Danh mục ajax
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
// Thay đổi quốc gia ajax
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');

// Thay đổi trạng thái ajax
Route::get('/trangthai-choose', [MovieController::class, 'trangthai_choose'])->name('trangthai-choose');

// Thay đổi trạng thái ajax
Route::get('/phude-choose', [MovieController::class, 'phude_choose'])->name('phude-choose');
Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');

Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');

Route::post('/update-image-movie-ajax', [MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');

//Đánh giá phim

Route::post('/add-rating', [IndexController::class, 'add_rating'])->name('add-rating');
Route::get('/searching',[IndexController::class,'searching'])->name('searching-movie');



// Đăng lên host
Route::get('/create_sitemap',function(){
    return Artisan::call('sitemap:create');
});

//User
Route::resource('/user', UserController::class);
// Thanh toán
Route::post('/thanh-toan',[IndexController::class,'thanhtoan_vnp'])->name('vnp_payment');