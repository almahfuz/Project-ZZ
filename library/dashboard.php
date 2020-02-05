<?php
session_start();
error_reporting(0);

include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Flex Institute | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap" rel="stylesheet">
    <style>
    .alert.alert-info.back-widget-set.text-center {
        background: #4a69bd5c;
    }
    .back-widget-set {
       transition: all 500ms ease;
    }
    .back-widget-set:hover {
       box-shadow: 0px 0px 7px 5px rgba(0, 0, 0, 0.1);
    }
    .alert.alert-warning.back-widget-set.text-center {
       background: #f8c2914a;
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
   .panel-info > .panel-heading {
        color: #000;
        background-color: #ffb643;
        border-color: #ffb643;
        font-family: 'Ubuntu', sans-serif;
        font-size: 20px;
        font-weight: 500;
        text-align: center;
    }
    .panel-body {
        padding: 15px;
        background-color: #fff4e2 !important;
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
                <h4 class="header-line">USER DASHBOARD</h4>
                
        </div>

        </div>
             
             <div class="row">
            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
<?php 
$sid=$_SESSION['stdid'];
$sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':sid',$sid,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$issuedbooks=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($issuedbooks);?> </h3>
                            Book Issued
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
<?php 
$rsts=0;
$sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':sid',$sid,PDO::PARAM_STR);
$query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>

                            <h3><?php echo htmlentities($returnedbooks);?></h3>
                          Books Not Returned Yet
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
