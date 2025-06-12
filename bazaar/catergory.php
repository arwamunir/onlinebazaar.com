<?php include 'navbar.php';  ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
<!-- Search -->
<?php  
if(isset($_GET['catergory'])){ 
 $name=$_GET['catergory'];

$fslt ="SELECT * from product where category='$name' ";
   $fcnm=mysqli_query($conn,$fslt);
   while ($fetch= mysqli_fetch_array($fcnm)) {
      $pid=$fetch['pid'];
     $pname=$fetch['name'];
     $ccategory=$fetch['category'];
      $pmanufature=$fetch['manufacture'];
    $pmodel=$fetch['model'];
     $pic01=$fetch['pic01'];
      $price=$fetch['price'];

 $slt1 ="SELECT * from category where id='$ccategory' ";

   $cnm1=mysqli_query($conn,$slt1);
   $cfetch= mysqli_fetch_array($cnm1);

    $pcategory =$cfetch['cname'];
  
         ?>
<div class="column" style="margin-top:40px;">

 <div class="card">
   <img style='width: 100%; height:150px;' src="admin/upload/<?php echo $pic01;?>">
 <center>
<h3 class="title"> <?php echo  $pname; ?> </h3>
        <p><b>Category: </b>   <?php echo $pcategory; ?> </p>
          <p><b>Model: </b><?php echo $pmodel; ?>  </p>
<p><b>Manufature:</b><?php echo $pmanufature;?>  </p>
  <p><b>Price:</b><?php echo $price;?>  </p>    
          </center>
  <a href='cart2.php?id7=<?php echo $pid; ?>'>
   <p> <button class="button">Add to Cart!</button> </a></p>  <br>
      </div>      
    </div>
   
      <?php    }}
   ?>
  
   
</div>
   </div>
</div>

<?php include 'footer.php';   ?>