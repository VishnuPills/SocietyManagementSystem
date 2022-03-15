   <?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "faida_estate";
  session_start();

  if(!isset($_SESSION['user_id']))
  {
   header('location:login.php');
  }
  ?>  


 <html>
  <head>
    <title> Announcements </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main_dash.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">  
    <link rel="stylesheet" type="text/css" href="../css/userannouncements.css"> 

     <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
      <script type="text/javascript" src="../js/jquery.yacal.min.js"></script> 

  </head>
  <body>

    <div class="header">
       

        <a href="#" class="nav-trigger"><span></span></a>
        <p align="center" style="margin-top: 15px; margin-right: 60px; text-align: right; color: white; font-weight: bold; "><?php echo $_SESSION['username']; ?></p>

    </div>
      <div class="side-nav">
        <div class="logo">
       
          <span>somanage</span>

        </div>
        <nav>
          <ul>
            <li>
              <a href="treasurerdashboard.php">
                <span><i class="fa fa-user"></i></span>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <a href="treasurerchat.php">

                <span><i class="fa fa-envelope"></i></span>
                <span>Chat</span>
              </a>
            </li>
            
            <li class="active">
              <a href="treasurerannouncements.php">

                <span><i class="fa fa-envelope"></i></span>
                <span>Announcements</span>
              </a>
            </li>
           
          <li>
            <a href="../html/receipt.html">
              <span><i class="fa fa-upload"></i></span>
              <span>Prepare Receipts</span>
            </a>
          </li>
          <li>
            <a href="resident_payments.php">
              <span><i class="fa fa-search"></i></span>
              <span>Track Payments</span>
            </a>
          </li>

            <li>
              <a href="logout.php">
                <span><i class="glyphicon glyphicon-log-out"></i></span>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="main-content">

        <div class="container-fluid">

        <div class="announcement_page">
          <div class="row row-adjusted">
               <?php 
              include('get_announcements.php');
            ?>
          </div>
        </div>

      </div>
    </div>
      </body>  
  </html>   
  <script>
    $(document).ready(function(){

        setInterval(function(){
       $(".row-adjusted").load("get_announcements.php").fadeIn("slow");
     },500);

         });
  </script>
   