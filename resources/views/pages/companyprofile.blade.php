@extends('layouts.app')
@section('title', 'Company Profile')
@section('hubcontent')

<!--head start-->
<div class="container first" >
    <div class="firsthead5">
        <div  ><a  class="firsthead2_22" >Business Profile</a> </div>
    </div>



</div>

<!--head end-->

<!--pop form start-->

<!--pop form ends-->

<form  method="post" action="{{ route('companydatasave') }}" class="companyprofileform ">
    @csrf
    @method('put')


    <!--    <div class="container thierd " >-->
    <div class="container  mb-2">
        <div class="row" >
            <div class="span2">
                <button class="btnreset" disabled="true">Edit</button>
                <button name="action" value="save" class="btnsave2" type="submit" >Save</button>
            </div>
        </div>
    </div>

    <div class="profile_content">
        <div class="container mb-2 profile_cont">

            <div class="row " >
                <div class="firstcol" ><p>Business Name</p> </div>


                <div class="col buttonIn ">

                    <input type="hidden" name="companyCode" id="companyCode" type="text" value="{{ $companyProfileDTO->getCompanyCode() }}" />
                    <input name="businessName" id="businessName" type="text" value="{{ $companyProfileDTO->getBusinessName() }}" class="form-control input20" placeholder="">
                    <input name="companyName" id="companyName" type="hidden" value="{{ $companyProfileDTO->getCompanyName() }}" class="form-control input20" placeholder="">
                </div>



                <div class=" firstcol " ><p >Business Logo</p></div>

                <div class="col" ><input name="businessLogo" id="businessLogo" type="text" value="{{ $companyProfileDTO->getBusinessLogoUpload() }}" class="form-control input21" placeholder="">
                    <button class="prof_but" disabled="true">
                        Upload
                    </button>
                    <button class="prof_but2" disabled="true">
                        Preview
                    </button>

                </div>
            </div> </div>
        <div class="container mt-6 profile_cont4">
            <div class="container mb-2 " >
                <div class="row "  >
                    <div class="firstcol"><p>VAT Number</p></div>
                    <div class="col buttonIn "><input name="vatNumber" id="vatNumber" type="text" value="{{ $companyProfileDTO->getVatNumber() }}" class="form-control input21" placeholder="">
                    </div>
                    <div class="firstcol"><p>CR/Freelance No</p></div>
                    <div class="col"><input type="text" class="form-control input21" placeholder="1820"></div>
                </div>
            </div>
            <div class="container mb-2">
                <div class="row ">
                    <div class="firstcol"><p>VAT Certificate</p></div>
                    <div class="col"><input name="vatCertificate" id="vatCertificate" type="text" value="{{ $companyProfileDTO->getVatCertificateUpload() }}" class="form-control input21" placeholder="">
                        <button class="up_button" disabled="true">Upload</button>
                    </div>
                    <div class="firstcol"><p>CR Upload</p></div>
                    <div class="col"><input name="crUpload" id="crUpload" type="text" value="{{ $companyProfileDTO->getCrUpload() }}" class="form-control input21" placeholder="">
                        <button class="up_button" disabled="true">Upload</button>
                    </div>
                    <div class="firstcol"><p>VAT Rate</p></div>
                    <div class="col"><input name="vatRate" id="vatRate" type="text" value="{{ $companyProfileDTO->getVatRate() }}" class="form-control input21" placeholder=""></div>
                    <div class="firstcol"><p>Currency</p></div>
                    <div class="col"><input name="currency" id="currency" type="text" value="{{ $companyProfileDTO->getCurrency() }}"  class="form-control input21" placeholder=""></div>
                </div>

            </div>
        </div>

        <div class="container mt-6 profile_cont2">
            <div class="container mb-2 " >
                <div class="row "  >
                    <div class="firstcol"><p>Country</p></div>
                    <div class="col buttonIn "><input name="country" id="country" type="text" value="{{ $companyProfileDTO->getCountry() }}" class="form-control input21" placeholder="">
                    </div>
                    <div class="firstcol"><p>Email ID</p></div>
                    <div class="col"><input name="emailId" id="emailId" type="text" value="{{ $companyProfileDTO->getEmailId() }}" class="form-control input21" placeholder="1820"></div>
                </div>
            </div>
            <div class="container mb-2">
                <div class="row ">
                    <div class="firstcol"><p>City</p></div>
                    <div class="col"><input name="city" id="city" type="text" value="{{ $companyProfileDTO->getCity() }}" class="form-control input21" placeholder="">

                    </div>
                    <div class="firstcol"><p>Contact Name</p></div>
                    <div class="col"><input name="contactName" id="contactName" type="text" value="{{ $companyProfileDTO->getContactName() }}" class="form-control input21" placeholder="2093">
                    </div>
                </div>

            </div>
            <div class="container mb-2">
                <div class="row ">
                    <div class="firstcol"><p>Address</p></div>
                    <div class="col"><input type="text" class="form-control input21" placeholder="">

                    </div>
                    <div class="firstcol"><p>Contact Number</p></div>
                    <div class="col"><input name="contactNumber" id="contactNumber" type="text" value="{{ $companyProfileDTO->getContactNumber() }}" class="form-control input21" placeholder="2093">
                    </div>
                </div>

            </div>
        </div>


        <div class="container mt-6 profile_cont3">
            <div class="container mb-2 " >
                <div class="row "  >
                    <div class="firstcol"><p>Bank Name</p></div>
                    <div class="col buttonIn "><input name="bankName" id="bankName" type="text" value="{{ $companyProfileDTO->getBankName() }}" class="form-control input21" placeholder="">
                    </div>
                    <div class="firstcol"><p>IBAN Number</p></div>
                    <div class="col"><input name="iban" id="iban" type="text" value="{{ $companyProfileDTO->getIban() }}" class="form-control input21" placeholder="1820"></div>
                </div>
            </div>


        </div>

        <div class="container mt-6 profile_cont3">
            <div class="container mb-2 " >
                <div class="row "  >
                    <div class="firstcol"><p>E-Mail</p></div>
                    <div class="col"><input name="userEmailId" id="userEmailId" type="text"   class="form-control input21" placeholder="">
                        <button type="submit" name="action" value="invite"class="up_button">Invite</button>
                    </div>
                    
                </div>
            </div>
        </div>


        <!--comment.AK. Start-->
        <!-- <div class="container cont_sub">
         
          <p class="sub_p">Subscription Package</p>
          <button class="sub_v">View</button>
          <button class="sub_up">Upgrade</button>
         </div>
        
        
         <div class="container  ">
          <button class="addbuttpn3"><i class="fa-solid fa-plus icon plus"></i>Add Debit/Credit Card</button>
        
        </div>
        
        </form>
         
         
        
         
         <div class="table-responsive" >
         <table class=" table3 text-start table-hover  Customer_list data " id="customers-list" >
         <thead >
         <tr class="brd"> 
         
         <th scope="col" class="th22">Card Number</th>
         <th scope="col" class="th23">Card Holder</th>
         <th scope="col" class="th44">Expires</th>
         <th scope="col" class="th45">CVV</th>
         </tr>
         </thead>
         <tbody>
         <tr >
         
          <td class="data " > <input type="radio" checked="checked" name="radio" id="popup" onclick="card_show()">
            <span class="checkmark"></span> **** **** **** 1234 <span class="p70">(Defult)</span></td> 
          <td class="data " >Ahmed Kamal</td> 
         <td class="data"> 10/23</td> 
         <td class="data"> </td> 
         
        
         </tr>
        
         <tr>
          <td class="data" ><input type="radio" checked="checked" name="radio" id="popup" onclick="card_show()">
            <span class="checkmark"></span>**** **** **** 5678</td> 
           <td class="data " >Ahmed Kamal</td> 
          <td class="data">10/24</td> 
          <td class="data"></td> 
         
         </tr>
        
        
         </tbody>
         </table>
         </div>
        
        
         end of profile content
        </div> 
        
         <div> 
          <p class="made"> Powered by HUB LTD </p>
        </div>
         </div>
        </div>
          Recent Sales End 
        
        
        
         </div>
          Content End 
        
        
         </div>
         <script>
          
        // Validating Empty Field
        function check_empty() {
        if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
        alert("Fill All Fields !");
        } else {
        document.getElementById('form').submit();
        alert("Form Submitted Successfully...");
        }
        }
        //Function To Display Popup
        function div_show() {
        document.getElementById('abc').style.display = "block";
        }
        //Function to Hide Popup
        function div_hide(){
        document.getElementById('abc').style.display = "none";
        }
         </script>
         
         <script>
         let arrow = document.querySelectorAll(".arrow");
         for (var i = 0; i < arrow.length; i++) {
         arrow[i].addEventListener("click", (e)=>{
         let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
         arrowParent.classList.toggle("showMenu");
         });
         }
         let sidebar = document.querySelector(".sidebar");
         let sidebarBtn = document.querySelector(".bx-menu");
         console.log(sidebarBtn);
         sidebarBtn.addEventListener("click", ()=>{
         sidebar.classList.toggle("close");
         });
         </script>
        
         <script>
         
         $(document).on('click', '.edit', function() { 
         $(this).parent().siblings('td.data').each(function() { 
         var content = $(this).html(); 
         $(this).html('<input value="' + content + '" />'); 
         }); 
         $(this).siblings('.save').show(); 
         $(this).siblings('.delete').hide(); 
         $(this).hide(); 
         }); 
         $(document).on('click', '.save', function() { 
         $('input').each(function() { 
         var content = $(this).val(); 
         $(this).html(content); 
         $(this).contents().unwrap(); 
         }); 
         $(this).siblings('.edit').show(); 
         $(this).siblings('.delete').show(); 
         $(this).hide(); 
         }); 
         
         
         $(document).on('click', '.delete', function() { 
         
         
         $(this).parents('tr').remove(); 
         }); 
         $('.add').click(function() { 
         $(this).parents('table').append('<tr><td class="data"></td><td class="data"></td><td class="data"></td><td><button class="save">Save</button><button class="edit">Edit</button> <button class="delete">Delete</button></td></tr>'); 
         }); 
         
         //tooltip 
         
         $(function () { $("[data-toggle = 'tooltip']").tooltip(); });
         
         
         
         </script>
          JavaScript Libraries 
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> 
        
         <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
         <script src="lib/chart/chart.min.js"></script>
         <script src="lib/easing/easing.min.js"></script>
         <script src="lib/waypoints/waypoints.min.js"></script>
         <script src="lib/owlcarousel/owl.carousel.min.js"></script>
         <script src="lib/tempusdominus/js/moment.min.js"></script>
         <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
         <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        
          Template Javascript 
         <script src="js/main.js"></script>
        
         <script>
          
          // Validating Empty Field
          function check_empty() {
          if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
          alert("Fill All Fields !");
          } else {
          document.getElementById('form').submit();
          alert("Form Submitted Successfully...");
          }
          }
          //Function To Display Popup
          function div_show() {
          document.getElementById('abc').style.display = "block";
          }
          //Function to Hide Popup
          function div_hide(){
          document.getElementById('abc').style.display = "none";
          }
          function log_show() {
          document.getElementById('abd').style.display = "block";
          }
          //Function to Hide Popup
          function log_hide2(){
          document.getElementById('abd').style.display = "none";
          }
          function ch_show() {
          document.getElementById('chch').style.display = "block";
          }
          //Function to Hide Popup
          function ch_hide(){
          document.getElementById('chch').style.display = "none";
          } 
        
          function card_show() {
          document.getElementById('card').style.display = "block";
          }
          //Function to Hide Popup
          function card_hide(){
          document.getElementById('card').style.display = "none";
          }
           </script>-->
        <!--comment.AK. End-->
        <!-- Content End -->

    </div>
    <!--</div>-->
</form>
@endsection