<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
  //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
else {
$email=$_POST['emailid'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->StudentId;
if($result->Status==1)
{
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
}
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">

    <style>
        .navbar.navbar-inverse.set-radius-zero {
         display: none;
      }
      .menu-section{
            background-color: #cea15a !important;
            border-color: white;
        }
        .navbar-brand h1{
            color: white !important;
            opacity: .8;
            cursor:pointer;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: bolder;
            top: -20px;
            position:relative;
            text-transform: uppercase!important;
        }
        .navbar-brand h1:hover{
            opacity:1;
            cursor:pointer;
        }
        .header-line {
            font-family: 'Ubuntu', sans-serif;
            font-size: 35px;
            font-weight: 700;
            padding-bottom: 25px;
            border-bottom: 1px solid #eeeeee;
            text-transform: uppercase;
            color: #000;
            text-align: center;
        }
        #menu-top a {
            color: #fff !important;
            text-decoration: none;
            font-weight: 500;
            padding: 25px 15px 25px 15px;
            text-transform: uppercase;
            font-family: 'Ubuntu', sans-serif;
            font-size: 15px;
            font-weight: 500;
        }
        #menu-top a:hover{
            color: #000 !important;
            background-color: #ffb643;
        }
        .panel-body {
            padding: 15px;
            background-color: #fff4e2 !important;
        }
        .panel-info > .panel-heading {
            color: #000;
            background-color: #ffb643;
            border-color: #ffb643;
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            font-weight: 500;
            text-align: center;
        }
        .bla {
        box-shadow: 0px 0px 20px 5px rgba(79, 97, 214, 0.01);
        }
      label {
        font-family: 'Ubuntu', sans-serif;
        font-size:15px;
        font-weight:500;
        color:#7f8c8d;
    }
    i.fa.fa-envelope {
      position: relative;
      left: 80%;
      top: 33px;
      font-size: 21px;
      color: #e67e22;
    }
    i.fa.fa-unlock {
      position: relative;
      left: 80%;
      top: 33px;
      font-size: 21px;
      color: #e67e22;
    }
    p.help-block {
      text-align: center;
      margin-bottom: 40px;
   }
   p.help-block a{
     color:#1abc9c;
     text-decoration:none !important;
     font-family: 'Ubuntu', sans-serif;
     font-size:15px;
     font-weight:500;
   }
   p.help-block a:hover{
     color: #fff;
   }
   input.form-control {
      margin-bottom: 20px;
      border-radius: 5px;
      width: 75%;
      margin: 0 auto;
   }
   .form-group.one {
      position: relative;
      left: 12%;
      margin-bottom: 30px;
    }
    /* .one img {
    margin-left: 20px;
    border: 2px solid deepskyblue;
    padding-left: 10px;
    border-radius: 5px;
   } */
   .navbar-brand img {
    position: relative;
    top: -6px;
  }
  .content-wrapper {
    margin-top: 40px;
    min-height: auto;
    padding-bottom:90px;
  }
  .button-one {
    position: relative;
    left: 50%;
    transform: translateX(-13%);
    /* top: 0px; */
  }
  button.btn.btn-info {
    padding: 10px 55px;
    background: linear-gradient(to right,#f6b93b, #e58e26) !important;
    border: 1px solid #e58e26 !important;
    transition: 0.3s ease;
    font-family: 'Ubuntu', sans-serif;
    font-size:15px;
    font-weight:400;
    color:#000 !important;
  }
  button.btn.btn-info:hover{
    color:#f1c40f !important;
    background:#fff !important;
    border:1px solid #fff !important;
  }
  .button-one a{
    color:#7f8c8d;
    font-family: 'Ubuntu', sans-serif;
    font-size:15px;
    font-weight:400;
    text-decoration:none !important;
  }
  .button-one a:hover{
    color:#3498db;
  }
  .footer-section .col-md-12 {
    text-align: center;
    color: #000;
    font-family: 'Ubuntu', sans-serif;
    font-size:15px;
    font-weight:400;
  }
  .footer-secton .col-md-12 a{
    text-decoration:none !important;
    color:#f1c40f !important;
    font-family: 'Ubuntu', sans-serif;
    font-size:15px;
    font-weight:400;

  }
  </style>
</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info bla">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<!-- <label>Enter Email id</label> -->
<i class="fa fa-envelope" aria-hidden="true"></i>
<input class="form-control" type="text"  placeholder="Enter Email id"name="emailid" required autocomplete="off" />
</div>
<div class="form-group">
<!-- <label>Password</label> -->
<i class="fa fa-unlock" aria-hidden="true"></i>
<input class="form-control" type="password" placeholder="Password" name="password" required autocomplete="off"  />
<p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
</div>

 <div class="form-group one">
<label>Verification code : </label>
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<img src="captcha.php">
</div> 

 <div class="button-one">
 <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>
 </div>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->             
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
