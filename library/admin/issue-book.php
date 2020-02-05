<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['issue']))
{
$studentid=strtoupper($_POST['studentid']);
$bookid=$_POST['bookdetails'];
$sql="INSERT INTO  tblissuedbookdetails(StudentID,BookId) VALUES(:studentid,:bookid)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Book issued successfully";
header('location:manage-issued-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-issued-books.php');
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
    <title>Online Library Management System | Issue a new Book</title>
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
    .btn-info{
        background:linear-gradient(to right,#f6b93b, #e58e26) !important; 
        border: 1px solid #e58e26 !important;
        transition: 0.3s ease;
        padding:10px 55px !important;
        color:#000 !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: bolder;
      }
      .btn-info:hover{
        background: #fff !important; 
        border: 1px solid #fff !important;
        color:#000 !important;
      }
    .footer-section {
        padding: 25px 50px 25px 50px;
        color: #000;
        font-size: 13px;
        background-color:#fff4e2 !important;
        text-align: right;
        border-top: 5px solid #ffb643;
        text-align:center;
        color: #000;
        font-family: 'Ubuntu', sans-serif;
        font-size: 15px;
        font-weight: 400;
   }
    .content-wrapper {
        margin-top: 40px;
        min-height: auto;
        padding-bottom:90px;
      }
    .panel-body {
        padding: 15px;
        background-color: #fff4e2 !important;
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
        background-color: #cea15abd !important;
        border-color: white;
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
            color: #000 !important;
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
      background-color: #cea15a !important;
      border-color: white;
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
            position:relative;
            top:-15px;
        }
        .navbar-brand h1:hover{
            opacity:1;
            cursor:pointer;
        }
     #menu-top a:hover{
       color:#9170e4;
     }
  
     .header-line {
        font-family: 'Ubuntu', sans-serif;
        font-size: 35px;
        font-weight: 700;
        padding-bottom: 25px;
        border-bottom: 1px solid #eeeeee;
        text-transform: uppercase;
        color:#000;
      }
    </style>
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
<style type="text/css">
  .others{
    color:red;
}

</style>


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issue a New Book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading">
Issue a New Book
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Srtudent id<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
</div>

<div class="form-group">
<span id="get_student_name" style="font-size:16px;"></span> 
</div>





<div class="form-group">
<label>ISBN Number or Book Title<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="booikid" id="bookid" onBlur="getbook()"  required="required" />
</div>

 <div class="form-group">

  <select  class="form-control" name="bookdetails" id="get_book_name" readonly>
   
 </select>
 </div>
<button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
