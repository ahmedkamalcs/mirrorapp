<?php

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*Rout User Model. Group v1*/
/*Registration*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\usermodel\client', 'prefix' => 'v1'], function() {
    Route::post('listUser', 'UserClient@listAll');
    Route::post('loginByUserName', 'UserClient@loginByUserName');
    Route::post('loginByPhoneNo', 'UserClient@loginByPhoneNumber');
    Route::post('createUser', 'UserClient@createUser');
    Route::post('createUserByPhoneNumber', 'UserClient@createUserByPhoneNumber');
    Route::post('saveUserBooking', 'UserBookingClient@save');
    Route::post('addUserToCompany', 'UserClient@addUserToCompany');
    Route::post('listUsersCompanies', 'UserClient@listUsersCompanies');
    Route::post('listUserCompaniesByUserId', 'UserClient@listUserCompaniesByUserId');
    Route::post('listUserCompaniesByEmailId', 'UserClient@listUserCompaniesByEmailId');
    //Route::post('validateUser', 'UserClient@validateUser');
});

/*Rout Payment Model. Group v1*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\paymentmodel\client', 'prefix' => 'v1'], function() {
    Route::post('savePaymentProviderConfig', 'PaymentProviderConfigClient@save');
    Route::post('savePaymentUserConfiguration', 'PaymentUserConfigurationClient@save');
    Route::post('savePaymentVendorMaster', 'PaymentVendorMasterClient@save');
    Route::post('savePaymentCheckout', 'PaymentCheckoutClient@save');
    Route::post('savePaymentPayee', 'PaymentPayeeClient@save');
    Route::post('saveInvoice', 'InvoiceClient@save');
    Route::post('saveUserInvoice', 'PaymentUserInvoiceClient@save');
    Route::post('payEInvoice', 'PaymentEInvoiceClient@save');
});

/*Rout E-Invoice*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\einvoice\client', 'prefix' => 'v1'], function() {
    Route::post('saveEInvoiceHeader', 'EInvoiceHeaderClient@save');
    Route::post('saveEInvoiceLine', 'EInvoiceLineClient@save');
    Route::post('getEInvoiceHeader', 'EInvoiceHeaderClient@getEInvoiceHeaderById');
});

/*Rout SNS. Group v1*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\sns\client', 'prefix' => 'v1'], function() {
    Route::post('pushSnsMessage', 'SnsServiceClient@pushMessage');
    Route::post('saveOtp', 'UserOtpClient@saveOtp');
    Route::post('verifyOtp', 'UserOtpClient@verifyOtp');
    Route::post('verifyLogingOtp', 'UserOtpClient@verifyLogingOtp');
});

/*Rout Salon. Group v1*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\salon\client', 'prefix' => 'v1'], function() {
    Route::post('uploadSalonGalleryAndLogo', 'SalonClient@SalonGalleryAndLogo');
    Route::post('lstDefaultServices', 'SalonClient@lstDefaultServices');
  //  Route::post('SaveDefaultServices', 'SalonClient@SaveDefaultServices');
    Route::post('saveSalonData', 'SalonClient@saveSalonData');
    Route::post('saveSalonWorkStyle', 'SalonClient@saveSalonWorkStyle');
    Route::post('saveSalonServiceType', 'SalonClient@saveSalonServiceType');
    Route::post('saveSalonServiceGender', 'SalonClient@saveSalonServiceGender');
    Route::post('saveDefaultServices', 'SalonClient@saveDefaultServices');
    Route::post('saveSalonWorkingDays', 'SalonClient@saveSalonWorkingDays');
    Route::post('saveSalonBranches', 'SalonClient@saveSalonBranches');
    Route::post('saveSalonEmployee', 'SalonClient@saveSalonEmployee');
    Route::post('updateSalonEmployee', 'SalonClient@updateSalonEmployee');
});

/*Rout Tax Model. Group v1*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\tax\client', 'prefix' => 'v1'], function() {
    Route::post('saveTax', 'TaxClient@save');
});


/*Rout Vendor Model. Group v1*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\vendor\client', 'prefix' => 'v1'], function() {
    Route::post('saveVendor', 'VendorMasterClient@save');
    Route::post('saveVendorCalendar', 'VendorBookingCalendarClient@save');
    Route::post('listFreeVendorBookingCalendar', 'VendorBookingCalendarClient@listFreeVendorBookingCalendar');
    Route::post('listFreeVendorBookingCalendarByUserId', 'VendorBookingCalendarClient@listFreeVendorBookingCalendarByUserId');
    Route::post('saveVendorProfile', 'VendorProfileClient@save');
});

/*Rout Vendor Model. Group v1*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\order\client', 'prefix' => 'v1'], function() {
    Route::post('saveOrder', 'OrderMasterClient@save');
    Route::post('saveOrderDetails', 'OrderDetailsClient@save');
    Route::post('addToBasket', 'OrderBasketClient@save');
    Route::post('basketToOrder', 'OrderBasketClient@basketToOrder');
});


/*Payment*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\aps\client', 'prefix' => 'v1'], function() {
    Route::post('requestAuth', 'APSClient@requestAuthorization');
    Route::post('signature', 'APSClient@signature');
    Route::post('tokenRequest', 'APSClient@tokenRequest');
    Route::post('getSignatureForToken', 'APSClient@getSignatureForToken');
});

/*Privacy Policy*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\privacypolicy\client', 'prefix' => 'v1'], function() {
    Route::post('savePrivacyPolicyHeader', 'PrivacyPolicyHeaderClient@save');
    Route::post('savePrivacyPolicyLine', 'PrivacyPolicyLinesClient@save');
    Route::post('savePrivacyPolicyQuestionnaire', 'PrivacyPolicyQuestionnaireClient@save');
    Route::post('savePrivacyPolicyTemplate', 'PrivacyPolicyTemplateClient@save');
    Route::post('saveUserPrivacyPolicy', 'UserPrivacyPolicyClient@save');
});

/*Subscription Module*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\subscription\client', 'prefix' => 'v1'], function() {
    Route::post('listServicePlans', 'ServicePlanClient@listServicePlans');
    Route::post('addServiceItem', 'ServiceItemClient@addServiceItem');
    Route::post('addServicePlan', 'ServicePlanClient@addServicePlan');
    Route::post('activateServicePlan', 'ServicePlanClient@activateServicePlan');
    Route::post('deActivateServicePlan', 'ServicePlanClient@deActivateServicePlan');
    Route::post('addServicePlanItem', 'ServicePlanItemsClient@addServicePlanItem');
    Route::post('addSubscriber', 'ServiceSubscriberClient@addSubscriber');
    Route::post('listSubscriberPlan', 'ServiceSubscriberClient@listSubscriberPlan');
    Route::post('addSubscriberToAPlan', 'ServicePlanSubscriberClient@addSubscriberToAPlan');
    Route::post('updateServicePlanTotalPrice', 'ServicePlanClient@updateServicePlanTotalPrice');
    Route::post('activateSubscriberServicePlan', 'ServicePlanSubscriberClient@activateServicePlan');
    Route::post('deActivateSubscriberServicePlan', 'ServicePlanSubscriberClient@deActivateServicePlan');
});

/*Product Listing*/
Route::group(['namespace' => 'App\Http\Controllers\api\v1\listing\client', 'prefix' => 'v1'], function() {
    Route::post('listProducts', 'ProductListingClient@listProducts');
});


/*..........................Version 2...........................*/
Route::group(['namespace' => 'App\Http\Controllers\api\v2\usermodel\client', 'prefix' => 'v2'], function() {
    Route::post('listUser', 'UserClient@listAll');

});


