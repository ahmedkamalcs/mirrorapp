@extends('layouts.app', ['activePage' => 'pagesaccess', 'titlePage' => __('Pages Access')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

       @if(User::isUserCanRegisterUser() == '0')
       <div class="card-header card-header-primary">
            <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->
        </div>
        @endif

        @if(User::isUserCanRegisterUser() == '1')
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Users List</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->
          </div>
        <form method="post" action="{{ route('pagesaccess.update') }}" autocomplete="off" class="form-horizontal">
        @csrf
        @method('put')

          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    User Name
                  </th>
                  <th>
                    User Email
                  </th>
                  {{-- <th>
                    Approved?
                  </th> --}}
                  <th>
                    EInvoice B2B?
                  </th>
                  <th>
                    EInvoice B2C?
                  </th>
                  <th>
                    Add B2C?
                  </th>
                  <th>
                    Add B2B?
                  </th>
                  <th>
                    Item Master?
                  </th>
                  <th>
                    Service Master?
                  </th>
                  <th>
                    Vendor Master?
                  </th>
                  <th>
                    Customer Master B2B?
                  </th>
                  <th>
                    Customer Master B2C?
                  </th>
                  <th>
                    Item Vendor?
                  </th>
                  <th>
                    User Profile?
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                @if( $usersArr != null )
                @foreach ($usersArr as $userObj)
                  <tr>
                    <td>
                      {{$userObj->name}}
                    </td>
                    <td>
                      {{$userObj->email}}
                      <input type="hidden" id="userEmail" name="userEmail" value="{{$userObj->email}}"/>
                    </td>
                    {{-- <td>
                        @if($userObj->approved == '1')
                        <input type="checkbox" name="approvecheckbox" value="{{$userObj->approved}}" checked/>
                        @endif
                        @if($userObj->approved == '0')
                        <input type="checkbox" name="approvecheckbox" value="{{$userObj->approved}}"/>
                        @endif
                    </td> --}}
                    <td>
                        @if($userObj->can_view_einvoice_b2b == '1')
                        <input type="checkbox" name="einvoiceB2B" value="{{$userObj->can_view_einvoice_b2b}}" checked/>
                        @endif
                        @if($userObj->can_view_einvoice_b2b == '0')
                        <input type="checkbox" name="einvoiceB2B"  value="{{$userObj->can_view_einvoice_b2b}}"/>
                        @endif
                        <input type="hidden" id="inputEinvoiceB2B" name="inputEinvoiceB2B" value="{{$userObj->can_view_einvoice_b2b}}"/>
                    </td>
                    <td>
                        @if($userObj->can_view_einvoice_b2c == '1')
                        <input type="checkbox" name="einvoiceB2C" id="einvoiceB2C" value="{{$userObj->can_view_einvoice_b2c}}" checked/>
                        @endif
                        @if($userObj->can_view_einvoice_b2c == '0')
                        <input type="checkbox" name="einvoiceB2C" id="einvoiceB2C" value="{{$userObj->can_view_einvoice_b2c}}"/>
                        @endif
                        <input type="hidden" id="inputEinvoiceB2C" name="inputEinvoiceB2C" value="{{$userObj->can_view_einvoice_b2c}}"/>
                    </td>
                    <td>
                        @if($userObj->can_add_b2c == '1')
                        <input type="checkbox" name="addb2c" id="addb2c" value="{{$userObj->can_add_b2c}}" checked/>
                        @endif
                        @if($userObj->can_add_b2c == '0')
                        <input type="checkbox" name="einvoiceB2C" id="einvoiceB2C" value="{{$userObj->can_add_b2c}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_add_b2b == '1')
                        <input type="checkbox" name="addb2b" id="addb2b" value="{{$userObj->can_add_b2b}}" checked/>
                        @endif
                        @if($userObj->can_add_b2b == '0')
                        <input type="checkbox" name="addb2b" id="einvoiceB2C" value="{{$userObj->can_add_b2b}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_item_master == '1')
                        <input type="checkbox" name="itemmaster" id="itemmaster" value="{{$userObj->can_view_item_master}}" checked/>
                        @endif
                        @if($userObj->can_view_item_master == '0')
                        <input type="checkbox" name="itemmaster" id="itemmaster" value="{{$userObj->can_view_item_master}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_service_master == '1')
                        <input type="checkbox" name="servicemaster" id="servicemaster" value="{{$userObj->can_view_service_master}}" checked/>
                        @endif
                        @if($userObj->can_view_service_master == '0')
                        <input type="checkbox" name="servicemaster" id="servicemaster" value="{{$userObj->can_view_service_master}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_vendor_master == '1')
                        <input type="checkbox" name="vendormaster" id="vendormaster" value="{{$userObj->can_view_vendor_master}}" checked/>
                        @endif
                        @if($userObj->can_view_vendor_master == '0')
                        <input type="checkbox" name="vendormaster" id="vendormaster" value="{{$userObj->can_view_vendor_master}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_customer_master_b2b == '1')
                        <input type="checkbox" name="customermasterb2b" id="customermasterb2b" value="{{$userObj->can_view_customer_master_b2b}}" checked/>
                        @endif
                        @if($userObj->can_view_customer_master_b2b == '0')
                        <input type="checkbox" name="customermasterb2b" id="customermasterb2b" value="{{$userObj->can_view_customer_master_b2b}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_customer_master_b2c == '1')
                        <input type="checkbox" name="customermasterb2c" id="customermasterb2c" value="{{$userObj->can_view_customer_master_b2c}}" checked/>
                        @endif
                        @if($userObj->can_view_customer_master_b2c == '0')
                        <input type="checkbox" name="customermasterb2c" id="customermasterb2c" value="{{$userObj->can_view_customer_master_b2c}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_item_vendor == '1')
                        <input type="checkbox" name="itemvendor" id="itemvendor" value="{{$userObj->can_view_item_vendor}}" checked/>
                        @endif
                        @if($userObj->can_view_item_vendor == '0')
                        <input type="checkbox" name="itemvendor" id="itemvendor" value="{{$userObj->can_view_item_vendor}}"/>
                        @endif
                    </td>
                    <td>
                        @if($userObj->can_view_user_profile == '1')
                        <input type="checkbox" name="userprofile" id="userprofile" value="{{$userObj->can_view_user_profile}}" checked/>
                        @endif
                        @if($userObj->can_view_user_profile == '0')
                        <input type="checkbox" name="userprofile" id="userprofile" value="{{$userObj->can_view_user_profile}}"/>
                        @endif
                    </td>
                    <td class="text-primary">
                       <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                      </div>
                    </td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </form>

        </div>

          @endif
      </div>
    </div>
  </div>
</div>
@endsection
