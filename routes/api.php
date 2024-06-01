<?php

use App\Http\Controllers\Apicontroller;
use App\Http\Controllers\Apiusercontroller;
use App\Http\Controllers\AuthApicontroller;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


     //  loginn and registration



       Route::controller(AuthApicontroller::class)->group(function(){
        Route::post('login' , 'login');
        Route::post('register' , 'register');
       });

 


///////////////////////////////////////////////////////////////////////////////////////////////









Route::post('/dairystore', [Apicontroller::class, 'dairystore'])->name('dairystore');
Route::get('/dairy', [Apicontroller::class, 'dairy'])->name('dairy');
Route::get('dairylist', [Apicontroller::class, 'dairylist'])->name('dairylist');
Route::delete('/admin/dairy/{id}', [Apicontroller::class, 'destroyD'])->name('dairy.destroy');
Route::get('/admin/dairy/{id}/edit', [Apicontroller::class, 'editD'])->name('dairy.edit');
Route::post('/admin/dairy/{id}', [Apicontroller::class, 'updateD'])->name('dairy.update');



Route::post('/vegestore', [Apicontroller::class, 'storeVegetable']);
Route::get('/vege', [Apicontroller::class, 'addVegetableForm'])->name('vege');
Route::get('vegelist', [Apicontroller::class, 'vegelist'])->name('vegelist');
Route::delete('/admin/vegetables/{id}', [Apicontroller::class, 'destroy'])->name('vegetables.destroy');
Route::get('/admin/vegetables/{id}/edit', [Apicontroller::class, 'edit'])->name('vegetables.edit');
Route::post('/admin/vegetables/{id}', [Apicontroller::class, 'update'])->name('vegetables.update');
  




Route::post('/fishtore', [Apicontroller::class, 'fishtore'])->name('fishtore');
Route::get('/fish', [Apicontroller::class, 'fish'])->name('fish');
Route::get('fishlist', [Apicontroller::class, 'fishlist'])->name('fishlist');
Route::delete('/admin/fish/{id}', [Apicontroller::class, 'destroyF'])->name('fish.destroy');
Route::get('/admin/fish/{id}/edit', [Apicontroller::class, 'editF'])->name('fish.edit');
Route::post('/admin/fish/{id}', [Apicontroller::class, 'updateF'])->name('fish.update');





Route::post('/trendystore', [Apicontroller::class, 'trendystore'])->name('trendystore');
Route::get('/trendy', [Apicontroller::class, 'trendy'])->name('trendy');
Route::get('trendylist', [Apicontroller::class, 'trendylist'])->name('trendylist');
Route::delete('/admin/trendy/{id}', [Apicontroller::class, 'destroyT'])->name('trendy.destroy');
Route::get('/admin/trendy/{id}/edit', [Apicontroller::class, 'editT'])->name('trendy.edit');
Route::post('/admin/trendy/{id}', [Apicontroller::class, 'updateT'])->name('trendy.update');









Route::get('/fruit', [Apicontroller::class, 'fruit'])->name('fruit');
Route::post('/fruitstore', [Apicontroller::class, 'fruitstore'])->name('fruitstore');
Route::get('fruitlist', [Apicontroller::class, 'fruitlist'])->name('fruitlist');
Route::delete('/admin/fruit/{id}', [Apicontroller::class, 'destroyfr'])->name('fruit.destroy');
Route::get('/admin/fruit/{id}/edit', [Apicontroller::class, 'editfr'])->name('fruit.edit');
Route::post('/admin/fruit/{id}', [Apicontroller::class, 'updatefr'])->name('fruit.update');
  




Route::get('/contact', [Apicontroller::class, 'contact'])->name('contact');
Route::post('/contact', [Apicontroller::class, 'send'])->name('contacts');




//// user view   routess....................................................................................................................




Route::get('/home', [Apiusercontroller::class, 'show'])->name('home');
Route::get('/shopnow', [Apiusercontroller::class, 'shopnow'])->name('shopnow');
Route::get('/showcart', [Apiusercontroller::class, 'showcart'])->name('showcart');
Route::post('/add-to-cart', [Apiusercontroller::class, 'addToCart'])->name('cart.add');
Route::post('/wishlist', [Apiusercontroller::class, 'wishlist'])->name('wishlist');
Route::get('/wishlistget', [Apiusercontroller::class, 'wishlistget'])->name('wishlistget');
Route::delete('wishlist/destroy/{id}', [Apiusercontroller::class, 'destroyW'])->name('wishlist.destroy');

Route::get('/placeorder', [Apiusercontroller::class, 'placeorder'])->name('placeorder');

Route::put('/cart/{id}', [Apiusercontroller::class, 'update'])->name('cart.update');
Route::get('/cart/{id}', [Apiusercontroller::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/delete-all', [Apiusercontroller::class, 'deleteAll'])->name('cart.deleteAll');
Route::post('/place-order',[ Apiusercontroller::class, 'placeorderr'])->name('place.order');
Route::post('/order', [Apiusercontroller::class, 'order'])->name('order');
Route::post('/updateaddress', [Apiusercontroller::class, 'updateaddress'])->name('updateaddress');


Route::get('/finalorder', [Apiusercontroller::class, 'finalorder'])->name('finalorder');

Route::get('/myorder', [Apiusercontroller::class, 'myorder'])->name('myorder');



Route::post('/update-order-status', [Apiusercontroller::class, 'updateStatus'])->name('update.order.status');
Route::get('/home', [Apiusercontroller::class, 'show'])->name('home');



Route::get('/about',[Apiusercontroller::class,'about'])->name('about');



Route::get('/buynow/{type}/{id}', [Apiusercontroller::class, 'buynow'])->name('buynow');




