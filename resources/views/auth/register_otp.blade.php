<html lang="en">
    <head>
        <title>OTP Request</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/otpstyle.css')}}">
    </head>
    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center form_container">

                        <form class="form" method="get" action="{{ route('signupfinish') }}">
                            <div class="input-group mb-5">
                                <div class="container" >
                                    <div class="row row2" >
                                        <div>
                                            <p class="sign"> Sign Up</p>
                                        </div>
                                        <div ><p class="otp">OTP</p></div>
                                        <div ><p class="finish">Finish</p></div>
                                    </div>

                                    <div class="row row3" >

                                        <div class="lineactive"></div>

                                        <div class="lineactive1"></div>
                                        <div class="line"></div>
                                    </div>
                                </div> </div>




                            <div class="input-group mb-4">
                                <label>
                                    <h4 >OTP VERIFICATION</h4>
                                </label>
                            </div>

                            <input type="hidden" name="companyprofileselect"  value="{{$signupStagingDTO->getCompanyprofileselect()}}"/>

                            <label id=name>

                                <p class="k3">Enter OTP sent to your Email ID or Mobile Number</p>

                                <div class="input-group  otppass" >
                                    <input type="password" id="otp1" name="otp1" minlength="1"class="input5">

                                    <input type="password" id="otp2" name="otp2" minlength="1" class="input5">

                                    <input type="password" id="otp3" name="otp3" minlength="1" class="input5">

                                    <input type="password" id="otp4" name="otp4" minlength="1" class="input5">

                                </div>
                            </label>

                            @if ($errors->has('otp1'))
                            <div id="otp1-error" class="error text-danger pl-3" for="otp1" style="display: block;">
                                <strong>{{ $errors->first('otp1') }}</strong>
                            </div>
                            @endif

                            @if ($errors->has('otp2'))
                            <div id="otp2-error" class="error text-danger pl-3" for="otp2" style="display: block;">
                                <strong>{{ $errors->first('otp2') }}</strong>
                            </div>
                            @endif

                            @if ($errors->has('otp3'))
                            <div id="otp3-error" class="error text-danger pl-3" for="otp3" style="display: block;">
                                <strong>{{ $errors->first('otp3') }}</strong>
                            </div>
                            @endif

                            @if ($errors->has('otp4'))
                            <div id="otp4-error" class="error text-danger pl-3" for="otp4" style="display: block;">
                                <strong>{{ $errors->first('otp4') }}</strong>
                            </div>
                            @endif



                            <div class="d-flex justify-content-center   login_container">
                                <input type="hidden" name="email_or_mobile" class="input1" value="{{$signupStagingDTO->getMobileOrEmail()}}" placeholder="">
                                <button type="submit" name="button" class="btn login_btn"> Verify </button>
                            </div>

<!--                            <div class="mt-2">
                                <div class="d-flex justify-content-center links">
                                    Resend OTP in 00:60 
                                </div>

                                <div class="d-flex justify-content-center links">
                                    <a href="./login.html" class="ml-2">Resend OTP</a>

                                </div>


                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
            <br><br>
            </body>
            </html>