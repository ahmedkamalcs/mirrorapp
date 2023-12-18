<html lang="en">
    <head>
        <title>signUp</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link  href="{{ asset('css/stylesheet1.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>

    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card2">
                    <div class="d-flex justify-content-center form_container">
                        <form class="form" method="POST" action="{{ route('register', $companyprofileselect) }}">
                            @csrf
                            <div class="input-group mb-5">
                                <div class="container">
                                    <div class="row " style="height: 25px;" >
                                        <div class="col">
                                            <p class="sign"> Sign Up</p>
                                        </div>
          <!--                              <div class="col"><p class="otpnonactive">OTP</p></div>
                                        <div class="col"><p class="finishnonactive">Finish</p></div>-->
                                        <div class="col"><p class="otpnonactive"></p></div>
                                        <div class="col"><p class="finishnonactive"></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="lineactive"></div>
                                        </div>
                                        <div class="col"><div class="linenonactive"></div></div>
                                        <div class="col"><div class="linenonactive2"></div></div>
                                    </div>
                                </div> 
                            </div>

                            <div class="input-group mb-4">
                                <label>
                                    <h4 class="h43">welcome to hub system</h4>
                                </label>
                            </div>


                            <label id=name1>

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
                                    <label class="name">Email</label>
                                    <input type="email" name="email" class="input1" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                    @endif
                                </div>

                                <div class="input-group mb-4">
                                    <label class="name">Password</label>
                                    <input type="password" name="password" id="password" class="input1" placeholder="{{ __('Password...') }}" required>
                                    @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                    @endif
                                </div>

                                <div class="input-group mb-4">
                                    <label class="name">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"  class="input1" placeholder="{{ __('Confirm Password...') }}" required>
                                    @if ($errors->has('password_confirmation'))
                                    <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                    @endif
                                </div>



                            </label>

                            <select style="display: none" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="companyprofileselect" name="companyprofileselect" >
                                <option value="100"> ISG </option>
                                <option value="200"> Mirror </option>
                            </select>


                            <!--                            <div class="input-group mb-3">
                                                            <div class="container" >
                                                              <div class="row">
                                                          
                                                              
                                                                <div class="col-4"  >
                                                            
                                                            <p class="p2">What is your business ?</p>
                                                           
                                                          </div>
                                                          
                                                            <div class="col">
                                                                 
                                                  
                                                              <select >
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
                                                        </div>-->



                            <div class="d-flex justify-content-center   login_container">
                                <button type="submit" name="button" class="btn login_btn2">Create Account</button>
                            </div>

                            <div class="mt-2">
                                <div class="d-flex justify-content-center links">
                                    Already have account ? <a href="{{ url('page') }}" class="ml-2">Log in</a>
                                </div>            

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
