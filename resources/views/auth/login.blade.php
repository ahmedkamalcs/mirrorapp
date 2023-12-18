<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>logIn</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link  href="{{ asset('css/stylesheet_login.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center form_container">
                         <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group mb-4">
                                <label>
                                    <h4 >WELCOME BACK TO HUB SYSTEM</h4>
                                </label>
                            </div>
                            <label id=name>
                                <div class="input-group mb-4">
                                    <label class="name">E-mail</label>
                                    <input type="text" name="email" class="input1" value="" placeholder="">
                                    @if ($errors->has('email'))
                                        <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="input-group mb-4">
                                    <label class="password">Password</label>
                                    <input type="password" name="password" class="input1" value="" placeholder="">
                                    <i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i>
                                    @if ($errors->has('password'))
                                       <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                         <strong>{{ $errors->first('password') }}</strong>
                                       </div>
                                     @endif
                                </div> 
                            </label>


                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <!--<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />-->
                                        <!--<label class="form-check-label" for="form2Example31"> Remember me </label>-->
                                    </div>
                                </div>

                                <!--div class="col">
                                    <a class="forpas"href="#!">Forgot password?</a>
                                </div-->
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                            <!-- Register buttons -->
                            <!--div class="text-center">
                                <p class="p2">Not registred yet? <a href="#!">Create an account</a></p>        
                            </div-->      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>