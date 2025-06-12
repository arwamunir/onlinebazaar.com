<?php include 'conn.php'; ?> 
<?php include 'navbar.php'; ?> 
<body>
<div class="container-fluid" style="margin-top: 80px;">
<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4" style="background-color: rgba(236, 240, 241,0.9);">
          <br>

    <h1 style="text-align: center;">Complaints / Feedback</h1>
    
   <form method="POST" action="" enctype="multipart/form-data">
     	  
        <label style="font-size: 17px;"> Name </label>
        
        <input type="text" class="form-control" placeholder="Name "  name="name" required="required"> 
<br>

		  <label style="font-size: 17px;"> Email</label>
        <input type="email"  class="form-control" placeholder="Email " name="email" required="required">
        <br>

<label style="font-size: 17px;"> Feedback </label>	<br>


<textarea class="form-control" name="feedback"></textarea> <br>

		  
<a href="#" style="text-decoration:none;" > 
  <input type="submit" class="form-control" name="submit" value="Submit" style="background-color: red; color: white;">
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
     $feedback= $_POST["feedback"];
       $email= $_POST["email"];
     

       // Get all the submitted data from the form
        
 $rgt = "INSERT INTO feedback (name,email,feedback) VALUES ('$name','$email','$feedback')";

        if (mysqli_query($conn ,$rgt)) {

          echo  "<script>

      window.location.href='feedback.php'
      alert('Submited Successfully!');

</script>
   ";
        }            
    }

  
?>
