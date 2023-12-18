@extends('layouts.app')
@section('title', 'B2B. Customer Master. Wizard')
@section('hubcontent')


<div class="container first" >
    <div class="firstheadcustomerb2b">
        <div class="firsthead1" >B2B Customer</div>
        <div class="headline3"> </div>
    </div>

    <!--    <div >
            <div ><a href="{{url("customermasterb2bwizard")}}" class="firsthead2_2">Wizard</a></div>
            <div class="headline4_2"> </div>
        </div>-->

</div>


<div class="container thierd " >
    <form  class="container thierd " style="outline: none;" action="{{url("savecustomerb2b")}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="container  mb-2">
            <div class="row" >
                <div class="span2">
                    <button type="button" class="btnreset" name="reset"><a href="{{url("customermasterb2b")}}">Cancel</a></button>
                    <button type="submit" class="btnsave2" name="save">Save</button>
                </div>
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Name</p> </div>
                <div class="col"><input type="text" name="customerName" id="customerName" class="form-control input6" placeholder="Customer Name"></div>



            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class=" firstcol" ><p >Company</p></div>
                <div class="col" ><input type="text" name="companyName" id="companyName" class="form-control input7" placeholder="Company Name"></div>

                <div class=" firstcol" ><p >Company Ar</p></div>
                <div class="col" ><input type="text" name="companyNameAr" id="companyNameAr" class="form-control input7" placeholder="Company Name Ar"></div>

            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Country</p> </div>
                <div class="col"><input type="text" name="country" id="country" class="form-control input6" placeholder="Country"></div>

                <div class="firstcol"><p>City</p> </div>
                <div class="col"><input type="text" name="city" id="city" class="form-control input6" placeholder="City"></div>


            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Tel No</p> </div>
                <div class="col"><input type="text" name="telNo" id="telNo" class="form-control input6" placeholder="Telephone No"></div>

                <div class="firstcol"><p>Phone</p> </div>
                <div class="col"><input type="text" name="phone" id="phone" class="form-control input6" placeholder="Phone"></div>


            </div>
        </div>



        <div class="container  mb-2">
            <div class="row ">


                <div class=" firstcol" ><p >Website</p></div>
                <div class="col" ><input type="text" name="website" id="website" class="form-control input7" placeholder="Website"></div>

            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Contact</p> </div>
                <div class="col"><input type="text" name="contact" id="contact" class="form-control input6" placeholder="Contact"></div>

                <div class="firstcol"><p>Position</p> </div>
                <div class="col"><input type="text" name="position" id="position" class="form-control input6" placeholder="Position"></div>


            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Email</p> </div>
                <div class="col"><input type="text" name="email" id="email" class="form-control input6" placeholder="E-mail"></div>


            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class=" firstcol" ><p >Address1</p></div>
                <div class="col" ><input type="text" name="address1" id="address1" class="form-control input7" placeholder="Address 1"></div>

                <div class=" firstcol" ><p >Address2</p></div>
                <div class="col" ><input type="text" name="address2" id="address2" class="form-control input7" placeholder="Address 2"></div>


            </div>
        </div>
        
        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Vat No.</p> </div>
                <div class="col"><input type="text" name="vatNo" id="vatNo" class="form-control input6" placeholder="VAT No"></div>

                <div class="firstcol"><p>History</p> </div>
                <div class="col"><input type="text" name="history" id="history" class="form-control input6" placeholder="History"></div>


            </div>
        </div>
        
         <div class="container  mb-2">
            <div class="row ">


                <div class=" firstcol" ><p >Notes</p></div>
                <div class="col" ><input type="text" name="notes" id="notes" class="form-control input7" placeholder="Notes..."></div>


            </div>
        </div>


    </form>
</div>
<!-- Content End -->
@endsection