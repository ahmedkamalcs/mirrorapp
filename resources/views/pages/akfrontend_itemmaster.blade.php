@extends('layouts.app', ['activePage' => 'itemmaster', 'titlePage' => __('Item Master')])

@section('content')
<?php use App\Models\User;?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        @if(User::isUserCanViewItemMaster() == '0')
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">You Are Not Authorized To See This Content</h4>
                    <!--<p class="card-category">Here are your saved e-invoices</p>-->
        </div>
        @endif

        @if(User::isUserCanViewItemMaster() == '1')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Item Master</h4>
            <!--<p class="card-category">Here are your saved e-invoices</p>-->

            <form action="{{url("importitem")}}" method="post" enctype="multipart/form-data">
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
                    Item Name
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Item Description
                  </th>
                  <th>
                    Currency
                  </th>
                </thead>
                <tbody>
                @if( $itemsArr != null )
                @foreach ($itemsArr as $itemsObj)
                  <tr>
                    <td>
                      {{$itemsObj->item_name}}
                    </td>
                    <td>
                      {{$itemsObj->price}}
                    </td>
                    <td>
                      {{$itemsObj->item_description}}
                    </td>
                    <td class="text-primary">
                      {{$itemsObj->currency_code}}
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
