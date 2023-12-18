@extends('layouts.app', ['activePage' => 'einvoiceaddb2b', 'titlePage' => __('E-Invoice Data Entry B2B')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if(User::isUserCanAddEInvoiceB2B() == '0')
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
                    <!--<p class="card-category">Here are your saved e-invoices</p>-->
                </div>
                @endif

                @if(User::isUserCanAddEInvoiceB2B() == '1')
                <form method="post" action="{{ route('einvoice.update') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('E-Invoice B2B') }}</h4>
                            <p class="card-category">{{ __('E-Invoice Details B2B') }}</p>
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
                                <label class="col-sm-2 col-form-label">{{ __('Issue Date:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                        <input type="datetime" class="form-control{{ $errors->has('issuedate') ? ' is-invalid' : '' }}" name="issuedate" id="input-name" type="text" placeholder="{{ __('Issue Date') }}" value="1/16/2022" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Supplier VAT No:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('suppliervatno') ? ' is-invalid' : '' }}" name="suppliervatno" id="input-name" type="text" placeholder="{{ __('Supplier VAT NO') }}" value="207" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Invoice Number:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('suppliervatno') ? ' is-invalid' : '' }}" name="invoiceno" id="input-name" type="text" placeholder="{{ __('Invoice NO') }}" value="207" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <!--                <div class="row">
                                              <label class="col-sm-2 col-form-label">{{ __('Order Number:') }}</label>
                                              <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                  <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                                                  @if ($errors->has('name'))
                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                  @endif
                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
                                                <input class="form-control{{ $errors->has('orderno') ? ' is-invalid' : '' }}" name="orderno" id="input-name" type="text" placeholder="{{ __('Name') }}" value="888" required="true" aria-required="true"/>
                                                </div>
                                              </div>
                                            </div>-->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Company Name:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('companyname') ? ' is-invalid' : '' }}" name="companyname" id="input-name" type="text" placeholder="{{ __('Company Name') }}" value="Hub Systems" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Supplier Name:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('suppliername') ? ' is-invalid' : '' }}" name="suppliername" id="input-name" type="text" placeholder="{{ __('Supplier Name') }}" value="ISG Company" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Supplier Address:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('supplieraddress') ? ' is-invalid' : '' }}" name="supplieraddress" id="input-name" type="text" placeholder="{{ __('Supplier Address') }}" value="Alyaqoot" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <!--                <div class="row">
                                              <label class="col-sm-2 col-form-label">{{ __('Company VAT No:') }}</label>
                                              <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                  <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                                                  @if ($errors->has('name'))
                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                  @endif
                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
                                                <input class="form-control{{ $errors->has('companyvatno') ? ' is-invalid' : '' }}" name="companyvatno" id="input-name" type="text" placeholder="{{ __('Company VAT NO') }}" value="208" required="true" aria-required="true"/>
                                                </div>
                                              </div>
                                            </div>-->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Transaction Type:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('transactiontype') ? ' is-invalid' : '' }}" name="transactiontype" id="input-name" type="text" placeholder="{{ __('Transaction Type') }}" value="Standard Supply" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('VAT Rate:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('vatrate') ? ' is-invalid' : '' }}" name="vatrate" id="input-name" type="text" placeholder="{{ __('VAT Rate') }}" value="15" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="col-sm-2 col-form-label">{{ __('Invoice Lines') }}</h6>
                            </div>


                            <div class="row">
                                <hr style="width:50%;text-align:left;margin-left:0">
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Item Name:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('itemname') ? ' is-invalid' : '' }}" name="itemname" id="input-name" type="text" placeholder="{{ __('Item Name') }}" value="" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Unit Price:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('unitprice') ? ' is-invalid' : '' }}" name="unitprice" id="input-name" type="text" placeholder="{{ __('Unit Price') }}" value="" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Quantity:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" id="input-name" type="text" placeholder="{{ __('Quantity') }}" value="" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Taxable Amount:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('taxableamount') ? ' is-invalid' : '' }}" name="taxableamount" id="input-name" type="text" placeholder="{{ __('Taxable Amount') }}" value="" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tax Rate:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('taxrate') ? ' is-invalid' : '' }}" name="taxrate" id="input-name" type="text" placeholder="{{ __('Tax Rate') }}" value="15" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tax Amount:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('taxamount') ? ' is-invalid' : '' }}" name="taxamount" id="input-name" type="text" placeholder="{{ __('Tax Amount') }}" value="" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Currency:') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>-->
                                        <!--                      @if ($errors->has('name'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                              @endif-->
                                                            <!--<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />-->
                                        <input class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}" name="currency" id="input-name" type="text" placeholder="{{ __('Currency') }}" value="SAR" required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <!--                <div class="row">
                                              <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                              <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                  <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                                                  @if ($errors->has('email'))
                                                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                  @endif
                                                </div>
                                              </div>
                                            </div>-->
                        </div>

                        <input type="hidden" id="invoicetype" name="invoicetype" value="b2b">

                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
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
    </div>
</div>
@endsection
