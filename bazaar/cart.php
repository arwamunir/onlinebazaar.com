<?php include 'navbar.php';  ?>

<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-8">
<br>
<br>

<table class="table table-striped" border="1">
  <thead  align="center">
    <tr>
      <th >Remove</th>
        <th >Image</th>
       <th >Product Name</th>
       <th >Manufacture</th>
      <th >Quantity</th>

       <th >Price</th>

    </tr>
  </thead>
  <tbody  align="center">                                     
<?php

if (isset($_SESSION['bid'])) {

$user_id= $_SESSION['bid'];
/*getting the detail from cart*/
$slt ="SELECT * from cart WHERE user_id ='$user_id'";
   
$result = $conn->query($slt);

// Initialize the grand total
$grandTotal = 0;
// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        // Multiply price and quantity for each row and add to the grand total

     $pro_id=$row['p_id'];
     $qty2 =$row['qty'];
     $cart_id =$row['c_id'];
/*getting the product according to cart*/

 $slt1 ="SELECT * from product where pid='$pro_id' ";
   $cnm1=mysqli_query($conn,$slt1);
   $cfetch= mysqli_fetch_array($cnm1);
    $name=$cfetch['name'];
     $manufacture=$cfetch['manufacture'];
      $model=$cfetch['model'];  
      $pic=$cfetch['pic01'];
      $price=$cfetch['price'];

 $grandTotal += $cfetch["price"] * $row["qty"];
    
?>

                    
            <tr> 
               
 <td> 

   <a href='cart.php?remove=<?php echo $cart_id; ?>'>
<i style="font-size: 24px;" class="fa-solid fa-trash"></i> </a>

</td>  

   <td> <img style='width: 50%; height: 50px;' data-src="admin/upload/<?php echo $pic;?>" alt="Image" src="admin/upload/<?php echo $pic;?>"></td> 

       
        <td> <?php   echo $name;    ?></td>
        <td> <?php   echo $manufacture;    ?></td>

 <td> 
<form method="POST" action="" >
  <?php   echo $qty2;    ?>
  <input type="number" min="1" max="10" name="qty"   >

  <input type="hidden" name="product_id" value="<?php echo $cart_id; ?>">

<input type="submit"  name="update" value="Update" />

</form>
        
          </td>
        <td> <?php   echo $price;    ?></td>
  
   

       </tr>
   <?php    }}
   ?>
</tbody>

</table>

 <b> Grand Total:</b> Rs. <?php echo $grandTotal;  ?>

 <br>

<center> 

 <a href="index.php"><input type="button" class="btn btn-success" name="" value="Continue Shopping"></a>

   <a href="checkout.php"><input type="button" class="btn btn-primary" name="" value="Checkout"></a>

</center>
    


   
			</div>
              <div class="col-md-2"> </div>
	
	</div>
		</div>
	
<?php include 'footer.php'; ?>

<?php
if(isset($_GET['remove'])){
 $getcart_id=$_GET['remove'];
 

 $del= "DELETE FROM cart WHERE c_id='$getcart_id' ";
$delete = mysqli_query($conn,$del);

 if ($delete){
           echo "<script>
           alert('Successfully Remove from Cart')
           </script>";
            echo "<script>
           window.open('cart.php' ,'_self')
           </script>";
}
else
{
    echo "Error!";
}

}
  ?>



<?php

if(isset($_POST['update'])){
 $getqty_id=$_POST['qty'];
 $getp_id=$_POST['product_id'];
 

 $qtyupdate="UPDATE cart SET qty='$getqty_id' WHERE c_id='$getp_id'";

$checkqtyupdate = mysqli_query($conn,$qtyupdate);

 if ($checkqtyupdate){
           echo "<script>
           alert('Successfully Updated Quantity from Cart')
           </script>";
            echo "<script>
           window.open('cart.php' ,'_self')
           </script>";
}




}

}
  ?>