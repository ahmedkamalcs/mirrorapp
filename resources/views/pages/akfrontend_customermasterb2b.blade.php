@extends('layouts.app', ['activePage' => 'customermasterb2b', 'titlePage' => __('Customer Master B2B')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        @if(User::isUserCanViewCustomerMasterB2B() == '0')
        <div class="card-header card-header-primary">
            <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->
        </div>
        @endif

        @if(User::isUserCanViewCustomerMasterB2B() == '1')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Customer Master</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->

            <form action="{{url("importcustomerb2b")}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <!--<label>Select File to Upload  <small class="warning text-muted">{{__('Please upload only Excel (.xlsx or .xls) files')}}</small></label>-->
                    <div class="input-group">
                        <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">
                        @if ($errors->has('uploaded_file'))
                            <p class="text-right mb-0">
                                <small class="danger text-muted" id="file-error">{{ $errors->first('uploaded_file') }}</small>
                            </p>
                        @endif
                        <div class="input-group-append" id="button-addon2">
                            <button class="btn btn-primary square" type="submit"><i class="ft-upload mr-1"></i> Upload</button>
                        </div>
                    </div>
                </fieldset>
            </form>


          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Customer No
                  </th>
                  <th>
                    Company Name
                  </th>
                  <th>
                    Company Name AR
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Website
                  </th>
                  <th>
                    Phone
                  </th>
                  <th>
                    VAT No
                  </th>
                </thead>
                <tbody>
                @if( $customersArr != null )
                @foreach ($customersArr as $customerObj)
                  <tr>
                    <td>
                      {{$customerObj->customer_number}}
                    </td>
                    <td>
                      {{$customerObj->company_name}}
                    </td>
                    <td>
                      {{$customerObj->company_name_ar}}
                    </td>
                    <td >
                      {{$customerObj->country}}
                    </td>
                    <td >
                      {{$customerObj->city}}
                    </td>
                    <td >
                      {{$customerObj->website}}
                    </td>
                    <td >
                      {{$customerObj->phone}}
                    </td>
                    <td >
                      {{$customerObj->vat_number}}
                    </td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
