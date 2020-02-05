<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
 //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {

$username=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
} else{
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
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .panel-body {
            padding: 15px;
            background-color: #fff4e2 !important;
        }
        .panel-info {
            /* border-color: #bce8f1;
            background: #12121312; */
            box-shadow: 0px 0px 20px 5px rgba(79, 97, 214, 0.01);
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
        .panel-info > .panel-heading {
            color: #000;
            background-color: #ffb643;
            border-color: #ffb643;
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            font-weight: 500;
            text-align: center;
        }
        i.fa.fa-users {
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
       label {
        font-family: 'Ubuntu', sans-serif;
        font-size:15px;
        font-weight:500;
        color:#7f8c8d;
       }
       input.form-control {
        margin-bottom: 20px;
        border-radius: 5px;
        width: 75%;
        margin: 0 auto;
       }
       .navbar-brand img {
        position: relative;
        top: -6px;
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
       button{
           position:relative;
           left:50%;
           transform:translateX(-50%);
           padding:10px 55px !important;
           font-family: 'Ubuntu', sans-serif;
           font-size:15px !important;
           font-weight:400 !important;
           background:linear-gradient(to right,#f6b93b, #e58e26) !important; 
           border: 1px solid #e58e26 !important;
           transition: 0.3s ease;
           color:#000 !important;
       }
       button:hover{
        color:#f1c40f !important;
        background:#fff !important;
        border:1px solid #fff !important;
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

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">ADMIN LOGIN FORM</h4>
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
<form role="form" method="post">

<div class="form-group">
<!-- <label>Enter Username</label> -->
<i class="fa fa-users" aria-hidden="true"></i>
<input class="form-control" type="text" placeholder="Enter User Name" name="username" autocomplete="off" required />
</div>
<div class="form-group">
<!-- <label>Password</label> -->
<i class="fa fa-unlock" aria-hidden="true"></i>
<input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off" required />
</div>
 <div class="form-group one">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5"  autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>  

 <button type="submit" name="login" class="btn btn-info">LOGIN </button>
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
</script>
</body>
</html>
