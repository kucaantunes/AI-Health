<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_destroy();
							session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<HTML>
<head>
 <link rel="shortcut icon" href="favicon.ico">
    
 

    <!-- Styles -->
     <link rel="shortcut icon" href="Images/favicon.ico">
	
	  <title>AI Health</title>
<style>

@import url(https://fonts.googleapis.com/css?family=Audiowide);

::-moz-selection {
    background: #cc0000;
    text-shadow: none;
}

::selection {
    background: #cc0000;
    text-shadow: none;
}

html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video {
  border: 0;
  font: inherit;
  font-size: 100%;
  margin: 0;
  padding: 0;
  vertical-align: baseline;
  text-rendering: optimizeLegibility;
}

article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
  display: block;
}

html,body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  background: #1b1b1b;
  color: #FFF;
  font-family: "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-size: 12px;
  line-height: 1;
}

.background-wrap {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  overflow: hidden;
}

.background {
  background: url('https://i.ibb.co/yPY7yWY/b5.jpg'); 
  background-size: cover;
  filter: blur(10px);
  height: 105%;
  position: relative;
  width: 105%;
  right: -2.5%;
  left: -2.5%;
  top: -2.5%;
  bottom: -2.5%;
}

* {
  box-sizing: border-box;
  cursor: default;
  outline: none;
}

form {
  background: #111;
  border: 1px solid #191919;
  border-radius: .4em;
  bottom: 0;
  box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);
  height: 380px;
  left: 0;
  margin: auto;
  overflow: hidden;
  position: absolute;
  right: 0;
  top: 0;
  width: 300px;
}

form:after {
  background: linear-gradient(to right, #111111, #444444, #b6b6b8, #444444, #2F2F2F, #272727);
  content: "";
  display: block;
  height: 1px;
  left: 50px;
  position: absolute;
  top: 0;
  width: 150px;
}

form:before {
  border-radius: 50%;
  box-shadow: 0 0 6px 4px #fff;
  content: "";
  display: block;
  height: 5px;
  left: 34%;
  position: absolute;
  top: -7px;
  width: 8px;
}

.inset {
  border-top: 1px solid #19191a;
  padding: 20px;
}

form h1 {
  font-family: 'Audiowide';
  border-bottom: 1px solid #000;
  font-size: 18px;
  padding: 15px 0;
  position: relative;
  text-align: center;
  text-shadow: 0 1px 0 #000;
}

form h1 {
  color: #FFbb00;
  font-family: Audiowide;
  font-weight: normal;
}

form h1.poweron {
  color: #ffffff;
  transition: all 0.5s;
  animation: flicker 1s ease-in-out 1 alternate, neon 1.5s ease-in-out infinite alternate;
  animation-delay: 0s, 1s;
}

form h1:after {
  position: absolute;
  width: 250px;
  height: 180px;
  content: "";
  display: block;
  pointer-events: none;
  top: 0;
  margin-left: 138px;
  transform-style: flat;
  transform: skew(20deg);

  background: -moz-linear-gradient(top, hsla(0,0%,100%,0.1) 0%, hsla(0,0%,100%,0) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,hsla(0,0%,100%,0.2)), color-stop(100%,hsla(0,0%,100%,0)));
  background: -webkit-linear-gradient(top, hsla(0,0%,100%,0.1) 0%,hsla(0,0%,100%,0) 100%);
  background: -o-linear-gradient(top, hsla(0,0%,100%,0.1) 0%,hsla(0,0%,100%,0) 100%);
  background: -ms-linear-gradient(top, hsla(0,0%,100%,0.1) 0%,hsla(0,0%,100%,0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#42ffffff', endColorstr='#00ffffff',GradientType=0 );
  background: linear-gradient(to bottom, hsla(0,0%,100%,0.1) 0%,hsla(0,0%,100%,0) 100%);

}

input[type=text], input[type=password] {
  background: linear-gradient(#1f2124,#27292c);
  border: 1px solid #222;
  border-radius: .3em;
  box-shadow: 0 1px 0 rgba(255,255,255,0.1);
  color: #FFF;
  font-size: 13px;
  margin-bottom: 20px;
  padding: 8px 5px;
  width: 100%;
}

input[type=text]:disabled, input[type=password]:disabled {
	color: #999;
}

label[for=remember] {
  color: #bbb;
  display: inline-block;
  height: 20px;
  line-height: 20px;
  vertical-align: top;
  padding: 0 0 0 5px;
}

.p-container {
  padding: 0 20px 20px;
}

.p-container:after {
  clear: both;
  content: "";
  display: table;
}

.p-container span {
  color: #0d93ff;
  display: block;
  float: left;
  padding-top: 8px;
}

input[type=submit] {
  background: #fb0;
  border: 1px solid rgba(0,0,0,0.4);
  border-radius: .3em;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 10px 10px rgba(255,255,255,0.1);
  color: #873C00;
  cursor: pointer;
  font-size: 13px;
  font-weight: bold;
  height: 40px;
  padding: 5px 20px;
  width: 100%;
}


input[type=button]{
  background: #fb0;
  border: 1px solid rgba(0,0,0,0.4);
  border-radius: .3em;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 10px 10px rgba(255,255,255,0.1);
  color: #873C00;
  cursor: pointer;
  font-size: 13px;
  font-weight: bold;
  height: 40px;
  padding: 5px 20px;
  width: 100%;
}

input[type=button]:hover, input[type=button]:focus {
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -10px 10px rgba(255,255,255,0.1);
}


.denied {
  color: white !important;
  text-shadow: 0 0 1px black;
  background: #EE0000 !important;
}

input[type=submit]:hover, input[type=submit]:focus {
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -10px 10px rgba(255,255,255,0.1);
}

input[type=text]:hover:not([disabled]), 
input[type=text]:focus, 
input[type=password]:hover:not([disabled]), 
input[type=password]:focus, 
label:hover ~ input[type=text], 
label:hover ~ input[type=password] {
  background: #27292c;
}

input[type="checkbox"] {
  opacity: 0;
  background: red;
  position: absolute;
  cursor: pointer;
  z-index: 1;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
}

.checkboxouter {
  height: 20px;
  width: 20px;
  border-radius: 3px;
  background-color: #000;
  position: relative;
  display: inline-block;
  border: 2px solid #555;
}

.checkbox {
  position: absolute;
  border-bottom: 2px solid #333;
  border-right: 2px solid #333;
  background-color: transparent;
  height: 10px;
  width: 5px;
  margin: auto;
  left: 50%;
  transform: rotate(45deg);
  transform-origin: -35% 30%;
  transition: all 0.2s;
}

input[type="checkbox"]:checked ~ .checkbox {
  transition: all 0.3s;
  border-bottom: 2px solid #ffcc00;
  border-right: 2px solid #ffcc00;
}

@keyframes neon {
  from {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  to {
      text-shadow: 
      0 0 3px #fff,
      0 0 7px  #fff,
      0 0 13px  #fff,
      0 0 17px  #B6FF00,
      0 0 33px  #B6FF00,
      0 0 38px  #B6FF00,
      0 0 48px #B6FF00,
      0 0 63px #B6FF00;
    }
}

@keyframes flicker {
  0% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  2% {
    text-shadow: none;
  }

  8% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  10% {
    text-shadow: none;
  }

  20% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  22% {
    text-shadow: none;
  }

  24% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  28% {
    text-shadow: none;
  }

  32% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  34% {
    text-shadow: none;
  }

  36% {
    text-shadow: none;
  }

  42% {
    text-shadow: none;
  }

  100% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }
}

</style>

</head>

<body>

<img src="favico.ico" 
style= "height: 100%; width: 100%; 
position: absolute; z-index:-10;
top:0px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"/>
	
	 
  <img src="logo1.png"/ style= "height: 18%; align: center display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
   position: absolute;
    top: 14%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) 
  
  
  ">


<div class="background-wrap">
  <div class="background"></div>
</div>

<form id="accesspanel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post" id="frmLogin"> <!--onSubmit="return validate();"-->
  <h1 id="litheader">AI Health</h1>
 
   <?php 
                if(isset($_SESSION["errorMessage"])) {
                ?>
                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                <?php 
                unset($_SESSION["errorMessage"]);
                } 
                ?>
  <div class="inset">
 
   <label for="username">Username</label><span id="user_info" class="error-info"></span>
     
    <p>
	<span class="help-block"><?php echo $username_err; ?></span>
      <input type="text" name="username"  placeholder="Email address" class="form-control" value="<?php echo $username; ?>"><span id="user_info" class="error-info">
     <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
	</p>
	<label for="password">Password</label><span id="password_info" class="error-info"></span>
    <p>
	 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <input type="password" name="password" id="password" type="password" placeholder="Access code">
	   <span class="help-block"><?php echo $password_err; ?></span>
    </p>
   
    <input class="loginLoginValue" type="hidden" name="service" value="login" />
  </div>
  <p> </p>
  <p class="p-container"> </p>
  <p class="p-container">
  <a href="index.php">
    <input type="submit" type="submit" name="login" value="Authorize">
	</a>
	
	
  
	
	 <a href="register.php">
    <input type="button" type="submit"  id= "go" action="register.php" value="Create account">
	</a>
  </p>
  
   <div style="text-align: center;">
      <div class="checkboxouter">
        <input type="checkbox" name="rememberme" id="remember" value="Remember">
        <label class="checkbox"></label>
      </div>
      <label for="remember">Remember me</label>
    </div>
</form>



 <script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>


<body>










</HTML>