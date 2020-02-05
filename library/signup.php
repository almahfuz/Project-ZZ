<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {    
//Code for student ID
$count_my_page = ("studentid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$StudentId= $hits[0];   
$fname=$_POST['fullanme'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$status=1;
$sql="INSERT INTO  tblstudents(StudentId,FullName,MobileNumber,EmailId,Password,Status) VALUES(:StudentId,:fname,:mobileno,:email,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':StudentId',$StudentId,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your Registration successfull and your student id is  "+"'.$StudentId.'")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
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
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
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
        .panel-danger > .panel-heading{
            color: #000;
            background-color: #ffb643;
            border-color: #ffb643;
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            font-weight: 500;
            text-align: center;
        }
        .panel-danger {
            box-shadow: 0px 0px 20px 5px rgba(79, 97, 214, 0.01);
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
        left: 13%;
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
           background: linear-gradient(to right,#f6b93b, #e58e26) !important;
           border: 1px solid #e58e26 !important;
           transition: 0.3s ease;
           color:#000 !important;
       }
       .content-wrapper {
        margin-top: 40px;
        min-height: auto;
        padding-bottom:90px;
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
      .col-md-9.col-md-offset-1 {
        margin-left: 139px;
      }
    </style>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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
                <h4 class="header-line">User Signup</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           SIGNUP FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
<div class="form-group">
<!-- <label>Enter Full Name</label> -->
<input class="form-control" type="text" placeholder="Enter Full Name" name="fullanme" autocomplete="off" required />
</div>


<div class="form-group">
<!-- <label>Mobile Number :</label> -->
<input class="form-control" type="text" placeholder="Mobile Number :" name="mobileno" maxlength="12" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<!-- <label>Enter Email</label> -->
<input class="form-control" type="email" placeholder="Enter Email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>

<div class="form-group">
<!-- <label>Enter Password</label> -->
<input class="form-control" type="password" placeholder="Enter Password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<!-- <label>Confirm Password </label> -->
<input class="form-control"  type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="off" required  />
</div>
 <div class="form-group one">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>                                
<button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
