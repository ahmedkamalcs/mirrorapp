@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<?php use App\Models\User;?>
  <div class="content">
    <div class="container-fluid">
<!--      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input disabled="true" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>-->
<!--      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>-->

    <div class="row">
    <div class="col-md-12">

        @if(User::isUserCanViewUserProfile() == '0')
        <div class="card-header card-header-primary">
            <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->
        </div>
        @endif

      @if(User::isUserCanViewUserProfile() == '1')
      <form method="post" action="{{ route('profile.companydata') }}" class="form-horizontal">
        @csrf
        @method('put')

        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Company Profile') }}</h4>
            <p class="card-category">{{ __('Company Data') }}</p>
          </div>

            <div class="card-body ">
                <div class="row">

                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                       <input type="hidden"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="companyName" id="companyName" type="text" value="{{ $companyProfileDTO->getCompanyName() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input type="hidden"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="companyCode" id="companyCode" type="text" value="{{ $companyProfileDTO->getCompanyCode() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Business Name') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="businessName" id="businessName" type="text" value="{{ $companyProfileDTO->getBusinessName() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Email Id') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="emailId" id="emailId" type="text" value="{{ $companyProfileDTO->getEmailId() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>



                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Contact Name') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="contactName" id="contactName" type="text" value="{{ $companyProfileDTO->getContactName() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Contact Number') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="contactNumber" id="contactNumber" type="text" value="{{ $companyProfileDTO->getContactNumber() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="country" id="country" type="text" value="{{ $companyProfileDTO->getCountry() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('City') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="city" id="city" type="text" value="{{ $companyProfileDTO->getCity() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('CR Number') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="crNumber" id="crNumber" type="text" value="{{ $companyProfileDTO->getCrNumber() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('CR Upload') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input type ="hidden" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="crUpload" id="crUpload" type="text" value="{{ $companyProfileDTO->getCrUpload() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('VAT Number') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="vatNumber" id="vatNumber" type="text" value="{{ $companyProfileDTO->getVatNumber() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('VAT Certificate') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input type ="hidden" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="vatCertificate" id="vatCertificate" type="text" value="{{ $companyProfileDTO->getVatCertificateUpload() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Business Logo') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input type ="hidden" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="businessLogo" id="businessLogo" type="text" value="{{ $companyProfileDTO->getBusinessLogoUpload() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="bankName" id="bankName" type="text" value="{{ $companyProfileDTO->getBankName() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('Bank Account Number') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="bankAccountNumber" id="bankAccountNumber" type="text" value="{{ $companyProfileDTO->getBankAccountNumber() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">{{ __('IBAN') }}</label>
                 <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="iban" id="iban" type="text" value="{{ $companyProfileDTO->getIban() }}" required="true" aria-required="true"/>
                     @if ($errors->has('name'))
                       <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                     @endif
                   </div>
                 </div>
               </div>

            </div>


          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
          </div>
        </div>
      </form>
      @endif
    </div>
  </div>
    </div>
  </div>
@endsection
