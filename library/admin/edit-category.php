<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$category=$_POST['category'];
$status=$_POST['status'];
$catid=intval($_GET['catid']);
$sql="update  tblcategory set CategoryName=:category,Status=:status where id=:catid";
$query = $dbh->prepare($sql);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':catid',$catid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Brand updated successfully";
header('location:manage-categories.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Categories</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">
    <style>
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
                <h4 class="header-line">Edit category</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Category Info
</div>
 
<div class="panel-body">
<form role="form" method="post">
<?php 
$catid=intval($_GET['catid']);
$sql="SELECT * from tblcategory where id=:catid";
$query=$dbh->prepare($sql);
$query-> bindParam(':catid',$catid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               
  ?> 
<div class="form-group">
<label>Category Name</label>
<input class="form-control" type="text" name="category" value="<?php echo htmlentities($result->CategoryName);?>" required />
</div>
<div class="form-group">
<label>Status</label>
<?php if($result->Status==1) {?>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="1" checked="checked">Active
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="0">Inactive
</label>
</div>
<?php } else { ?>
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="0" checked="checked">Inactive
</label>
</div>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="1">Active
</label>
</div
<?php } ?>
</div>
<?php }} ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

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