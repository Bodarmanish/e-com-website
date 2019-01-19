<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot password</title>
  <style>
       
        .message{ width: 470px;background:white;margin-top:-75px;color: red;}
         .message1{margin-bottom: ;}
          .tooltip:hover .tooltiptext {visibility: visible;}
          .tooltip .tooltiptext {
                                  visibility: hidden;
                                  width: 120px;
                                  background-color: black;
                                  color: #fff;
                                  text-align: center;
                                  border-radius: 6px;
                                  padding: 5px 0;

                                  /* Position the tooltip */
                                  position: absolute;
                                  z-index: 1;
                                } 
        
    </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('forgotpwd/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
                   
  <div class="limiter">
    <div class="container-login100">
           
      <div class="wrap-login100" style="height: 500px;">
        
          <a href="/admin" >

             <img src="{{asset('forgotpwd/images/back.jpeg')}}" alt="IMG" style=" height: 50px;
                margin-left: -100px;
                margin-top: -320px;">
          </a>
         
            
        <div class="login100-pic js-tilt" data-tilt>

          <img src="{{asset('forgotpwd/images/images.jpeg')}}" alt="IMG">
        </div>
        

        <form class="login100-form validate-form" method="POST" action="{{ url('password/create') }}" >

          {{ csrf_field() }}
          <span class="login100-form-title">
           Forgot Password?
          </span>


          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
            @if(session()->has("flash_message_user"))
              <span class="feedback" role="alert" style="color:red">
                  <strong>{{session()->get("flash_message_user")}}</strong> 
              </span>
            @endif                    
         
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
             Reset Password
            </button>
          </div>
                                
                                  
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="{{asset('forgotpwd/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

<!--   <script type="text/javascript" src="vanilla-tilt.js"></script>
 --><!--===============================================================================================-->
  <script src="{{asset('forgotpwd/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('forgotpwd/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('forgotpwd/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('forgotpwd/vendor/tilt/tilt.jquery.min.js')}}"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="{{asset('forgotpwd/js/main.js')}}"></script>

</body>
</html>