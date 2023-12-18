@extends('layouts.app', ['activePage' => 'vendormaster', 'titlePage' => __('Vender Master')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        @if(User::isUserCanViewVendorMaster() == '0')
        <div class="card-header card-header-primary">
            <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->
        </div>
        @endif

        @if(User::isUserCanViewVendorMaster() == '1')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Vendor Master</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->

            <form action="{{url("importvendor")}}" method="post" enctype="multipart/form-data">
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
                    Name
                  </th>
                  <th>
                    Tel No
                  </th>
                  <th>
                    Location
                  </th>
                  <th>
                    VAT Certificate
                  </th>
                  <th>
                    CR License
                  </th>
                  <th>
                    Bank Account IBAN
                  </th>
                  <th>
                    Contact Details
                  </th>
                </thead>
                <tbody>
                @if( $vendorsArr != null )
                @foreach ($vendorsArr as $vendorsObj)
                  <tr>
                    <td>
                      {{$vendorsObj->name}}
                    </td>
                    <td>
                      {{$vendorsObj->tel_no}}
                    </td>
                    <td>
                      {{$vendorsObj->location}}
                    </td>
                    <td class="text-primary">
                      {{$vendorsObj->vat_certificate}}
                    </td>
                    <td class="text-primary">
                      {{$vendorsObj->cr_license}}
                    </td>
                    <td class="text-primary">
                      {{$vendorsObj->bank_account_iban}}
                    </td>
                    <td class="text-primary">
                      {{$vendorsObj->contact_details}}
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
