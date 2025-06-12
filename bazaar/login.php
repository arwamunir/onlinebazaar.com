<?php include 'navbar.php'; ?>

<body>

<div class="container" style="margin-top: 40px;">
<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="background-color: rgba(236, 240, 241,0.0) ;">
          <br>
    <h1 style="text-align: center;"> Login &#128522; </h1>

    <form method="POST" action="" enctype="multipart/form-data">

       <div class="row">
      <div class="col-md-12 ">

        <label style="font-size: 17px;"  >Email:</label>

        <input type="email" class="form-control" placeholder="Email" required="required" name="email" autofocus></div>

      </div><br>
      <div class="row">
        <div class="col-md-12">

         <label style="font-size: 17px;"  >Password:</label>

         <input type="password" name="password"  class="form-control" placeholder="Password" required="required">
        </div>  </div> <br>
  
      
     
 <a href="#" style="text-decoration:none;" ><input type="submit" name="submit" class="form-control" value="LOGIN" style="background-color:black ; color: white; text-decoration: none;"></a>

<br><br><br></form>
  <div class="col-md-4"></div> 
  </div> <!-- end of row -->
</div>   <!-- container closing div -->
</div>

<?php include 'footer.php'; ?>


<!-- php code -->
<?php
 // If login button is clicked ...
  
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * from registration WHERE email = '$email' AND password = '$password'";
  $user = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($user)) {

    $user_id = $row['id'];
    $user_name = $row['name'];
    $user_email = $row['email'];
    $user_password = $row['password'];
      $gender = $row['gender'];
      $user_status = $row['status'];

  }
  if ($user_email == $email  &&  $user_password == $password &&   $user_status == 'Approved') {

    $_SESSION['bid'] = $user_id;       // Storing the value in session
    $_SESSION['bname'] = $user_name;   // Storing the value in session
    $_SESSION['bemail'] = $user_email; // Storing the value in session
    $_SESSION['bpassword'] = $user_password; // Storing the value in session
    $_SESSION['bgender'] = $gender; // Storing the value in session


    //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
      echo '<script >'; 
            echo 'window.location.href="index.php"';
            echo '</script>';
  }
   else{
          echo '<script >';
            echo 'alert(" Incorrect Email or Password!");';
            echo 'window.location.href="Login.php"';
            echo '</script>';
  } 
}
?>