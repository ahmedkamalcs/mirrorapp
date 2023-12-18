@extends('layouts.app')
@section('title', 'B2C. Customer Master. Wizard')
@section('hubcontent')


<div class="container first" >
    <div class="firstheadcustomerb2b">
        <div class="firsthead1" >B2C Customer</div>
        <div class="headline3"> </div>
    </div>

    <!--    <div >
            <div ><a href="{{url("customermasterb2bwizard")}}" class="firsthead2_2">Wizard</a></div>
            <div class="headline4_2"> </div>
        </div>-->

</div>


<div class="container thierd " >
    <form  class="container thierd " style="outline: none;" action="{{url("savecustomerb2c")}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="container  mb-2">
            <div class="row" >
                <div class="span2">
                    <button type="button" class="btnreset" name="reset"><a href="{{url("customermasterb2c")}}">Cancel</a></button>
                    <button type="submit" class="btnsave2" name="save">Save</button>
                </div>
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Customer No.</p> </div>
                <div class="col"><input type="text" name="customerNo" id="customerNo" class="form-control input6" placeholder="Customer No"></div>



            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class=" firstcol" ><p >First Name</p></div>
                <div class="col" ><input type="text" name="firstName" id="firstName" class="form-control input7" placeholder="First Name"></div>

                <div class=" firstcol" ><p >Last Name</p></div>
                <div class="col" ><input type="text" name="lastName" id="lastName" class="form-control input7" placeholder="Last Name"></div>

            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Tel No.</p> </div>
                <div class="col"><input type="text" name="telNo" id="telNo" class="form-control input6" placeholder="Telephone No"></div>

                <div class="firstcol"><p>E-mail</p> </div>
                <div class="col"><input type="text" name="email" id="email" class="form-control input6" placeholder="E-Mail"></div>


            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Address 1</p> </div>
                <div class="col"><input type="text" name="address1" id="address1" class="form-control input6" placeholder="Address 1"></div>

                <div class="firstcol"><p>Address 2</p> </div>
                <div class="col"><input type="text" name="address2" id="address2" class="form-control input6" placeholder="Address 2"></div>


            </div>
        </div>


    </form>
</div>
<!-- Content End -->
@endsection