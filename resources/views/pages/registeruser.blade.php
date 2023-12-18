@extends('layouts.app', ['activePage' => 'registeruser', 'titlePage' => __('Registerd Users')])

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
        <form method="post" action="{{ route('register.update') }}" autocomplete="off" class="form-horizontal">
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
                  <th>
                    Approved?
                  </th>
                  
                  <th colspan="2">
                    Actions 
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
                    <td>
                        @if($userObj->approved == '1')
                        <input type="checkbox" name="approvecheckbox" value="{{$userObj->approved}}" checked/>
                        @endif
                        @if($userObj->approved == '0')
                        <input type="checkbox" name="approvecheckbox" value="{{$userObj->approved}}"/>
                        @endif
                    </td>
                    <td class="text-primary">
                       <div class="card-footer ml-auto mr-auto">
                        <!--<button type="button" name="action" class="btn btn-primary" value="Activate">{{ __('Activate') }}</button>-->
                        <input type="submit" class="btn btn-primary" value="Activate" name="action" >
                      </div>
                    </td>
                    <td class="text-primary">
                        <div class="card-footer ml-auto mr-auto">
                            <!--<button type="button" name="action" class="btn btn-primary" value="Activate">{{ __('Activate') }}</button>-->
                            <input type="submit" class="btn btn-primary" value="Deactivate" name="action" >
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