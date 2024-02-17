<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationDTO
 *
 * @author Ahmed Kamal
 */

namespace App\Http\Controllers\api\v1\dto;
class AppDTO {
    // Salon Gallery & logo path
    public static $access_code="rxaCBohhRdmZopQxc4gu";
    public static $merchant_identifier="649f24c2";
    PUBLIC STATIC $request_pharse="51Jc4kI8CSOQ8U1O7cq3ny}_";
    public static $salonGalleryPath = "public/SalonGallery/";
    public static $serverlink = "http://8.213.32.175/mirrorapp/public/";// --- http://localhost/mirrorapp/public/
    public static $salonLogoPath = "public/SalonLogo/";
    public static $salonCommercialPath = "public/SalonCommercial/";
    public static $salonTaxPath = "public/SalonTax/";
    public static $salonIBANPath = "public/SalonIBAN/";
    public static $serviceCategoryIconPath = "public/ServiceIcone/";
    public static $_EP = true;
    public static $TRUE_AS_STRING = '1';
    public static $FALSE_AS_STRING = '0';
    public static $VAT_TAX_CODE = 'VAT';

    //Invoice
    public static $INVOICE_TYPE_PAID = 'PAID';
    public static $INVOICE_TYPE_FREE = 'Free';
    public static $INVOICE_STATUS_PENDING_PAYMENT = 'PP';
    public static $INVOICE_STATUS_NOT_PAID = 'NP';
    public static $INVOICE_STATUS_PAID = 'P';

    //Order
    public static $ORDER_NO_SERIES = 'ORDER_NO_S';
    public static $EINVOICE_NO_SERIES = 'EInvoice_NO_S';
    public static $ORDER_NO_INPROGRESS = 'InProgress';
    public static $ORDER_NO_COMPLETED = 'Completed';
    public static $ORDER_NO_CANCELLED = 'Cancelled';

    //Commission
    public static $COMMISSION_TYPE_FIXED_AMOUNT = 'FixedA';
    public static $COMMISSION_TYPE_PERCENT = 'Percent';

    //Live
	public static $EINVOICE_URL = 'http://hubs.sa/einvoiceb2b/';
	public static $EINVOICE_URL_B2C = 'http://hubs.sa/einvoiceb2c/';
	public static $APP_REGISTER_URL= 'http://hubs.sa/register/';
   
   //Local
    //public static $EINVOICE_URL = 'http://localhost/einvoiceb2b/';
    //public static $EINVOICE_URL_B2C = 'http://localhost/einvoiceb2c/';
    //public static $APP_REGISTER_URL= 'http://localhost/register/';
    

    //Live
//     public static $EINVOICE_URL = 'http://13.59.53.175/hubtst/public/index.php/einvoiceb2b/';
//     public static $EINVOICE_URL_B2C = 'http://13.59.53.175/hub/public/index.php/einvoiceb2c/';
    
   
        
    public static $EINVOICE_TYPE_B2C = 'b2c';
    public static $EINVOICE_TYPE_B2B = 'b2b';
    public static $ITEM_TYPE_SERVICE = "service";
    public static $ITEM_TYPE_ITEM = "item";

//    public static $EINVOICE_URL = 'http://13.59.53.175/hub/public/index.php/table-list/';//Live

    //Invoice Workflow. E-Invoice Specific [einvoice_simplified_invoice_header]
    public static $EINVOICE_STATUS_ACTIVE = "Active";
    public static $EINVOICE_STATUS_VOID = "Void";
    public static $EINVOICE_STATUS_PAID = "Paid";
    public static $EINVOICE_STATUS_NOTPAID = "Not Paid";

    //Root Account
    public static $DEFAULT_ROOT_ACCOUNT_ROLE_ID = 1;
    public static $DEFAULT_USER_ACCOUNT_ROLE_ID = 2;

    //API Routing. Web and API Calls.
    public static $ROUT_TYPE_API = '0';
    public static $ROUT_TYPE_WEB = '1';
    
    public static $CURRENCY_SAR = "SAR";

    //System Series
    public static $INVOICE_PREFIX = "2300";
    
    //New Company Registration
    public static $REGISTER_NEW_COMPANY = "3266c19c-19b4-11ee-be56-0242ac120002";
    public static function getNewCompanyCode(){
        return time();
    }
}
