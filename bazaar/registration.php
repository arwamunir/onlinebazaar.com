<?php include 'conn.php'; ?> 
<?php include 'navbar.php'; ?> 
<body>
<div class="container-fluid" style="margin-top: 80px;">
<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4" style="background-color: rgba(236, 240, 241,0.9);">
          <br>

    <h1 style="text-align: center;">&#128525; Registration  &#127881;</h1>
    
   <form method="POST" action="" enctype="multipart/form-data">
     	  
        <label style="font-size: 17px;"> Name </label>
        
        <input type="text" class="form-control" placeholder="Name "  name="name" required="required"> 

        <label style="font-size: 17px;"> Gender </label> 
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input type="radio"  class="" value="male"  name="gender" > 

         <label style="font-size: 14px;"> Male </label>

		   <input type="radio"  class="" value="female"  name="gender" >
         <label style="font-size: 14px;"> Female </label>

          <input type="radio"  class="" value="other"  name="gender" >
         <label style="font-size: 14px;"> Other </label><br>

		  <label style="font-size: 17px;"> Email</label>
        <input type="email"  class="form-control" placeholder="Email " name="email" required="required">

		    <label style="font-size: 17px;">Password</label>
          <input type="password"  name="password"  class="form-control" placeholder="Password" required="required" >
		  
		    <label style="font-size: 17px;">Confirm Password </label>
          <input type="password" name="confirm"  class="form-control" placeholder="Confirm Password"  required="required"> <br>
		  
		  
<a href="#" style="text-decoration:none;" > 
  <input type="submit" class="form-control" name="submit" value="Register" style="background-color: red; color: white;">
</a>
		  <br>


		  
		  
		   <div class="col-md-4"></div>

		</form>
		</div>
		</div>
	

		  
  
    
  </div> 
 <br>

	
</body>
<?php include 'footer.php'; ?>

	<?php
 
  
  // If upload button is clicked ...

  if (isset($_POST['submit'])) {
  
    $name = $_POST["name"];
     $gender= $_POST["gender"];
       $email= $_POST["email"];
        $password= $_POST["password"];
        $confirm = $_POST["confirm"];

      if ($password != $confirm) {
          echo  "<script>

          alert('Password or confirm Password are not Matched!');
          window.location.href='registration.php'
          </script>";
        }
        else{

/* sending mail to user email*/
$url = "https://script.google.com/macros/s/AKfycbxB6nc52pntuaqswXkRFLt5Fc0LVLuH1IggjhIdZXkoTGr6xS37rMw62qCJ2ZXSo3ed_Q/exec";
 $ch = curl_init($url);
 curl_setopt_array($ch,

 [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
      "recipient" => $email,
      "subject"   => 'Welcome To Our Site ',                   
"body"=>  "We are pleausred to Welcome You!",                                     ])
            ]);
$result = curl_exec($ch);
   /*Mail code end here*/  



        // Get all the submitted data from the form
        
 $rgt = "INSERT INTO registration (name,email,gender,password,status) VALUES ('$name','$email','$gender','$password','Pending')";

        if (mysqli_query($conn ,$rgt)) {

          echo  "<script>

      window.location.href='registration.php'
      alert('Registration Successfully!');

</script>
   ";
        }            
    }

  }
?>
