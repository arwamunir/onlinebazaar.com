  <?php include '../conn.php'; ?> 
  <div class="container-fluid">
    <div class="row">

  <div class="col-md-2">
  <?php include 'sidebar.php' ?>   
</div>

  <div class="col-md-4">

<div style="margin-top: 80px;background-color: rgba(236, 240, 241,0.9) ;">
           
          <br>

<h4  style="text-align: center;font-size: 20px;"> Please Add Your Product Detail</h4>
    
 <form method="POST" action=" " enctype="multipart/form-data">
		  
 <label style="font-size: 17px;">Name </label>       
  <input type="text" class="form-control" placeholder="Name"  name="name" required="required"> <br>

  <label style="font-size: 17px;">Category</label>
 

 <select name="category" class="form-control" >
  <option value=" " name="category"> Select a Category </option>
 <?php

   $slt = "SELECT * from category  ";
         $cnm=mysqli_query($conn,$slt);
     while ($fetch= mysqli_fetch_array($cnm)) {
                $c_id=$fetch['id'];
                $name=$fetch['cname'];

        echo "  <option value='$c_id'  >  $name </option>  "; 
      }
?>



 </select> <br>



  <label style="font-size: 17px;"> Manufacturer </label>

  <input type="text" class="form-control" placeholder="Manufacturer"  name="manufacturer" required="required">  <br>


<br>
<label style="font-size: 17px;"> Model </label>
<br>
    
<input type="text" class="form-control" placeholder="Model "  name="model" required="required">

         <br>

<label style="font-size: 17px;">Image </label>
          <input type="file" name="pic1"  class="form-control"  required="required" >
         
           <br>
 <label style="font-size: 17px;">Price</label>       
  <input type="text" class="form-control" placeholder="Price"  name="price" required="required"> <br>

		 <a href="#" style="text-decoration:none;" > 
      <input type="submit" class="form-control" name="submit" value="Submit " style="background-color: green; color: white;">
    </a></form>
		  <br> 
		  </div>
        </div> 
   
	<div class="col-md-6" style="margin-top: 120px;" >
  <h4  style="text-align: center;font-size: 20px;"> Your Product Detail</h4> <br> 
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >ID</th>
      <th>Name</th>
       <th>Category</th>
      <th>Manufacturer</th>
      <th >Model</th>
      <th >Pic</th>
      <th >Price</th>
        <th > Edit </th>
          <th >Delete </th>

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$fslt ="SELECT * from product ";
   $fcnm=mysqli_query($conn,$fslt);
   while ($fetch= mysqli_fetch_array($fcnm)) {
      $pid=$fetch['pid'];
     $pname=$fetch['name'];
     $ccategory=$fetch['category'];
         $pmanufature=$fetch['manufacture'];
    $pmodel=$fetch['model'];
     $ppic01=$fetch['pic01'];
$price=$fetch['price'];

 $slt1 ="SELECT * from category where id='$ccategory' ";

   $cnm1=mysqli_query($conn,$slt1);
   $cfetch= mysqli_fetch_array($cnm1);

    $pcategory =$cfetch['cname'];



     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>               
      <td> <?php   echo $pname;    ?></td>
       <td> <?php   echo $pcategory;    ?></td>
    <td> <?php   echo $pmanufature;    ?></td>
    <td> <?php   echo $pmodel;    ?></td>
  <td> <img style='width: 150%; height: 50px;' src="upload/<?php echo $ppic01;?>"></td>
    <td> <?php   echo $price;    ?></td>    
                 <td> 
<a href="editproduct.php?id=<?php echo $pid; ?>"> <input type="button" name="Edit" value="Edit" class="btn btn-success" style="width:85px;">  </a>
            </td>

                <td> 

 <a href="deletebtn.php?id=<?php echo $pid; ?>"> <input type="button" name="delete" value="Delete" class="btn btn-danger">  </a>
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
         $category= $_POST["category"];
          $model= $_POST["model"];
           $price= $_POST["price"];
        $manufature= $_POST["manufacturer"];
        
 $pic= $_FILES["pic1"] ["name"];
    $tempname1 = $_FILES["pic1"]["tmp_name"];
  
     move_uploaded_file($tempname1,"upload/".$pic);   

  $rgt = "INSERT INTO product(name,category,manufacture,model,pic01,price) VALUES ('$name','$category',' $manufature',' $model','$pic','$price')";

        if (mysqli_query($conn,$rgt)) {
          echo  "<script>

      window.location.href='product.php'
      alert('Successfully Upload Your Data!');

</script>
   ";
        }            
    }

  
?>



	
	
	


