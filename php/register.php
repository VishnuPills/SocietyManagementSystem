<?php

include('database_connection.php');

session_start();

$message = '';
if(isset($_POST["register"]))
{
 $name = trim($_POST["name"]);
 $letter = trim($_POST["letter"]);
 $number = trim($_POST["number"]);
 $email = trim($_POST["email"]);
 $phoneno = trim($_POST["phoneNo"]);
 $position = "Not Verified";
 $password = trim($_POST["password"]);

 $plus = "+";

$housenumber = $letter . $number;
$phoneNo = $plus . $phoneno;

 $check_query = "
 SELECT * FROM users 
 WHERE email = :email
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':email'  => $email
 );
 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Email is already taken</label></p>';
  }
  elseif(empty($email))
   {
    $message .= '<p><label>Email is required</label></p>';
  }}

   if($message == '')
   {
    $data = array(
     ':name'  => $name,
     ':housenumber'  => $housenumber,
     ':email'  => $email,
     ':phoneNo'  => $phoneNo,
     ':position'  => $position,
     ':password'  => password_hash($password, PASSWORD_DEFAULT)

    );

    $query = "
    INSERT INTO users 
    (username, houseNumber, email, phoneNo, Position, password) 
    VALUES (:name, :housenumber, :email, :phoneNo, :position, :password )
    ";
    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
    echo '<script language="javascript">';
    echo 'alert("Registration Complete! \r\nWait for verification from the Chairperson.");';
    echo "location.href='../html/home.html';";
    echo '</script>';
    }
  }
}
   
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title> Sign Up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../Login_v13/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="../Login_v13/css/util.css">
    <link rel="stylesheet" type="text/css" href="../Login_v13/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="login100-more" style="background-image: url(https://cdn.pixabay.com/photo/2013/07/12/17/59/association-152746__340.png);"></div>

      <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <form class="login100-form validate-form" name= "myform" method="post" action="../php/register.php">
          <span class="login100-form-title p-b-59">
            Sign Up
          </span>
                    
                    <div class="wrap-input100 validate-input" data-validate="Name is required">
            <span class="label-input100">Full Name</span>
            <input class="input100" type="text" name="name" >
            <span class="focus-input100"></span>
          </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="E-mail Address is required">
            <span class="label-input100">Email Address</span>
            <input class="input100" type="text" name="email" >
            <span class="focus-input100"></span>
          </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Phone Number is required">
            <span class="label-input100">Phone Number</span>
            <input class="input100" type="text" name="phoneNo" > 
            <span class="focus-input100"></span>
          </div>
                    
                  
            <span class="label-input100">House Number (eg. A1) </span>
            <div style="float: left;">
            <select name = "letter" class="input100">
               <option>--</option>
               <option value = "A">A</option>
               <option value = "B">B</option>
               <option value = "C">C</option>
               <option value = "D">D</option>
               <option value = "E">E</option>
             </select>
           </div>
           <div style="float: right;">
             <select name = "number" class="input100">
               <option>--</option>
               <option value = "1">1</option>
               <option value = "2">2</option>
               <option value = "3">3</option>
               <option value = "4">4</option>
               <option value = "5">5</option>
               <option value = "6">6</option>
               <option value = "7">7</option>
               <option value = "8">8</option>
             </select>
           </div>
           <span class="focus-input100"></span>
   
               <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="**********">
            <span class="focus-input100"></span>
          </div>

            <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" name="register">
                Sign Up
              </button>
            </div>
                        

            <a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
              I already have an account
              <i class="fa fa-long-arrow-right m-l-5"></i>
            </a>
                        
                        <a href="../html/index.html" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
              Back to Home Page </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <script src="../Login_v13/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="../Login_v13/vendor/animsition/js/animsition.min.js"></script>
  <script src="../Login_v13/vendor/bootstrap/js/popper.js"></script>
  <script src="../Login_v13/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../Login_v13/vendor/select2/select2.min.js"></script>
  <script src="../Login_v13/vendor/daterangepicker/moment.min.js"></script>
  <script src="../Login_v13/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="../Login_v13/vendor/countdowntime/countdowntime.js"></script>
  <script src="../Login_v13/js/main.js"></script>

</body>
</html>

