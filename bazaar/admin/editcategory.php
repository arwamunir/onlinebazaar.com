  <?php include '../conn.php'; ?>  
  <?php

     if(isset($_GET['id'])){ 
    $edit_id  =$_GET['id'];
   $eslt ="SELECT * from category where id='$edit_id'"; 
    $ecnm=mysqli_query($conn,$eslt);
    $efetch= mysqli_fetch_array($ecnm);

     $cid=$efetch['id'];
     $cname=$efetch['cname'];
    
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

<h4  style="text-align: center;font-size: 20px;"> Please Add Your Category Detail</h4>
    
 <form method="POST" action=" " enctype="multipart/form-data">
		  
 <label style="font-size: 17px;"> Name </label>       
  <input type="text" value="<?php echo $cname;   ?>" class="form-control"  name="name" required="required">
 <br> 
		 <a href="#" style="text-decoration:none;" > 
      <input type="submit" class="form-control" name="submit" value="Submit " style="background-color: green; color: white;">
    </a></form>
		  <br> 
		  </div>
        </div> 
    
	<div class="col-md-6" style="margin-top: 120px;" >
<h4  style="text-align: center;font-size: 20px;"> Your Category Detail</h4> <br>
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >ID</th>
      <th>Category</th>
     
        <th > Edit </th>
          <th >Delete </th>

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$yslt ="SELECT * from category";
   $ycnm=mysqli_query($conn,$yslt);
   while ($yfetch= mysqli_fetch_array($ycnm)) {
      $yid=$yfetch['id'];
     $yname=$yfetch['cname'];
     
    
     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>               
      <td> <?php   echo $yname;    ?></td>
      
                 <td> 
<a href="editcategory.php?id=<?php echo $yid; ?>"> <input type="button" name="Edit" value="Edit" class="btn btn-success" style="width:85px;">  </a>
            </td>

                <td> 

 <a href="deletebtn.php?idc=<?php echo $yid; ?>"> <input type="button" name="delete" value="Delete" class="btn btn-danger">  </a>
            </td>

       </tr>
   <?php    
 }
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
        
        
  $rgt = "UPDATE category SET cname='$name' where id='$edit_id '";

        if (mysqli_query($conn,$rgt)) {
          echo  "<script>

      window.location.href='category.php'
      alert('Successfully Edit Your Data!');

</script>
   ";
        }            
    }

  
?>



	
	
	


