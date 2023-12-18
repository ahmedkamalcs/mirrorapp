<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
    <link rel="icon" href="#" type="image/gif" sizes="16x16">
    <!--Boxicon CDN Link-->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css')}}">
    <!--Bootstrap CDN Link-->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Font Family Link-->
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}">
    <!--Main Stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!--Resposnive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <style>
table { border-collapse: collapse; }
tr:nth-child(0) { border: solid thin; }
</style>
</head>

<body>
  <div class="wp_wapper">
        <!--=========================Company Details Area Start===============================-->
    <section class="company_details_area">
        <div class="container">
            <div class="row">
                <div class="company_logo col-lg-4 col-md-3 col-12">
                    <!--logo section-->
                    <div class="company_logo_img">
                        <img src="{{ asset('css/images/logo1.png')}}" alt="logo">
                    </div>
                    <!--company name-->
                    <div class="company_name">
                        <h4>Company Name</h4>
                        <p style="font-family: 'GE Elegant';">{{$einvoiceHeaderDTO->getCompanyName()}}</p>
                    </div>
                </div>
                <div class="company_details col-lg-6 col-md-9 col-12">
                    <!--======copy item=====-->
                    <div class="row">
                        <div class="company_details_left col-lg-6 col-6">
                            <p>Invoice No. :</p>
                            <span class="bottom_border" style="font-family: 'GE Elegant';">رقم الفاتورة</span>
                        </div>
                        <div class="company_details_right col-lg-6 col-6">
                            <p>{{$einvoiceHeaderDTO->getHeaderInvoiceNumber()}}</p>
                        </div>
                    </div>
                    <!--======copy item=====-->
                    <div class="row">
                        <div class="company_details_left col-lg-6 col-6">
                            <p>Invoice Issue Date :</p>
                            <span class="bottom_border" style="font-family: 'GE Elegant';">تاريخ اصدار الفاتورة</span>
                        </div>
                        <div class="company_details_right col-lg-6 col-6">
                            <p>{{$einvoiceHeaderDTO->getHeaderIssueDate()}}</p>
                        </div>
                    </div>
                    <!--======copy item=====-->
                    <div class="row">
                        <div class="company_details_left col-lg-6 col-6">
                            <p>VAT No. :</p>
                            <span class="bottom_border" style="font-family: 'GE Elegant';">رقم التسجيل الضريبي </span>
                        </div>
                        <div class="company_details_right col-lg-6 col-6">
                            <p><p>{{$einvoiceHeaderDTO->getSupplierVATNO()}}</p></p>
                        </div>
                    </div>
                    <!--======copy item=====-->
                    <div class="row">
                        <div class="company_details_left col-lg-6 col-6">
                            <p>Order NO. : </p>
                            <span style="font-family: 'GE Elegant';">رقم الطلب</span>
                        </div>
                        <div class="company_details_right col-lg-6 col-6">
                            <p>{{$einvoiceHeaderDTO->getOrderNo()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================Company Details Area End===============================-->
    <!--=========================Tax Incoive start===============================-->
    <section class="tex_invoice_area">
        <div class="container">
            <div class="main_table row">
               <div class="heading">
                   <h4> Tax invoice <span style="padding-left: 12px;"> فاتورة ضريبة</span></h4>
               </div>
                <table class="table-responsive col-12" style="border: transparent;">
                    <thead class="t_head">
                        <tr>
                            <th scope="col" class="padding_left">Order Details</th>
                            <th scope="col"></th>
                            <th scope="col" class="padding_left" style="text-align: right; font-family: 'Reem Kufi', sans-serif;">تفاصيل الخدمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="padding_left border_two">Customer Name</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getCustomerName()}}</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">اسم العميل</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">Customer Address</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getCustomerAddress()}}</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">عنوان العميل</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">Customer VAT No.</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getCustomerVatNo()}}</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">الرقم الضريبى للعميل</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">Transaction Type</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getTransType()}}</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">نوع العملية</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">VAT Rate</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getVatRate()}}%</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">نسبة الضريبة</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">Discount</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getTotalDiscount()}} SAR </td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">الخصم</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">Total Taxable Amount<br>Excluding VAT</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getTotalWithoutTax()}} SAR</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">الإجمالي الخاضع للضربية<br>غير شامل ضريبة القيمة المضافة</td>
                        </tr>
                        <tr>
                            <td class="padding_left border_two">VAT Amount </td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getTotalVAT()}} SAR</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">مجموع ضريبة القيمة المضافة</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px 0px;  padding-left: 15px;">Total Amount<br>Including VAT</td>
                            <td style="padding-left: 10%;">{{$einvoiceHeaderDTO->getTotalAmountDue()}} SAR</td>
                            <td class="padding_left" style="text-align: right; font-family: 'GE Elegant';">المجموع شامل ضربية القيمة المضافة</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--=========================Tax Incoive end===============================-->
    
    <!--=========================Invoice Lines Start===============================-->
    <table align="right" style="width: 100%;" border="0">
        <tr style="background-color:#CCCCCB;"  >
            
            <td class="padding_left" style="text-align: center; font-family: 'Reem Kufi', sans-serif;">
                السعر
            </td>
            <td class="padding_left" style="text-align: center; font-family: 'Reem Kufi', sans-serif;">
                الكمية
            </td>
            <td class="padding_left" style="width: 50%; text-align: center; font-family: 'Reem Kufi', sans-serif;">
                الصنف
            </td>
        </tr>
        
        @if( $einvoiceHeaderDTO->getEInvoiceLineDTOArr() != null )
                    
        @foreach ($einvoiceHeaderDTO->getEInvoiceLineDTOArr() as $einvoiceObj)

           <tr>
               
               <td align="center">{{$einvoiceObj->unit_price}} {{$einvoiceObj->currency}} </td>
               <td align="center">{{$einvoiceObj->quantity}}</td>
               <td style="padding-left: 10%;">{{$einvoiceObj->item_name}}</td>
<!--               <td align="right">{{$einvoiceObj->taxable_amount}} {{$einvoiceObj->currency}}</td>
               <td align="right">{{$einvoiceObj->discount}}</td>
               <td align="right">{{$einvoiceObj->tax_rate}}%</td>
               <td align="right">{{$einvoiceObj->tax_amount}} {{$einvoiceObj->currency}}</td>
               <td align="right">{{$einvoiceObj->subtotal}} {{$einvoiceObj->currency}}</td>-->
           </tr> 
    @endforeach
   @endif

    </table>
    <br>
    <br>
    <!--=========================Invoice Lines End===============================-->
    
    <!--=========================Footer Start===============================-->
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="footer_item col-12">
                    <div class="footer_text">
                        <p>Thank You For Your Purchase.</p>
                    </div>
                    <div class="footer_qr">
<!--                        <img src="{{ asset('css/images/qr.png') }}" alt="qr">
                -->
                         <?php echo $einvoiceHeaderDTO->getQrCode(); ?>
                    </div>
                </div>
                
                <dvi class="powerd_by text-center">
                    <p>Powerd by <img src="{{ asset('css/images/isg.png') }}" alt="isg"></p>
                </dvi>
            </div>
        </div>
    </footer>
    <!--=========================Footer end===============================-->

  </div>
    <!--Boxicon CDN js-->
    <script src="{{ asset('https://unpkg.com/boxicons@2.0.9/dist/boxicons.js')}}"></script>
    <!--Bootstrap CDN js-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src=""></script>
</body></html>
