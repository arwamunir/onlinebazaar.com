<?php include '../conn.php'; ?>  
  <?php
     if(isset($_GET['id'])){ 
    $edit_id  =$_GET['id'];

   $eslt ="SELECT * from admin_login where id='$edit_id'"; 
    $ecnm=mysqli_query($conn,$eslt);
    $efetch= mysqli_fetch_array($ecnm);

     $rid=$efetch['id'];
     $rname=$efetch['name'];
       $remail=$efetch['email'];
         $rpassword=$efetch['password'];
     

    }
     ?>

  <div class="container-fluid">
    <div class="row">

  <div class="col-md-2">
  <?php include 'sidebar.php' ?>   
</div>

  <div class="col-md-4">

<div style="margin-top: 80px;background-color: rgba(236, 240, 241,0.9) ;">
           
          <br>

<h4  style="text-align: center;font-size: 20px;"> Please Edit Your Admin Detail</h4>
    
 <form method="POST" action=" " enctype="multipart/form-data">
		  
 <label style="font-size: 17px;"> Name </label>       
  <input type="text" value="<?php echo $rname;  ?>" class="form-control" placeholder="Name"  name="name" required="required">

 <label style="font-size: 17px;"> Email</label>       
  <input type="email" value="<?php echo $remail;  ?>" class="form-control" placeholder="Email"  name="email" required="required">

 <label style="font-size: 17px;"> Password</label>       
  <input type="password" value="<?php echo $rpassword;  ?>" class="form-control" placeholder="Password"  name="password" required="required">
 <br>

  
		 <a href="#" style="text-decoration:none;" > 
      <input type="submit" class="form-control" name="submit" value="Submit " style="background-color: green; color: white;">
    </a></form>
		  <br> 
		  </div>
        </div> 

	<div class="col-md-6" style="margin-top: 120px;" >
  <h4  style="text-align: center;font-size: 20px;"> Your Owner/Admin Detail</h4> <br> 
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >ID</th>
      <th>Name</th>
        <th>Email</th>
        <th>Password</th>
     
        <th > Edit </th>
          <th >Delete </th>

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$fslt ="SELECT * from admin_login";
   $fcnm=mysqli_query($conn,$fslt);
   while ($fetch= mysqli_fetch_array($fcnm)) {
      $tid=$fetch['id'];
     $fname=$fetch['name'];
       $femail=$fetch['email'];
         $fpassword=$fetch['password'];
  
    
     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>               
      <td> <?php   echo $fname;    ?></td>
       <td> <?php   echo $femail;    ?></td>
        <td> <?php   echo $fpassword;    ?></td>
 
                 <td> 
<a href="editadmin.php?id=<?php echo $tid; ?>"> <input type="button" name="Edit" value="Edit" class="btn btn-success" style="width:85px;">  </a>
            </td>

                <td> 

 <a href="deleteuser.php?aid=<?php echo $tid; ?>"> <input type="button" name="delete" value="Delete" class="btn btn-danger">  </a>
            </td>

       </tr>
   <?php    }
   ?>
</tbody>
</table>
  </div>
		</div>
		</div>
	  </div>
  
  

  <br>
	


<!-- Php code start here -->

<?php
 
  
  // If submit button is clicked ...
  if (isset($_POST['submit'])) {
  
        $name= $_POST["name"];
         $password= $_POST["password"];
           $email= $_POST["email"];
        
  $rgt = "UPDATE admin_login SET name='$name',email='$email',password='$password' where id='$edit_id '";

        if (mysqli_query($conn,$rgt)) {
          echo  "<script>

      window.location.href='admin.php'
      alert('Successfully Edit Your Data!');

</script>
   ";
        }            
    }

  
?>



	
	
	


