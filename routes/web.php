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

Route::get('/about-us', function () {
    dd('About US');
});


Route::get('/', function () {

    return view('dashboard');
});

Route::get('apsweb', 'App\Http\Controllers\APSWebController@index');
Route::get('tokenapsweb', 'App\Http\Controllers\APSWebController@tokenization');
Route::get('b2cinvoice/{eInvoiceId}', 'App\Http\Controllers\EinvoiceWebController@initInvoice');
//QR Code
Route::get('/generateQr/{qrCode}', 'App\Http\Controllers\QrCodesWebController@generateQr');

Route::get('b2ceinvoice/{eInvoiceId}', 'App\Http\Controllers\EinvoiceWebController@initEInvoice');

Route::get('einvoiceb2b/{eInvoiceId}', 'App\Http\Controllers\EinvoiceWebController@initEInvoiceInDashboardB2B');
Route::get('einvoiceb2b/cr/{eInvoiceId}', 'App\Http\Controllers\EinvoiceWebController@initCreditNoteB2B');
Route::get('einvoiceb2c/{eInvoiceId}', 'App\Http\Controllers\EinvoiceWebController@initEInvoiceInDashboardB2C');
Route::get('einvoiceb2c/cr/{eInvoiceId}', 'App\Http\Controllers\EinvoiceWebController@initCreditNoteB2C');


/*
Route::group(['namespace' => 'App\Http\Controllers\api\v1\aps\client', 'prefix' => 'v1'], function() {
 *
    Route::get('aps', 'APSWebController@index');
});*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Subscription Module. Start
Route::get('/subscriptionlisting', [App\Http\Controllers\SubscriptionWebController::class, 'index'])->name('subscriptionlandingpage');
//Subscription Module. End
//Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::post('/importb2b', 'App\Http\Controllers\EinvoiceWebController@importInvoicesFromExcelB2B')->name('import')->middleware('auth');
Route::post('/importb2c', 'App\Http\Controllers\EinvoiceWebController@importInvoicesFromExcelB2C')->name('importb2c')->middleware('auth');
Route::post('/importitem', 'App\Http\Controllers\ItemWebController@importItemsFromExcel')->name('importitem')->middleware('auth');
Route::post('/importitemservice', 'App\Http\Controllers\ItemServiceWebController@importItemsFromExcel')->name('importitemservice')->middleware('auth');
Route::post('/importvendor', 'App\Http\Controllers\VendorWebController@importVendorFromExcel')->name('importvendor')->middleware('auth');
Route::post('/importcustomerb2c', 'App\Http\Controllers\CustomerWebController@importCsutomersB2CFromExcel')->name('importcustomerb2c')->middleware('auth');
Route::post('/importcustomerb2b', 'App\Http\Controllers\CustomerWebController@importCsutomersB2BFromExcel')->name('importcustomerb2b')->middleware('auth');
//Item Vendor
Route::get('/itemvendor', 'App\Http\Controllers\ItemVendorWebController@initItemVendorPage')->name('itemvendor')->middleware('auth');
Route::get('/einvoiceadd', 'App\Http\Controllers\EinvoiceWebController@addInvoice')->name('einvoiceadd')->middleware('auth');
Route::get('/einvoiceaddb2b', 'App\Http\Controllers\EinvoiceWebController@addInvoiceB2B')->name('einvoiceaddb2b')->middleware('auth');
Route::get('/registeruser', 'App\Http\Controllers\RegisterUserWebController@registerUser')->name('registeruser')->middleware('auth');
Route::get('/pagesaccess', 'App\Http\Controllers\RegisterUserWebController@pagesAccess')->name('pagesaccess')->middleware('auth');
Route::get('/ruwaitapproval', 'App\Http\Controllers\RegisterUserWebController@redirectUser')->name('ruwaitapproval');
Route::get('/usernotapproved', 'App\Http\Controllers\RegisterUserWebController@userNotApproved')->name('usernotapproved');
Route::get('/usercompanies', 'App\Http\Controllers\RegisterUserWebController@usercompanies')->name('usercompanies');
Route::get('/loginbycompany', ['as' => 'user.loginbycompany', 'uses' => 'App\Http\Controllers\RegisterUserWebController@loginbycompany']);

//Sign Up Process
Route::get('/signupotp', 'App\Http\Controllers\RegisterUserWebController@signUpOtp')->name('signupotp');
Route::get('/signupfinish', 'App\Http\Controllers\RegisterUserWebController@signUpFinish')->name('signupfinish');
Route::get('/signupregister', 'App\Http\Controllers\RegisterUserWebController@signUpRegister')->name('signupregister');






// Authentication Routes...
//Route::get('login', 'App\Http\Controllers\LoginController@showLoginForm')->name('login');
//Route::post('login', 'App\Http\Controllers\LoginController@login');
//Route::post('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register/{companyprofileselect}', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
Route::post('register1/{companyprofileselect}', 'App\Http\Controllers\Auth\RegisterController@register')->name('register1');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\ResetPasswordController@reset');
//Auth Routes

Route::group(['middleware' => 'auth'], function () {
//	Route::get('table-list', function () {
//		return view(*/'pages.table_list');
//	})->name('table');

        Route::get('einvoiceb2b', 'App\Http\Controllers\EinvoiceWebController@listInvoicesB2B')->name('einvoiceb2b');
        Route::get('einvoiceb2c', 'App\Http\Controllers\EinvoiceWebController@listInvoicesB2C')->name('einvoiceb2c');



	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

//        Route::get('itemmaster', function () {
//		return view('pages.itemmaster');
//	})->name('itemmaster');

        Route::get('itemmaster', 'App\Http\Controllers\ItemWebController@listItems')->name('itemmaster');
        Route::get('servicemaster', 'App\Http\Controllers\ItemServiceWebController@listItemServices')->name('servicemaster');
        Route::get('servicemasterwizard', 'App\Http\Controllers\ItemServiceWebController@itemServicesWizard')->name('servicemasterwizard');
        Route::get('itemmasterwizard', 'App\Http\Controllers\ItemWebController@itemServicesWizard')->name('itemmasterwizard');
        Route::get('b2beinvoicewizard', 'App\Http\Controllers\EinvoiceWebController@b2bEinvoiceWizard')->name('b2beinvoicewizard');
        Route::get('b2ceinvoicewizard', 'App\Http\Controllers\EinvoiceWebController@b2cEinvoiceWizard')->name('b2ceinvoicewizard');
        Route::get('vendorWizard', 'App\Http\Controllers\VendorWebController@vendorWizard')->name('vendorWizard');
        Route::get('b2beinvoicelinewizard', 'App\Http\Controllers\EinvoiceWebController@b2bEinvoiceLineWizard')->name('b2beinvoicelinewizard');
        Route::get('b2ceinvoicelinewizard', 'App\Http\Controllers\EinvoiceWebController@b2cEinvoiceLineWizard')->name('b2ceinvoicelinewizard');
        Route::get('vendormaster', 'App\Http\Controllers\VendorWebController@listVendors')->name('vendormaster');
        Route::get('customermasterb2c', 'App\Http\Controllers\CustomerWebController@listCustomersB2C')->name('customermasterb2c');
        Route::get('companyprofile', 'App\Http\Controllers\ProfileController@getCompanyProfile')->name('companyprofile');
        Route::get('customermasterb2b', 'App\Http\Controllers\CustomerWebController@listCustomersB2B')->name('customermasterb2b');
        Route::get('customermasterb2bwizard', 'App\Http\Controllers\CustomerWebController@customerB2BWizard')->name('customermasterb2bwizard');
        Route::get('customermasterb2cwizard', 'App\Http\Controllers\CustomerWebController@customerB2CWizard')->name('customermasterb2cwizard');
        
        Route::post('saveitemservice', 'App\Http\Controllers\ItemServiceWebController@saveWizardItemService')->name('saveitemservice');
        Route::post('saveitemmaster', 'App\Http\Controllers\ItemWebController@saveWizardItemMaster')->name('saveitemmaster');
        Route::post('saveEinvoiceB2B', 'App\Http\Controllers\EinvoiceWebController@saveWizardEinvoiceB2B')->name('saveEinvoiceB2B');
        Route::post('saveEinvoiceB2C', 'App\Http\Controllers\EinvoiceWebController@saveWizardEinvoiceB2C')->name('saveEinvoiceB2C');
        Route::post('saveEinvoiceLineB2B', 'App\Http\Controllers\EinvoiceWebController@saveWizardEinvoiceLineB2B')->name('saveEinvoiceLineB2B');
        Route::post('saveEinvoiceLineB2C', 'App\Http\Controllers\EinvoiceWebController@saveWizardEinvoiceLineB2C')->name('saveEinvoiceLineB2C');
        Route::post('savecustomerb2b', 'App\Http\Controllers\CustomerWebController@saveWizardCustomerB2B')->name('savecustomerb2b');
        Route::post('savecustomerb2c', 'App\Http\Controllers\CustomerWebController@saveWizardCustomerB2C')->name('savecustomerb2c');
        Route::post('saveWizardVendor', 'App\Http\Controllers\VendorWebController@saveWizardVendor')->name('saveWizardVendor');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
        Route::put('companydatasave', ['as' => 'companydatasave', 'uses' => 'App\Http\Controllers\ProfileController@updateCompanyData']);
        //EInvoice
        Route::put('einvoice', ['as' => 'einvoice.update', 'uses' => 'App\Http\Controllers\EinvoiceWebController@update']);
        Route::put('registeruser', ['as' => 'register.update', 'uses' => 'App\Http\Controllers\RegisterUserWebController@activateUser']);
        
        Route::put('pagesaccess', ['as' => 'pagesaccess.update', 'uses' => 'App\Http\Controllers\RegisterUserWebController@providePagesAccess']);

        //Item Vendor
        Route::put('itemvendor', ['as' => 'itemvendor.update', 'uses' => 'App\Http\Controllers\ItemVendorWebController@update']);
});

//Routing Downloads
Route::get( '/download/{filename}', 'App\Http\Controllers\EinvoiceWebController@download');


