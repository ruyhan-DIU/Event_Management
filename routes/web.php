<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;


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
    return view('welcome');
})->name('welcome');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('about', function() {
    return view('about');
})->name('about');

Route::get('faq', function(){
    return view('faq');
})->name('faq');

Route::get('/review', [ReviewController::class, 'index']);
Route::post('/review', [ReviewController::class, 'store'])->name('review');


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
    Route::prefix('/customer')->name('customer.')->namespace('customer')->group(function() {

     Route::get('/dashboard',[App\Http\Controllers\Customer\DashboardController::class,'index'])->name('dashboard')->middleware('customer');



    //Login Register Routes
    Route::get('/register', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'CustomerRegisterForm'])->name('showregister');
    Route::post('/register', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'RegisterCustomer'])->name('register');
    Route::get('/login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'showLoginForm'])->name('showlogin');
    Route::post('/login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Customer\Auth\LoginController::class, 'logout'])->name('logout');

//customerservice
        Route::get('/service/all', [App\Http\Controllers\Customer\ServiceController::class,'allservice'])->name('allservice')->middleware('customer');
        Route::get('/service/booked', [App\Http\Controllers\Customer\ServiceController::class,'showservice'])->name('showservice')->middleware('customer');
        Route::get('/service/all/{id}', [App\Http\Controllers\Customer\ServiceController::class,'addservice'])->name('addservice')->middleware('customer');
        Route::get('/service/booked/{id}', [App\Http\Controllers\Customer\ServiceController::class,'deleteservice'])->name('deleteservice')->middleware('customer');


        Route::get('/event/add', [App\Http\Controllers\Customer\ServiceController::class,'showaddevent'])->name('showaddevent')->middleware('customer');
        Route::post('/event/add', [App\Http\Controllers\Customer\ServiceController::class,'makeevent'])->name('addevent')->middleware('customer');

        Route::get('/provider', [App\Http\Controllers\Customer\MeetingController::class,'showprovider'])->name('showprovider')->middleware('customer');
        Route::get('/provider/{id}', [App\Http\Controllers\Customer\MeetingController::class,'showmeeting'])->name('showmeeting')->middleware('customer');
        Route::post('/provider/{id}', [App\Http\Controllers\Customer\MeetingController::class,'schedulemeeting'])->name('addmeeting')->middleware('customer');

        Route::get('/meeting', [App\Http\Controllers\Customer\MeetingController::class,'meetinglist'])->name('meetinglist')->middleware('customer');
        Route::get('/message/{id}', [App\Http\Controllers\Customer\MessageController::class,'showmessage'])->name('showmessage')->middleware('customer');
        Route::post('/message/{id}', [App\Http\Controllers\Customer\MessageController::class,'sendmessage'])->name('sendmessage')->middleware('customer');


        Route::get('/product', [App\Http\Controllers\Customer\ProductController::class,'show'])->name('showproduct')->middleware('customer');

        Route::post('/product/{id}', [App\Http\Controllers\Customer\ProductController::class,'addtocart'])->name('addtocart')->middleware('customer');
        Route::get('/cart', [App\Http\Controllers\Customer\ProductController::class,'getcart'])->name('showcart')->middleware('customer');
    });

    //Admin Routes
    Route::prefix('/admin')->name('admin.')->namespace('admin')->group(function() {

        Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard')->middleware('admin');
        Route::get('/provider',[App\Http\Controllers\ProviderController::class,'index'])->name('provider')->middleware('admin');
        Route::get('/provider/edit',[App\Http\Controllers\ProviderController::class,'edit'])->name('update')->middleware('admin');
        Route::get('/provider/show',[App\Http\Controllers\ProviderController::class,'show'])->name('show')->middleware('admin');




        //Login Register Routes

        Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('showlogin');
        Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
        Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
//Add Customer
        Route::get('/customer/add', [App\Http\Controllers\Admin\Customer\AddCustomerController::class, 'CustomerRegisterForm'])->name('addcustomerpage')->middleware('admin');
        Route::post('/customer/add', [App\Http\Controllers\Admin\Customer\AddCustomerController::class, 'AddCustomer'])->name('customer.add')->middleware('admin');
//Add Provider
        Route::get('/provider/add', [App\Http\Controllers\Admin\Provider\AddProviderController::class, 'ProviderRegisterForm'])->name('addproviderpage')->middleware('admin');
        Route::post('/provider/add', [App\Http\Controllers\Admin\Provider\AddProviderController::class, 'AddProvider'])->name('provider.add')->middleware('admin');




    });
    Route::prefix('/provider')->name('provider.')->namespace('provider')->group(function() {

        Route::get('/dashboard',[App\Http\Controllers\Provider\DashboardController::class,'index'])->name('dashboard')->middleware('provider');



        //Login Register Routes

        Route::get('/login', [App\Http\Controllers\Provider\Auth\LoginController::class, 'showLoginForm'])->name('showlogin');
        Route::post('/login', [App\Http\Controllers\Provider\Auth\LoginController::class, 'login'])->name('login');
        Route::post('/logout', [App\Http\Controllers\Provider\Auth\LoginController::class, 'logout'])->name('logout');

//Service
        Route::get('/service/add', [App\Http\Controllers\Provider\ServiceController::class,'addservicepage'])->name('addservicepage')->middleware('provider');
        Route::post('/service/add', [App\Http\Controllers\Provider\ServiceController::class,'addservice'])->name('addservice')->middleware('provider');
        Route::get('/service/all', [App\Http\Controllers\Provider\ServiceController::class,'allservice'])->name('allservice')->middleware('provider');

//Meeting
        Route::get('/meeting', [App\Http\Controllers\Provider\MeetingController::class,'showmeeting'])->name('showmeeting')->middleware('provider');
        Route::post('/meeting/{id}', [App\Http\Controllers\Provider\MeetingController::class,'acceptmeeting'])->name('acceptmeeting')->middleware('provider');

       //message
        Route::get('/message/{id}', [App\Http\Controllers\Provider\MessageController::class,'showmessage'])->name('showmessage')->middleware('provider');
        Route::post('/message/{id}', [App\Http\Controllers\Provider\MessageController::class,'sendmessage'])->name('sendmessage')->middleware('provider');

        //Product Routes
        Route::get('/product/create', [App\Http\Controllers\Provider\BackProductsController::class, 'create'])->name('createproduct')->middleware('provider');

        Route::get('/product', [App\Http\Controllers\Provider\BackProductsController::class, 'index'])->name('allproducts')->middleware('provider');


        Route::post('/product/create', [App\Http\Controllers\Provider\BackProductsController::class, 'store'])->name('product.store')->middleware('provider');

        Route::get('/product/edit/{id}', [App\Http\Controllers\Provider\BackProductsController::class, 'edit'])->name('product.edit')->middleware('provider');


        Route::post('/product/edit/{id}', [App\Http\Controllers\Provider\BackProductsController::class, 'update'])->name('product.update')->middleware('provider');

        Route::post('/product/delete/{id}', [App\Http\Controllers\Provider\BackProductsController::class, 'delete'])->name('product.delete')->middleware('provider');


    });


});

