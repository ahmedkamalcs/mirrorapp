@extends('layouts.app', ['activePage' => 'itemvendor', 'titlePage' => __('Item Vendor')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if(User::isUserCanViewItemVendor() == '0')
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
                    <!--<p class="card-category">Here are your saved e-invoices</p>-->
                </div>
                @endif

                @if(User::isUserCanViewItemVendor() == '1')
                <form method="post" action="{{ route('itemvendor.update') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Item Vendor') }}</h4>
                            <p class="card-category">{{ __('Item Vendor Details') }}</p>
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
                                <label class="col-sm-2 col-form-label">{{ __('Vendor') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">

                                        @if( $itemVendorDTO->listVendorForSelectItems() != null )
                                        <select id="vendor" name="vendor" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                            @foreach ($itemVendorDTO->listVendorForSelectItems() as $vendorObj)
                                            <option value="{{$vendorObj->id}}"> {{ $vendorObj->name }} </option>
                                            @endforeach
                                        </select>

                                        @else
                                        <label class="col-form-label"> No Vendors Available </label>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Item') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        @if( $itemVendorDTO->listItemForSelectItems() != null )
                                        <select id="item" name="item" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                            @foreach ($itemVendorDTO->listItemForSelectItems() as $itemObj)
                                            <option value="{{$itemObj->id}}"> {{ $itemObj->item_name }} </option>
                                            @endforeach
                                        </select>
                                        @else
                                       <label class="col-form-label"> No Items Available </label>
                                        @endif
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
