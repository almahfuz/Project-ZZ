<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}

if(isset($_POST["register"]))
{
 $username = trim($_POST["username"]);
 $password = trim($_POST["password"]);
 $check_query = "
 SELECT * FROM login 
 WHERE username = :username
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':username'  => $username
 );
 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Username already taken</label></p>';
  }
  else
  {
   if(empty($username))
   {
    $message .= '<p><label>Username is required</label></p>';
   }
   if(empty($password))
   {
    $message .= '<p><label>Password is required</label></p>';
   }
   else
   {
    if($password != $_POST['confirm_password'])
    {
     $message .= '<p><label>Password not match</label></p>';
    }
   }
   if($message == '')
   {
    $data = array(
     ':username'  => $username,
     ':password'  => password_hash($password, PASSWORD_DEFAULT)
    );

    $query = "
    INSERT INTO login 
    (username, password) 
    VALUES (:username, :password)
    ";
    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
     $message = "<label>Registration Completed</label>";
    }
   }
  }
 }
}

?>

<html>  
    <head>
        <title>Chat</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <style>
          .bgk {
    background-color: #ffc403;
}
        </style>
    </head>  
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bgk">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="../attendance/admin/index.php">Go Back</a>
    </div>
  </div>
</nav>
        <div class="container">
   <br />
   <br />
   <div class="panel panel-default bg-dark" style="width: 40%; margin-left: auto; margin-right: auto; background-color: #343a40!important; color: white;">
      <div class="panel-heading" style= "background: rgb(206, 161, 90);text-align: center;padding: 20px;font-size: 18px;font-weight: 700; color: white">Chat Application Register</div>
    <div class="panel-body" style="padding: 10px;">
     <form method="post">
      <span class="text-danger"><?php echo $message; ?></span>
      <div class="form-group">
       <label for="username" name="username">Enter Username</label>
       <input id="username" type="text" name="username" class="form-control" />
      </div>
      <div class="form-group">
       <label for="password">Enter Password</label>
       <input id="password" type="password" name="password" class="form-control" />
      </div>
      <div class="form-group">
       <label for="confirm_password">Re-enter Password</label>
       <input id="confirm_password" type="password" name="confirm_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="register" class="btn btn-info" value="Register" />
      </div>
      <!-- <div align="end">
       <a class="btn btn-success" href="login.php">Login</a>
      </div> -->
     </form>
    </div>
   </div>
  </div>
    </body>  
</html>
