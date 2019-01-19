
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin login</title>
    <meta charset="UTF-8">
    <style>
       
        .message{ width: 270px;background:white;margin-top:-53px;color: red;}
         .message1{margin-bottom: ;}
            
        
    </style>
    <link rel="icon" type="image/png" href="{{asset('forgotpwd/images/icons/favicon.ico')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="icon" type="image/png" href="{{asset('login172/images/icons/favicon.ico"')}}/>

    <link rel="stylesheet" type="text/css" href="{{asset('login172/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />


    <link rel="stylesheet" type="text/css" href="{{asset('login172/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login172/fonts/iconic/css/material-design-iconic-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login172/vendor/animate/animate.css')}}">
 
    <link rel="stylesheet" type="text/css" href="{{asset('login172/vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login172/vendor/animsition/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login172/vendor/select2/select2.min.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('login172/vendor/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login172/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login172/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login172/css/popup.css')}}">




</head>
<body>
                    
        @if(session()->has("flash_message_logout"))
            <div id="gritter-notice-wrapper">
                <div id="gritter-item-1" class="gritter-item-wrapper" style="opacity: 0.7;">
                   <div class="gritter-top"></div>
                    <div class="gritter-item" style="background:blue">
                     <div class="gritter-with-image">
                        <span class="gritter-title">{{session()->get("flash_message_logout")}}</span>
                      </div>
                    <div style="clear:both"></div>
                  </div>
                <div class="gritter-bottom"></div>
              </div>
            </div>    
        @endif
         
        <div class="container-login100" style="height: 600px;background-image: url('{{ asset('login172/images/bg-01.jpg')}}');">
                   
                                              
                    
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54"style="height: 630px">
               
                                    

                <form class="login100-form validate-form" method="post" action="{{ route('admin') }}">
                    {{ csrf_field() }}
                    <div class="login100-pic js-tilt" data-tilt>
                    <span class="login100-form-title p-b-49"style="margin-top: -20px">
                        <img src="{{asset('login172/images/login2.jpeg')}}" alt="IMG">
                    </span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="email" name="email" placeholder="Type your username">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    
                    <div class="text-right p-t-8 p-b-31">
                        <a href="{{ url('password/forgotpwd ')}}">
                            Forgot password?
                        </a>
                    </div>
                                <div class="message">
                                    @if(session()->has("flash_message_error"))

                                      <strong>{{session()->get("flash_message_error")}}</strong> 
                                      
                                    @endif
                                </div>

                    <div class="container-login100-form-btn" style="margin-top: 70px;">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                  
    

    <div id="dropDownSelect1"></div>
    

    <script src="{{asset('login172/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('login172/vendor/animsition/js/animsition.min.js')}}"></script>

    <script src="{{asset('login172/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{asset('login172/vendor/select2/select2.min.js')}}"></script>

    <script src="{{asset('login172/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('login172/vendor/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('login172/vendor/countdowntime/countdowntime.js')}}"></script>

    <script src="{{asset('login172/js/main.js')}}"></script>

    <script src="{{asset('forgotpwd/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script src="{{ asset('js/backend_js/jquery.gritter.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>

</body>
</html>