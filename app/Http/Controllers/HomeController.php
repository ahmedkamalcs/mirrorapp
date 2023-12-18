<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Http\Controllers\api\v1\dto\CompanyProfileDTO;
use Illuminate\Support\Facades\Hash;
use App\Models\api\v1\companyprofile\CompanyProfile;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
               
        /*$einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");*/
        
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
        
        $password = 'h';
        $hashedPassword = Hash::make($password);


        $companyProfileDTO->setPassword($hashedPassword);
        
        return view('dashboard', compact('companyProfileDTO'));
    }

     
}
