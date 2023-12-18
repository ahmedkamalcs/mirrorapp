@extends('layouts.app')
@section('title', 'B2B E-Invoice')
@section('hubcontent')

<div class="container first" >
    <div class="firstheaditemservice">
        <div  ><a href="{{url("servicemaster")}}" class="firsthead1" >B2B Inv Line</a> </div>
        <div class="headline3"> </div>
    </div>

    <!--    <div >
            <div ><a href="{{url("servicemasterwizard")}}" class="firsthead2">Wizard</a></div>
            <div class="headline4"> </div>
        </div>-->

</div>



<div class="container thierd " >
    <form  class="container thierd " style="outline: none;" action="{{url("saveEinvoiceLineB2B")}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="container  mb-2">
            <div class="row" >
                <div class="span2">
                    <button type="button" class="btnreset" name="reset"><a href="{{url("b2beinvoicewizard")}}">Cancel</a></button>
                    <button type="submit" class="btnsave2" name="save">Save</button>
                </div>
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">

                <input type="hidden" id="invoiceHeaderId" name="invoiceHeaderId" value="{{$invoiceHeaderId}}"/>

                <div class="firstcol"><p>Service</p> </div>
                <div class="col"><input type="text" name="itemName" id="itemName" class="form-control input6" placeholder="Service Name"></div>

                <div class=" firstcol" ><p >Price</p></div>
                <div class="col" ><input type="text" name="price" id="price" class="form-control input7" placeholder="Price"></div>

            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Quantity</p> </div>
                <div class="col"><input type="text" name="quantity" id="quantity" class="form-control input6" placeholder="Quantity"></div>

<!--                <div class=" firstcol" ><p >Taxable Amount</p></div>
                <div class="col" ><input type="text" name="taxableAmount" id="taxableAmount" class="form-control input7" placeholder="Taxable Amount"></div>-->

                <div class="firstcol"><p>Discount</p> </div>
                <div class="col"><input type="text" name="discount" id="discount" class="form-control input6" placeholder="Discount"></div>

                
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                
<!--                <div class=" firstcol" ><p >Tax Rate</p></div>
                <div class="col" ><input type="text" readonly="true" name="taxRate" id="taxRate" class="form-control input7" placeholder="Tax Rate" value=""></div>-->

            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


<!--                <div class="firstcol"><p>Tax Amount</p> </div>
                <div class="col"><input type="text" name="taxAmount" id="taxAmount" class="form-control input6" placeholder="Tax Amount"></div>-->

<!--                <div class=" firstcol" ><p >Currency</p></div>
                <div class="col" ><input type="text" name="currency" id="currency" readonly="readonly" value="SAR" class="form-control input7" placeholder="Currency"></div>-->

            </div>
        </div>


    </form>


</div>

<!-- Content End -->
@endsection