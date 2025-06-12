 <?php include '../conn.php'; ?>  
  <?php

     if(isset($_GET['id'])){ 
    $edit_id  =$_GET['id'];
   $eslt ="SELECT * from product where pid='$edit_id'"; 

    $ecnm=mysqli_query($conn,$eslt);
    $xfetch= mysqli_fetch_array($ecnm);

     $pid=$xfetch['pid'];
     $pname=$xfetch['name'];
     $ccategory=$xfetch['category'];
      $pmanufature=$xfetch['manufacture'];
    $model=$xfetch['model'];
     $pprice=$xfetch['price'];
     $ppic01=$xfetch['pic01'];

 $slt1 ="SELECT * from category where id='$ccategory' ";

   $cnm1=mysqli_query($conn,$slt1);
   $cfetch= mysqli_fetch_array($cnm1);

    $pcategory =$cfetch['cname'];
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

<h4  style="text-align: center;font-size: 20px;"> Please Add Your Product Detail</h4>
    
 <form method="POST" action=" " enctype="multipart/form-data">
      
 <label style="font-size: 17px;">Name </label>       
  <input type="text" value="<?php echo $pname; ?>" class="form-control" placeholder="Name"  name="name" required="required"> <br>

  <label style="font-size: 17px;">Category</label>
 

 <select name="category" class="form-control" >
  <option value=" " name="category"> 
    <?php echo $pcategory;  ?> </option>
 <?php

   $slt = "SELECT * from category  ";
         $cnm=mysqli_query($conn,$slt);
     while ($yfetch= mysqli_fetch_array($cnm)) {
                $c_id=$yfetch['id'];
                $yname=$yfetch['cname'];

        echo "  <option value='$c_id'  >  $yname </option>  "; 
      }
?>



 </select> <br>



  <label style="font-size: 17px;"> Manufacturer </label>

  <input type="text" value="<?php echo $pmanufature; ?>" class="form-control" placeholder="Manufacturer"  name="manufacturer" required="required">  <br>


<br>
<label style="font-size: 17px;"> Model </label>
<br>
    
<input type="text" value="<?php echo $model; ?>" class="form-control"   name="model" required="required">

         <br>

<label style="font-size: 17px;">Image </label>
     <input type="file" name="pic1"  class="form-control"  required="required" > <br>

 <img style='width: 80%; height: 50px;' src="../admin/upload/<?php echo $ppic01;?>">        
           <br>  
<label style="font-size: 17px;">Price</label>       
  <input type="text" value="<?php echo $pprice; ?>" class="form-control" placeholder="Price"  name="price" required="required"> <br>


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
  <td> <img style='width: 100%; height: 50px;' src="../admin/upload/<?php echo $ppic01;?>"></td>
   <td> <?php   echo $price    ?></td>    
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
          $uprice= $_POST["price"];
        $manufature= $_POST["manufacturer"];
        
 $pic= $_FILES["pic1"] ["name"];
    $tempname1 = $_FILES["pic1"]["tmp_name"];
  
     move_uploaded_file($tempname1,"../admin/upload/".$pic);   

   $rgt = "UPDATE product SET name='$name',category='$category',model='$model',
   price='$uprice',manufacture='$manufature',pic01='$pic' where pid='$edit_id '";

        if (mysqli_query($conn,$rgt)) {
          echo  "<script>

      window.location.href='product.php'
      alert('Successfully Upload Your Data!');

</script>
   ";
        }            
    }

  
?>


