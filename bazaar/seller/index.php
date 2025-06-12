<?php include '../conn.php'; ?> 

<?php
session_start();
?> <!-- session is used for storing information -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bazaar.com Online Shopping Mall </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/8a2bdd4e42.js" crossorigin="anonymous"></script>
</head>
<style>
  .g{
    font-family: 'Trocchi', serif;
    background-color: black;
    color: white;
    font-size: 20px;
 
    height: 50%;
    width: 100%;
    padding: 18px 20px;
    
  }

  #c{
    
    background-color: red;
    color: white;
    font-size: 20px;
 
    height: 50%;
    width: 100%;
  padding: 0px 0px 0px 15px;
   border: 2px solid red;
  border-radius: 50px 20px;
  }

  #login{
    background-color:black ; 
    color: white; 
    text-decoration: none;
     border: 2px solid red;
  border-radius: 50px 20px;
  }


</style>

<body>

<label class="g" >Bazaar.com Online Shopping Mall  </label>


<div class="container" style="margin-top: 40px;">
<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="background-color: rgba(236, 240, 241,0.0) ;">
          <br>
    <h1 style="text-align: center;">Seller Login &#128522; </h1>

    <form method="POST" action="" enctype="multipart/form-data">

       <div class="row">
      <div class="col-md-12 ">

        <label id="c" style="font-size: 17px;"  >Email:</label>

        <input type="email" class="form-control" placeholder="Email" required="required" name="email" autofocus></div>

      </div><br>
      <div class="row">
        <div class="col-md-12">

         <label id="c" style="font-size: 17px;"  >Password:</label>

         <input type="password" name="password"  class="form-control" placeholder="Password" required="required">
        </div>  </div> <br>
  
      
     
 <a href="#" style="text-decoration:none;" ><input type="submit" name="submit" class="form-control" id="login" value="LOGIN" style="background-color:black ; color: white; text-decoration: none;"></a>

<br><br><br></form>
  <div class="col-md-4"></div> 
  </div> <!-- end of row -->
</div>   <!-- container closing div -->
</div>




<!-- php code -->
<?php
 // If login button is clicked ...
  
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * from seller WHERE email = '$email' AND password = '$password'";
  $user = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($user)) {

    $user_id = $row['id'];
    $user_name = $row['name'];
    $user_email = $row['email'];
    $user_password = $row['password'];
      $gender = $row['gender'];
      $user_status = $row['status'];

  }
  if ($user_email == $email  &&  
    $user_password == $password &&   $user_status == 'Approved') {

    $_SESSION['sid'] = $user_id;       // Storing the value in session
    $_SESSION['sname'] = $user_name;   // Storing the value in session
    $_SESSION['semail'] = $user_email; // Storing the value in session
    $_SESSION['spassword'] = $user_password; // Storing the value in session
    $_SESSION['sgender'] = $gender; // Storing the value in session


    //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
      echo '<script >'; 
            echo 'window.location.href="home.php"';
            echo '</script>';
  }
   else{
          echo '<script >';
            echo 'alert(" Incorrect Email or Password!");';
            echo 'window.location.href="index.php"';
            echo '</script>';
  } 
}
?>