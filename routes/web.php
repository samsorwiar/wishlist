<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', function () {
    return view('frontend/welcome');
})->middleware(['auth'])->name('home');

Route::prefix('wishlist')->group(function () {
    Route::get('/list', [WishlistController::class, 'index'])->name('index');
    Route::get('/create', [WishlistController::class, 'create'])->name('create');
    Route::post('/store', [WishlistController::class, 'store'])->name('store');
    Route::get('/show/{wishlist}', [WishlistController::class, 'show'])->name('show');
    Route::get('/edit/{wishlist}', [WishlistController::class, 'edit'])->name('edit');
    Route::put('/update/{wishlist}', [WishlistController::class, 'update'])->name('update');
    Route::get('/destroy/{wishlist}', [WishlistController::class, 'destroy'])->name('destroy');
});

//Route::get('/dashboard', function () {
//    return view('backend/dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->group(function () {
    Route::get('/index', [ArticleController::class, 'index'])->name('dashboard');
    Route::get('/create', [ArticleController::class, 'create'])->name('dashboardCreate');
    Route::post('/store', [ArticleController::class, 'store'])->name('dashboardStore');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('dashboardShow');
    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('dashboardEdit');
});

Route::post('/', [LogoutController::class, 'logout']);

require __DIR__ . '/auth.php';


















//'name' => 'required',
//            'link_to_site' => 'required',
//            'image' => 'required|image|mimes:png,jpeg,jpg,gif,webp',
//            'description' => 'required',
//            'price' => 'required'


//private function storeImage(UploadedFile $image)
//    {
//        $imagePath = 'public/images';
//        $imageName = $image->hashName();
//
//        $image->storeAs($imagePath, $imageName);
//
//        return $imageName;
//    }
