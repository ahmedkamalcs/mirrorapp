<html lang="en">
    <head>
        <title>signUp</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/stylesheet1.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>

    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card2">
                    <div class="d-flex justify-content-center form_container">
                        <form class="form" method="get" action="{{ route('signupotp') }}">
                            @csrf
                            <div class="input-group mb-5">
                                <div class="container" >
                                    <div class="row row2" >
                                        <div>
                                            <p class="sign">Sign Up</p>
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


                            <div class="input-group bd1">
                                <label>
                                    <h4 class="h43">welcome to hub system</h4>
                                </label>
                            </div>
                            <input type="hidden" name="companyprofileselect"  value="{{$companyprofileselect}}"/>
                            
                            <label id=name>
                                <div class="input-group mb-4">
                                    <label class="name">Email ID or Mobile Number</label>
                                    <input type="text" name="email" class="input1" placeholder="{{ __('Email or Mobile') }}" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                    @endif
                                </div>

                            </label>
                            <div class="input-group mb-3">
                                <div class="container" >
                                    <div class="row">


                                        <div class="col-4"  >

                                            <p class="p2">What is your business?</p>

                                        </div>

                                        <div class="col">


                                            <select>
                                                <option selected>Small Business</option>
                                                <option>Freelancer</option>
                                                <option>Home Business</option>
                                                <option>Independent Accountant</option>
                                                <option>Mobile App</option>
                                                <option>Online Business</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="d-flex justify-content-center   login_container">
                                <button type="submit" name="button" class="btn login_btn2">Request OTP </a></button>
                            </div>

                            <div class="mt-2">
                                <div class="d-flex justify-content-center links">
                                    Already have account? <a href="{{ url('login') }}" class="ml-2">Log in</a>
                                </div>            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
