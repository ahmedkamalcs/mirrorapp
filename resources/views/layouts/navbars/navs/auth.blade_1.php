<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<!--header.start-->
<div class="container-fluid head11">
    <a class="" href="#">
        <i class="sidebar-toggler fa-solid fa-bars "></i>
    </a>
    <p class= "company-name">
        ISGLOBAL
    </p>
    <div class="icon3" > 

        <button class="icon2"><i class="material-icons i1">outlined_flag</i></button>
        <button class="icon2"> <i class="material-icons i2">star_outline</i></button>
        <button class="icon2"><i class="material-icons i3">bookmark_border</i></button>
        <button class="icon2"><i class="material-icons i4">notifications_none</i></button>
        <button class="lang"> ع </button>
        <div class="navbar-nav align-items-center ">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle1" data-bs-toggle="dropdown">
                    <button class="icon2"><i class="material-icons i5">account_circle</i></button>  
                </a>
                <div class="dropdown-menu dropdown-item2 dropdown-menu-end  border-0 rounded-0 rounded-bottom m-0">

                    <a href="#" class="dropdown-item3"> <i class="material-icons i9">person</i> <p class="textp">User Profile</p></a>
                    <a href="#" class="dropdown-item3"><i class="material-icons i9">settings</i> <p class="textp">Setting</p></a>
                    <button id="popup" onclick="log_show()"class="dropdown-item3 profileptn"><i class="material-icons i10 ">logout</i><p class="textpp">Log Out</p></button>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link" >
                </a>
            </div>
        </div>
    </div>
</div>
<!--header.end-->

<div class="container-fluid position-absolute bg-white  p-0">

    <!-- Sidebar Start -->
    <div class="sidebar  pb-3">
        <nav class="navbar navbar-light">

            <div class="navbar-nav w-100">
                <a href="index.html" class="nav-item nav-link "><span class="material-symbols-outlined" >
                        pie_chart
                    </span>Dashboard</a>
                <div class="line"></div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="material-symbols-outlined ">
                            receipt_long
                        </span> Electronic invoice</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('einvoiceb2b') }}" class="dropdown-item">B2B E-Invoice</a>
                        <a href="{{ route('einvoiceb2c') }}" class="dropdown-item">B2C E-Invoice</a>
                    </div>
                </div>
                <div class="line"></div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="material-symbols-outlined ">
                            dataset
                        </span>Master Data</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="item_master.html" class="dropdown-item">Item Master</a>
                        <a href="service_master.html" class="dropdown-item">Services Master</a>
                        <a href="vendor.html" class="dropdown-item">Vendor Master</a>
                        <a href="index.html" class="dropdown-item">Item Vendor</a>
                        <a href="B2B.html" class="dropdown-item">B2B Customer Master</a>
                        <a href="B2C.html" class="dropdown-item">B2C Customer Master</a>
                    </div>
                </div>
                <div class="line"></div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <span class="material-symbols-outlined">
                            admin_panel_settings
                        </span>Administration</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="./business.html" class="dropdown-item">Company Profile</a>
                        <a href="RegisterUser.html" class="dropdown-item">Register User</a>
                        <a href="PageAccess.html" class="dropdown-item">Pages access</a>

                    </div>
                </div>


            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">

        <!--pop form start-->
        <div id="abc">
            <div id="popupContact">
                <form action="#" id="form" method="post" name="form" class="form7">
                    <button id="close"  onclick ="div_hide()" class="img1"><span class="material-symbols-outlined">
                            cancel
                        </span></button>
                    <hr>
                    <div class="container">
                        <p class="popp23">Are you sure you want to delete this?</p>
                        <div class="span24">
                            <button class="btnreset">Cancel</button>
                            <button class="btnsave2">Delete</button>
                        </div>
                    </div>

            </div>
            </form>
        </div>



        <!--Logout. Start-->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div id="abd">
            <div id="popupContact">
                <form action="#" id="form" method="post" name="form" class="form7">

                    <button id="close"  onclick ="log_hide2()" class="img1"><span class="material-symbols-outlined">
                            cancel
                        </span></button>
                    <hr>
                    <div class="container">
                        <p class="popp2">Are you sure you want to logout?</p>
                        <div class="span24">
                            <button class="btnreset" onclick="document.getElementById('popupContact').display = 'none'" >Cancel</button>

                            <!--<button class="btnsave2">logout</button>-->
                            <a class="btnsave2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </div>
                    </div>
                </form>
            </div>


        </div>

        <!--Logout. End-->
        <!-- Recent Sales Start -->

    </div>
</div>
<!-- Content End -->

<!--Script.Start-->
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>

<script>

    $(document).on('click', '.edit', function () {
        $(this).parent().siblings('td.data').each(function () {
            var content = $(this).html();
            $(this).html('<input value="' + content + '" />');
        });
        $(this).siblings('.save').show();
        $(this).siblings('.delete').hide();
        $(this).hide();
    });
    $(document).on('click', '.save', function () {
        $('input').each(function () {
            var content = $(this).val();
            $(this).html(content);
            $(this).contents().unwrap();
        });
        $(this).siblings('.edit').show();
        $(this).siblings('.delete').show();
        $(this).hide();
    });


    $(document).on('click', '.delete', function () {


        $(this).parents('tr').remove();
    });
    $('.add').click(function () {
        $(this).parents('table').append('<tr><td class="data"></td><td class="data"></td><td class="data"></td><td><button class="save">Save</button><button class="edit">Edit</button> <button class="delete">Delete</button></td></tr>');
    });

    //tooltip 

    $(function () {
        $("[data-toggle = 'tooltip']").tooltip();
    });



</script>
<!-- JavaScript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
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
    function div_hide() {
        document.getElementById('abc').style.display = "none";
    }
    function log_show() {
        document.getElementById('abd').style.display = "block";
    }
    //Function to Hide Popup
    function log_hide2() {
        document.getElementById('abd').style.display = "none";
    }
</script>
<!--Script.ENd-->
