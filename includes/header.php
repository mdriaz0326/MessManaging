<?php
 //error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Riazul Islam - Personal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<!--font start-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--font end-->
<style>

body {font-family: "Open Sans"}
body {
  background-image: url("pto/hmbgset.jpgNULL") !important;}
html { height: 100%; }
 body {
  position: relative;
padding-bottom: 45px;
 margin: 0;
    } 
    #footer { 
position: absolute; 
bottom: 0px; 
 width: 100%; 
height: 35px;

      }
      
  hr.style6 {
	background-color: #fff;
	border-top: 2px dotted #8c8b8b;
}
    

.styled h3{
	color:  #ffffff;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
	margin-top:-7px;
}

.styled h3 span{
	color:#e82eb0;
}
</style>


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand styled" href="http://mdriaz0326.epizy.com">
				<h3>mdriaz<span>0326</span>.com</h3>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php 
include("nav.php");
?>
      </ul>
    </div>
  </div>
</nav>
  
	  <div class="alertmsg"><!--alert-->
			<!--ALERT MASSEGE SHOW-->
	 	 <?php
      $path='http://mdriaz0326.epizy.com/';
	 	 if(isset($_SESSION ['success_msg'])){ ?>
	 	 <div class="alert alert-success col-md-12 text-center">
	 	 <strong>  	 <?php echo $_SESSION ['success_msg']; ?></strong>
	 	 </div> <!--alert-->
	 	 <?php } ?>
	 	 
	 	 <?php
	 	 if(isset($_SESSION ['error_msg'])){ ?>
	 	 <div class="alert alert-danger col-md-12 text-center">
	 	 <strong>Opps !! <?php echo $_SESSION ['error_msg']; ?></strong>
	 	 </div> <!--alert-->
	 	 <?php } ?>
	 	 <?php
	 	 if(isset($_SESSION ['info_msg'])){ ?>
	 	 <div class="alert alert-info col-md-12 text-center">
	 	 <?php echo $_SESSION ['info_msg']; ?>
	 	 </div> <!--alert-->
	 	 <?php } ?>
	  </div><!--alertmsg-->
<?php
session_start(); // Always start the session first

if (isset($_SESSION['error_msg']) || isset($_SESSION['success_msg']) || isset($_SESSION['info_msg'])) {
    unset($_SESSION['error_msg']);
    unset($_SESSION['success_msg']);
    unset($_SESSION['info_msg']);
}
?>

	 