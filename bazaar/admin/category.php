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
  <input type="text" class="form-control" placeholder="Name"  name="name" required="required">
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
$fslt ="SELECT * from category";
   $fcnm=mysqli_query($conn,$fslt);
   while ($fetch= mysqli_fetch_array($fcnm)) {
      $cid=$fetch['id'];
     $cname=$fetch['cname'];
    
     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>               
      <td> <?php   echo $cname;    ?></td>
     
                 <td> 
<a href="editcategory.php?id=<?php echo $cid; ?>"> <input type="button" name="Edit" value="Edit" class="btn btn-success" style="width:85px;">  </a>
            </td>

                <td> 

 <a href="deletebtn.php?idc=<?php echo $cid; ?>"> <input type="button" name="delete" value="Delete" class="btn btn-danger">  </a>
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
       
    /*insert data in database*/    
  $rgt = "INSERT INTO category (cname) VALUES ('$name')";

        if (mysqli_query($conn,$rgt)) {
          echo  "<script>

      window.location.href='category.php'
      alert('Successfully Upload Your Data!');

</script>
   ";
        }            
    }

  
?>



	
	
	


