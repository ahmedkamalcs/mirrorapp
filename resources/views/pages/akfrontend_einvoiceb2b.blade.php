@extends('layouts.app', ['activePage' => 'einvoiceb2b', 'titlePage' => __('E-Invoices B2B')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">


            @if(User::isUserCanViewEInvoiceB2B() == '0')
            <div class="card-header card-header-primary">
                <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
                <!--<p class="card-category">Here are your saved e-invoices</p>-->
            </div>
            @endif

            @if(User::isUserCanViewEInvoiceB2B() == '1')
            <div class="card-header card-header-primary">
                <h4 class="card-title ">E-Invoices B2B</h4>
                <!--<p class="card-category">Here are your saved e-invoices</p>-->

            <form action="{{url("importb2b")}}" method="post" enctype="multipart/form-data">
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
                    Invoice Number
                  </th>
                  <th>
                    Issue Date
                  </th>
                  <th>
                    Company Name
                  </th>
                  <th>
                    Supplier Name
                  </th>
                  <th>
                    Issue Date
                  </th>
                  <th>
                    Invoice Status
                  </th>

                </thead>
                <tbody>
                @if( $einvoiceArr != null )
                @foreach ($einvoiceArr as $einvoiceObj)
                  <tr>
                    <td>
                        <a  href="{{url($einvoiceObj->invoice_url . $einvoiceObj->header_invoice_number)}}" target="_blank">{{$einvoiceObj->header_invoice_number}}</a>
                    </td>
                    <td>
                      {{$einvoiceObj->header_issue_date}}
                    </td>
                    <td>
                      {{$einvoiceObj->company_name}}
                    </td>
                    <td>
                      {{$einvoiceObj->supplier_name}}
                    </td>
                    <td class="text-primary">
                      {{$einvoiceObj->header_issue_date}}
                    </td>
                    <td class="text-primary">
                        {{$einvoiceObj->invoice_status}}
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
<!--      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Table on Plain Background</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Salary
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Dakota Rice
                    </td>
                    <td>
                      Niger
                    </td>
                    <td>
                      Oud-Turnhout
                    </td>
                    <td>
                      $36,738
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Minerva Hooper
                    </td>
                    <td>
                      Curaçao
                    </td>
                    <td>
                      Sinaai-Waas
                    </td>
                    <td>
                      $23,789
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      Sage Rodriguez
                    </td>
                    <td>
                      Netherlands
                    </td>
                    <td>
                      Baileux
                    </td>
                    <td>
                      $56,142
                    </td>
                  </tr>
                  <tr>
                    <td>
                      4
                    </td>
                    <td>
                      Philip Chaney
                    </td>
                    <td>
                      Korea, South
                    </td>
                    <td>
                      Overland Park
                    </td>
                    <td>
                      $38,735
                    </td>
                  </tr>
                  <tr>
                    <td>
                      5
                    </td>
                    <td>
                      Doris Greene
                    </td>
                    <td>
                      Malawi
                    </td>
                    <td>
                      Feldkirchen in Kärnten
                    </td>
                    <td>
                      $63,542
                    </td>
                  </tr>
                  <tr>
                    <td>
                      6
                    </td>
                    <td>
                      Mason Porter
                    </td>
                    <td>
                      Chile
                    </td>
                    <td>
                      Gloucester
                    </td>
                    <td>
                      $78,615
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
@endsection
