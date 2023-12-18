@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'ruwaitapproval', 'title' => __('E-Invoice System')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8">

            <table class="container"  border="0" style="width: 100%; height: 100%">
                <tr style="width: 100%; height: 200px">
                    <td>

                    </td>
                </tr>
                <tr>
                    <td align="center" valign="center">


                        <form method="post" action="{{ route('user.loginbycompany') }}" autocomplete="off" class="form-horizontal">
                            @method('get')
                            <table  align="center" border = "0" width="50%">
                                <tr>
                                    <td>
                                        <select class="form-control" name="<Select>" style="width:100%">

                                            @foreach ($companyList as $company)
                                            <option value="{{$company->company_code}}">
                                                {{ $company->company_name }}                       
                                            </option>
                                            @endforeach

                                        </select>
                                    </td>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary">{{ __('Lets Go') }}</button>
                                    </td>
                                </tr>
                                </tr>
                            </table>
                        </form>

                    </td>
                </tr>
            </table>


        </div>
    </div>
</div>
@endsection
