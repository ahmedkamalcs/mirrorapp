@extends('layouts.app')
@section('title', 'Item Master')
@section('hubcontent')



<div class="container first" >
    <div class="firstheaditemservice">
        <div  class="firsthead1">Items</div>
        <div class="headline3"> </div>
    </div>

<!--    <div >
        <div ><a href="{{url("servicemasterwizard")}}" class="firsthead2_2">Wizard</a></div>
        <div class="headline4_2"> </div>
    </div>-->

</div>



<div class="container thierd " >
    <form  class="container thierd " style="outline: none;" action="{{url("saveitemmaster")}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="container  mb-2">
            <div class="row" >
                <div class="span2">
                    <button type="button" class="btnreset" name="reset"><a href="{{url("itemmaster")}}">Cancel</a></button>
                    <button type="submit" class="btnsave2" name="save">Save</button>
                </div>
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Item</p> </div>
                <div class="col"><input type="text" name="itemName" id="itemName" class="form-control input6" placeholder="Item Name"></div>

                <div class=" firstcol" ><p >Price</p></div>
                <div class="col" ><input type="text" name="itemPrice" id="itemPrice" class="form-control input7" placeholder="Item Price"></div>

            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Description</p> </div>
                <div class="col"><input type="text" name="itemDescription" id="itemDescription" class="form-control input6" placeholder="Item Description"></div>

                <div class=" firstcol" ><p >Currency</p></div>
                <div class="col" ><input type="text" name="currency" id="currency" value="SAR" readonly="readonly" class="form-control input7" placeholder="Currency"></div>

            </div>
        </div>

    </form>
</div>




<!-- Content End -->
@endsection