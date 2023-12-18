@extends('layouts.app')
@section('title', 'B2C E-Invoice')
@section('hubcontent')

<div class="container first" >
    <div class="firstheaditemservice">
        <div  class="firsthead1">B2C E-invoice</div>
        <div class="headline3"> </div>
    </div>

    <!--    <div >
            <div ><a href="{{url("servicemasterwizard")}}" class="firsthead2">Wizard</a></div>
            <div class="headline4"> </div>
        </div>-->

</div>


<div class="container thierd " >
    <form  class="container thierd " style="outline: none;" action="{{url("saveEinvoiceB2C")}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="container  mb-2">
            <div class="row" >
                <div class="span2">
                    <button type="button" class="btnreset" name="reset"><a href="{{url("einvoiceb2c")}}">Back</a></button>
                    <button type="submit" class="btnsave2" name="save">Save</button>
                </div>
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Date</p> </div>
                <div class="col"><input type="text" value="{{$eInvoiceHeaderDTO->getHeaderIssueDate()}}" name="date" id="date" class="form-control input6" placeholder="Invoice Date"></div>

                <div class=" firstcol" ><p >Order No.</p></div>
                <div class="col" ><input type="text" value="{{$eInvoiceHeaderDTO->getOrderNo()}}" name="orderNo" id="orderNo" class="form-control input7" placeholder="Order Number"></div>

            </div>
        </div>


        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Invoice No.</p> </div>
                <div class="col"><input type="text" value="{{$eInvoiceHeaderDTO->getInvoiceNumber()}}" name="invoiceNumber" id="invoiceNumber" class="form-control input6" placeholder="Invoice Number"></div>

                
                
                <div class=" firstcol" ><p >Customer Name</p></div>
                <div class="col" ><input type="text" value="{{$eInvoiceHeaderDTO->getCustomerName()}}" name="customerName" id="customerName" class="form-control input7" placeholder="Customer Name"></div>

                
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Company Name</p> </div>
                <div class="col"><input disabled="true" type="text" value="{{$eInvoiceHeaderDTO->getCompanyName()}}" name="companyName" id="companyName" class="form-control input6" placeholder="Company Name"></div>

                <div class="firstcol"><p>Customer Address</p> </div>
                <div class="col"><input type="text" value="{{$eInvoiceHeaderDTO->getCustomerAddress()}}" name="customerAddress" id="customerAddress" class="form-control input6" placeholder="Customer Address"></div>

                
            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">

                

                
                <div class=" firstcol" ><p >Vat No.</p></div>
                <div class="col" ><input type="text" readonly="true" name="VATNO" value="{{$eInvoiceHeaderDTO->getSupplierVATNO()}}" id="VATNO" class="form-control input7" placeholder="VAT No"></div>

                
<!--                <div class=" firstcol" ><p >Customer Vat No.</p></div>
                <div class="col" ><input type="text" value="{{$eInvoiceHeaderDTO->getCustomerVatNo()}}" name="customerVatNo" id="customerVatNo" class="form-control input7" placeholder="Customer VAT No"></div>-->

            </div>
        </div>

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Trans Type</p> </div>
                <div class="col"><input type="text" value="{{$eInvoiceHeaderDTO->getTransType()}}" name="transType" id="transType" class="form-control input6" placeholder="Transaction Type"></div>

                <div class=" firstcol" ><p >Vat Rate</p></div>
                <div class="col" ><input disabled="true" type="text" value="{{$eInvoiceHeaderDTO->getVatRate()}}" name="vatRate" id="vatRate" class="form-control input7" placeholder="VAT Rate"></div>

            </div>
        </div>

        <!--        <div class="container  mb-2">
                    <div class="row ">
        
        
                        <div class="firstcol"><p>Other Fees</p> </div>
                        <div class="col"><input type="text" value="{{$eInvoiceHeaderDTO->getOtherFees()}}" name="discount" id="discount" class="form-control input6" placeholder="Other Fees. Discount"></div>
        
                        <div class=" firstcol" ><p >Status</p></div>
                        <div class="col" ><input type="text" name="status" readonly="readonly" value="Active" id="status" class="form-control input7" placeholder="Invoice Status"></div>
        
                    </div>
                </div>-->

        <div class="container  mb-2">
            <div class="row ">


                <div class="firstcol"><p>Currency</p> </div>
                <div class="col"><input type="text" disabled="true" value="{{$eInvoiceHeaderDTO->getCurrency()}}" name="currency" id="currency" class="form-control input6" ></div>

                <div class=" firstcol" ><p >Status</p></div>
                <div class="col" ><input type="text" name="status" readonly="readonly" value="Active" id="status" class="form-control input7" placeholder="Invoice Status"></div>


            </div>
        </div>


    </form>


    <form style="width: 1650px; height: 50px;" action="{{url("b2ceinvoicelinewizard")}}" method="get" enctype="multipart/form-data" >
        @csrf
        {{ method_field('PUT') }}
        <div class="container  ">
            <button class="addbuttpn2" type="submit"><i class="fa-solid fa-plus icon plus"></i>Add</button>
            <input type ="hidden" name="invoiceHeaderId" id="invoiceHeaderId" value="{{$eInvoiceHeaderDTO->getId()}}" />
        </div>
    </form>




    <div class="table-responsive" >
        <table class=" table2 text-start table-hover  Customer_list data " id="customers-list" >
            <thead >
                <tr class="brd3">

                    <th scope="col" class="th1">Service Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @if( $eInvoiceHeaderDTO->getEinvoiceLineArr() != null )
                @foreach ($eInvoiceHeaderDTO->getEinvoiceLineArr() as $einvoiceObj)
                <tr >

                    <td class="data " >{{$einvoiceObj->item_name}}</td> 
                    <td class="data">SAR {{$einvoiceObj->unit_price}}</td> 
                    <td class="data"> <button class="deletbutton2"><i class="fa-solid fa-trash-can icon del" ></i>Delete</button></td> 
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>

<!-- Content End -->
@endsection