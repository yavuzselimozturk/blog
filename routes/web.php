<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\admin_kontrol;
use App\Http\Middleware\already_login;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin-')->middleware('already_login')->group(function(){//giris yapıldıysa panele yönlendir
  Route::get('giris',[AuthController::class,'login'])->name('login');
  Route::post('giris',[AuthController::class,'loginPost'])->name('login-post');
});
Route::prefix('admin')->middleware('admin_kontrol')->group(function(){//giris yapılmadıysa giris sayfasına yönlendir
  Route::get('panel',[AdminController::class,'panel'])->name('admin-dashboard');
  //makale routes
  Route::get('makaleler/silinenler',[PanelController::class,'trash'])->name('trash-article');
  Route::get('makaleler/kurtar/{id}',[PanelController::class,'recover'])->name('recover-article');
  Route::get('makaleler/forcedelete/{id}',[PanelController::class,'forceDeleted'])->name('force-delete');
  Route::resource('makaleler',PanelController::class);
  Route::get('/switch',[PanelController::class,'switch'])->name('switch');
  //Kategori routes
  Route::get('/kategoriler',[CategoryController::class,'index'])->name('category-index');
  Route::post('/kategoriler/create',[CategoryController::class,'create'])->name('category-create');
  Route::post('/kategoriler/update',[CategoryController::class,'update'])->name('category-update');
  Route::post('/kategoriler/delete',[CategoryController::class,'delete'])->name('category-delete');
  Route::get('/kategori/getdata',[CategoryController::class,'getData'])->name('category-getdata');

  Route::get('cikis',[AuthController::class,'logout'])->name('admin-logout');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/anasayfa',[BlogController::class,'index'])->name('anasayfa');
Route::get('/iletisim',[BlogController::class,'contact'])->name('contact');
Route::post('/iletisim-post',[BlogController::class,'contactpost'])->name('contact-post');

Route::get('/blog/{slug}',[BlogController::class,'post'])->name('post');
Route::get('/kategori/{category}',[BlogController::class,'kategori'])->name('kategori');
Route::get('/{sayfa}',[BlogController::class,'page'])->name('page');
