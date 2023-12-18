@extends('layouts.app')
@section('title', 'Vendor. Wizard')
@section('hubcontent')


<div class="container first" >
    <div class="firstheadcustomerb2b">
        <div class="firsthead1" >Vendor</div>
        <div class="headline3"> </div>
    </div>

    <!--    <div >
            <div ><a href="{{url("customermasterb2bwizard")}}" class="firsthead2_2">Wizard</a></div>
            <div class="headline4_2"> </div>
        </div>-->

</div>


<div class="container thierd " >
    <form  class="container thierd " style="outline: none;" action="{{url("saveWizardVendor")}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="container  mb-2">
            <div class="row" >
                <div class="span2">
                    <button type="button" class="btnreset" name="reset"><a href="{{url("vendormaster")}}">Cancel</a></button>
                    <button type="submit" class="btnsave2" name="save">Save</button>
                </div>
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Name</p> </div>
                <div class="col"><input type="text" name="vendorName" id="vendorName" class="form-control input6" placeholder="Vendor Name"></div>



            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class=" firstcol" ><p >Tel No.</p></div>
                <div class="col" ><input type="text" name="telNo" id="telNo" class="form-control input7" placeholder="Telephone No"></div>

                <div class=" firstcol" ><p >Location</p></div>
                <div class="col" ><input type="text" name="location" id="location" class="form-control input7" placeholder="Location"></div>

            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>VAT Certificate</p> </div>
                <div class="col"><input type="text" name="vatCertificate" id="vatCertificate" class="form-control input6" placeholder="VAT Certificate"></div>

                <div class="firstcol"><p>CR License</p> </div>
                <div class="col"><input type="text" name="crLicense" id="crLicense" class="form-control input6" placeholder="CR License"></div>


            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Bank IBAN</p> </div>
                <div class="col"><input type="text" name="bankIBAN" id="bankIBAN" class="form-control input6" placeholder="Bank Account IBAN"></div>

                <div class="firstcol"><p>Contact Details</p> </div>
                <div class="col"><input type="text" name="contactDetails" id="contactDetails" class="form-control input6" placeholder="Contact Details"></div>


            </div>
        </div>


    </form>
</div>
<!-- Content End -->
@endsection