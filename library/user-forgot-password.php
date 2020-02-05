<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['change']))
{
  //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblstudents WHERE EmailId=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblstudents set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
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
    <title>Online Library Management System | Password Recovery </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">
    <style>
     .panel-info > .panel-heading {
        color: #000;
        background-color: #ffb643;
        border-color: #ffb643;
        font-family: 'Ubuntu', sans-serif;
        font-size: 20px;
        font-weight: 500;
        text-align: center;
    }
    .navbar-brand h1{
        color: white !important;
        opacity: .8;
        cursor:pointer;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: bolder;
        /* top: -20px;
        position:relative; */
        text-transform: uppercase!important;
        position: relative;
        top: 58px;
        }
        .navbar-brand h1:hover{
            opacity:1;
            cursor:pointer;
        }
    .btn-danger{
        background:wheat;
        border-color:wheat;
        color:#000;
        transition:0.3s ease;
        padding:10px 40px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: bolder;
      }
      .menu-section{
            background-color: #cea15a !important;
            border-color: white;
            border-bottom: 5px solid #ffb643 !important;
        }
      .btn-danger:hover{
        color:#fff;
        background:#e17055;
        border-color:#e17055;
        font-family: 'Ubuntu', sans-serif;
        font-size:15px;
        font-weight:500;
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
        .menu-top-active {
            background-color: #ffb643;
        }
    .navbar.navbar-inverse.set-radius-zero {
        display: none;
    }
    a.navbar-brand {
        position: relative;
        top: -80px;
    }
    .menu-section{
        background:linear-gradient(to right,#f8c29136, #fad3904f);
        border-bottom: 5px solid #60a3bc;
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
      .panel-info {
        box-shadow: 0px 0px 20px 5px rgba(79, 97, 214, 0.01);
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
   .content-wrapper {
    margin-top: 40px;
    min-height: auto;
    padding-bottom:90px;
  }
  .button-one {
    position: relative;
    left: 48%;
    transform: translateX(-13%);
    /* top: 0px; */
  }
  button.btn.btn-info {
    padding: 10px 55px;
    font-family: 'Ubuntu', sans-serif;
    font-size:15px !important;
    font-weight:400 !important;
    background:linear-gradient(to right,#f6b93b, #e58e26) !important; 
    border: 1px solid #e58e26 !important;
    transition: 0.3s ease;
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
  .content-wrapper {
        margin-top: 40px;
        min-height: auto;
        padding-bottom:90px;
      }
    </style>
     <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">User Password Recovery</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" name="chngpwd" method="post" onSubmit="return valid();">

<div class="form-group">
<!-- <label>Enter Reg Email id</label> -->
<input class="form-control" type="email" placeholder="Enter Reg Email id" name="email" required autocomplete="off" />
</div>

<div class="form-group">
<!-- <label>Enter Reg Mobile No</label> -->
<input class="form-control" type="text" placeholder="Enter Reg Mobile No" name="mobile" required autocomplete="off" />
</div>

<div class="form-group">
<!-- <label>Password</label> -->
<input class="form-control" type="password" placeholder="Password" name="newpassword" required autocomplete="off"  />
</div>

<div class="form-group">
<!-- <label>ConfirmPassword</label> -->
<input class="form-control" type="password" placeholder="ConfirmPassword" name="confirmpassword" required autocomplete="off"  />
</div>

 <div class="form-group one">
<label>Verification code : </label>
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<img src="captcha.php">
</div> 

 <div class="button-one"><button type="submit" name="change" class="btn btn-info">Chnage Password</button> | <a href="index.php">Login</a></div>
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
