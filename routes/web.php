<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// public pages
Route::get('/about', 'PageController@about');
Route::get('/services', 'PageController@services');
Route::get('/contact', 'PageController@contact');

// Passanger
Route::prefix('passanger')->group(function() {
	Route::get('/login', 'Auth\PassangerLoginController@showLogInForm')->name('passanger.login');
	Route::post('/login', 'Auth\PassangerLoginController@login')->name('passanger.login.submit');
	Route::get('/register', 'Auth\PassangerRegisterController@showPassangerRegistrationForm')->name('passanger.register');
	Route::post('/register', 'Auth\PassangerRegisterController@register')->name('passanger.register.submit');
	Route::post('/logout', 'Auth\PassangerLoginController@passangerLogout')->name('passanger.logout');
	Route::get('/dashboard', 'PassangersController@dashboard')->name('passanger.dashboard')->middleware('auth:passanger');
	});

Auth::routes();

// Booking 
Route::get('/', 'BookingsController@index');
Route::get('/quote', 'BookingsController@getQuote');
Route::post('/select-car', 'BookingsController@selectCar');

//Chekout : creare the form
Route::get('/car/payment', 'PaymentsContoller@index');
Route::post('/car/booknow', 'PaymentsContoller@create');

//Guest checkout s
Route::post('/guest/checkout', 'GuestController@checkout');

// Submit payment form
Route::post('/checkout', 'CheckoutController@checkout');
Route:: get('/payment/thanks', 'PaymentsContoller@thanks');
Route:: get('/payment/errors', 'PaymentsContoller@errors');

