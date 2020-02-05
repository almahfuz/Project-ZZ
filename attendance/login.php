<?php

//login.php

include('admin/database_connection.php');

session_start();

if(isset($_SESSION["teacher_id"]))
{
  header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    
  </style>
</head>
<body>

<div class="jumbotron" style="margin-bottom:0">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <h1 class="header"><a href="../flex/index.html">.FLEX-INSTITUTE.</a></h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav nav-opt">
      <li class="nav-item">
        <a class="nav-link" href="../flex/index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/login.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="login.php">Teacher</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="../chat">Chat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../library">Library</a>
      </li> 
    </ul>
  </div>  
</nav>
</div>



<div class="container">
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
      <div class="card card-login">
        <div class="card-header">Teacher Login</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">
            <div class="form-group">
              <label>Enter Email Address</label>
              <input type="text" name="teacher_emailid" id="teacher_emailid" class="form-control" />
              <span id="error_teacher_emailid" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="teacher_password" id="teacher_password" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <div class="form-group">
              <input type="submit" name="teacher_login" id="teacher_login" class="btn custom-btn btn-info" value="Login" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-2">

    </div>
  </div>
</div>

</body>
</html>

<script>
$(document).ready(function(){
  $('#teacher_login_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"check_teacher_login.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#teacher_login').val('Validate...');
        $('#teacher_login').attr('disabled','disabled');
      },
      success:function(data)
      {
        if(data.success)
        {
          location.href="index.php";
        }
        if(data.error)
        {
          $('#teacher_login').val('Login');
          $('#teacher_login').attr('disabled', false);
          if(data.error_teacher_emailid != '')
          {
            $('#error_teacher_emailid').text(data.error_teacher_emailid);
          }
          else
          {
            $('#error_teacher_emailid').text('');
          }
          if(data.error_teacher_password != '')
          {
            $('#error_teacher_password').text(data.error_teacher_password);
          }
          else
          {
            $('#error_teacher_password').text('');
          }
        }
      }
    })
  });
});
</script>