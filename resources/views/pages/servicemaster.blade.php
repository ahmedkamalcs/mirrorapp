@extends('layouts.app')
@section('title', 'Service Master')
@section('hubcontent')


<div class="container first" >
    <div class="firstheaditemservice">
        <div  ><a href="{{url("servicemaster")}}" class="firsthead1" >Services</a> </div>
        <div class="headline3"> </div>
    </div>

<!--    <div >
        <div ><a href="{{url("servicemasterwizard")}}" class="firsthead2">Wizard</a></div>
        <div class="headline4"> </div>
    </div>-->

</div>


<div class="container cont1 ">
    <button class="addbutton" disabled="true"><i class="fa-solid fa-plus icon"></i><a href="{{url("servicemasterwizard")}}">Add</a></button>
    <button class="editbutton" disabled="true"><i class="fa-solid fa-pencil icon"></i>Edit</button>
    <button id="popup" onclick="div_show()" class="delettbutton  " disabled="true"><i class="fa-solid fa-trash-can icon" ></i>Delete</button>
    <a href="{{ url('/download/service_items.xlsx')  }}" target="_blank" class="dawntbutton"><i class="fa-solid fa-download icon"></i>Downlaod</a>

    <label class="choosefilebutton" for="uploaded_file" ><i class="fa-solid fa-file-arrow-up iconUp"></i>Choose File</label>



    <div id="uploadform">

        <form class="uploadFileForm" action="{{url("importitemservice")}}" method="post" enctype="multipart/form-data" >
            @csrf


            <input type="file" id="uploaded_file" hidden required name="uploaded_file">
            @if ($errors->has('uploaded_file'))
            <p class="text-right mb-0">
                <small class="danger text-muted" id="file-error">{{ $errors->first('uploaded_file') }}</small>
            </p>
            @endif

            <button class="uploaditemfilebutton" type="submit"><i class="fa-solid fa-file-arrow-up iconUp"></i>Upload</button>


        </form>


    </div>
</div>


<div class="table-responsive" >
    <table class=" table2 text-start table-hover  Customer_list data " id="customers-list" >
        <thead >
            <tr class="brd2">

                <th scope="col">Service Name</th>
                <th scope="col">Price</th>
                <th scope="col">Service Description</th>
                <th scope="col">Currency</th>
            </tr>
        </thead>

        <tbody>
            @if( $itemsArr != null )
            @foreach ($itemsArr as $itemsObj)
            <tr>
                <td>
                    {{$itemsObj->item_name}}
                </td>
                <td class="data">
                    {{$itemsObj->price}}
                </td>
                <td class="data">
                    {{$itemsObj->item_description}}
                </td>
                <td class="data">
                    {{$itemsObj->currency_code}}
                </td>
                

            </tr>
            @endforeach
            @endif
        </tbody>

<!--	 <tbody>
    
    
<tr >

<td class="data " >2200100</td> 
<td class="data"> 2022-01-16 00:00:00</td> 
<td class="data">Hub</td> 
<td class="data"> 208</td> 
<td class="data"> Mirror</td> 
<td class="data_paid"> Paid</td> 
</tr>

<td class="data " >2200101</td> 
<td class="data"> 2022-01-17 00:00:00</td> 
<td class="data">ISG</td> 
<td class="data"> 209</td> 
<td class="data"> The One</td> 
<td class="data_active"> Active</td> 
</tr>

<tr>
<td class="data " >2200102</td> 
<td class="data"> 2022-01-19 00:00:00</td> 
<td class="data">ISGlobal</td> 
<td class="data"> 210</td> 
<td class="data"> Beauty</td> 
<td class="data_void"> Void</td> 
</tr>

<tr>
 <td class="data " >2200102</td> 
 <td class="data"> 2022-01-19 00:00:00</td> 
 <td class="data">ISGlobal</td> 
 <td class="data"> 210</td> 
 <td class="data"> Beauty</td> 
 <td class="data_Npaid"> Not Paid</td> 
 </tr>

</tbody>-->
    </table>
</div>
<!-- Content End -->
@endsection