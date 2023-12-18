<html lang="en">
    <head>
        <title>create password</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/stylesheet2.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>

    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center form_container">
                        <form class="form" method="get" action="{{ route('signupregister') }}">
                            @csrf
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
                                    <h4 >CREATE PASSWORD</h4>
                                </label>
                            </div>
                            <input type="hidden" name="companyprofileselect" class="input1" value="{{$signupStagingDTO->getCompanyprofileselect()}}">
                             <input type="hidden" name="email" class="input1" value="{{$signupStagingDTO->getMobileOrEmail()}}">
                            <label id=name>
                                <div class="input-group mb-4">
                                    <label class="name">Name</label>
                                    <input type="text" name="name" class="input1" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
                                     @if ($errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="input-group mb-4">
                                    <label class="password">Password</label>
                                    <input type="password" name="password" class="input1" placeholder="{{ __('Password...') }}" required>
                                    @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                    @endif
                                    <!--<i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i>-->
                                </div> 
                                <div class="input-group mb-4">
                                    <label class="password">Confirm password</label>
                                    <input type="password" name="password_confirmation" class="input1" placeholder="{{ __('Confirm Password...') }}" required> 
                                    @if ($errors->has('password_confirmation'))
                                    <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                    @endif
                                    <!--<i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i>-->
                                </div>
<!--                                 <div class="input-group mb-4">
                                    <label class="name">CR Number</label>
                                    <input type="text" name="crnumber" class="input1"> 
                                </div>
                                <div class="input-group mb-4">
                                    <label class="name">Business Name</label>
                                    <input type="text" name="businessname" class="input1"> 
                                </div>-->
                                <div class="input-group mb-4">
                                    <input type="checkbox" name="terms" class="check1" placeholder=""> 
                                    <label class="label8">I agree to the <span class="second_statment"> Terms & Conditions </span></label>
                                    @if ($errors->has('terms'))
                                    <div id="terms-error" class="error text-danger pl-3" for="terms" style="display: block;">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </label>
                            

                            <div class="d-flex justify-content-center   login_container">
                                <button type="submit" name="button" class="btn login_btn">Create Account</button>
                            </div>
                            <div class="mt-2">             

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
