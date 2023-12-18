<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\CompanyProfileDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Models\api\v1\companyprofile\CompanyProfile;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\api\v1\mail\HubSaMailer;

class ProfileController extends Controller {

    public function getCompanyProfile() {
//        $bCustomer = new BCustomer();
//        $customersArr = $bCustomer->listAllCustomersB2C();
//        return view('pages.customermasterb2c', compact('customersArr'));

        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
        return view('pages.companyprofile', compact('companyProfileDTO'));
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit() {
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
        return view('profile.edit', compact('companyProfileDTO'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request) {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request) {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function updateCompanyData(Request $request) {
        if ($request->action == 'save') {
            return $this->updateCompany($request);
        }else if($request->action == 'invite') {
            return $this->inviteUserToRegister($request);
        }
    }

    private function updateCompany(Request $request) {
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = new CompanyProfileDTO();

        $bCompanyProfile->saveObject($this->fillInCompanyProfileDTO($request, $companyProfileDTO));

        return back()->withStatus(__('Company data successfully updated.'));
    }
    
    private function inviteUserToRegister(Request $request){
        
        $mail = $request->userEmailId;
        $message = AppDTO::$APP_REGISTER_URL . $request->companyCode;

//        echo $mail; echo "  "; echo $message; die;
        
        $dataArray = [
            'subject' => 'Hub.Sa App',
            'message' => $message
        ];

        Mail::to($mail)->send(new HubSaMailer($dataArray));
        
        return back()->withStatus(__('Invitation sent successfully!'));
    }

    private function fillInCompanyProfileDTO(Request $request, $companyProfileDTO) {

        $companyProfileDTO->setCompanyName($request->companyName);
        $companyProfileDTO->setCompanyCode($request->companyCode);
        $companyProfileDTO->setBusinessName($request->businessName);
        $companyProfileDTO->setEmailId($request->emailId);
        $companyProfileDTO->setContactName($request->contactName);
        $companyProfileDTO->setContactNumber($request->contactNumber);
        $companyProfileDTO->setCountry($request->country);
        $companyProfileDTO->setCity($request->city);
        $companyProfileDTO->setCrNumber($request->crNumber);
        $companyProfileDTO->setCrUpload($request->crUpload);
        $companyProfileDTO->setVatNumber($request->vatNumber);
        $companyProfileDTO->setVatCertificateUpload($request->vatCertificate);
        $companyProfileDTO->setBusinessLogoUpload($request->businessLogo);
        $companyProfileDTO->setBankName($request->bankName);
        $companyProfileDTO->setBankAccountNumber($request->bankAccountNumber);
        $companyProfileDTO->setIban($request->iban);
        $companyProfileDTO->setVatRate($request->vatRate);
        $companyProfileDTO->setCurrency($request->currency);
        return $companyProfileDTO;
    }

}
