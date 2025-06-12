<?php include 'navbar.php'; ?>
<?php
if (!isset($_SESSION['bemail'])) {         // condition Check: if session is not set. 
header('location: index.php');   // if not set the user is sendback to login page.
}
?>




<div class="container-fluid">
<div class="row">
<div class="col-md-1"> </div>
<div class="col-md-5">
<br>
<br>

<table class="table table-striped" border="1">
<thead  align="center">
<tr>

<th >Image</th>
<th >Product Name</th>
<th >Manufacture</th>
<th >Quantity</th>

<th >Price</th>
<th>Discount 5%</th>
</tr>
</thead>
<tbody  align="center">                                     
<?php

$user_id= $_SESSION['bid'];
//getting the detail from cart//
$slt ="SELECT * from cart WHERE user_id ='$user_id'";

$result = $conn->query($slt);

// Initialize the grand total
$grandTotal = 0;
// Check if there are rows in the result set
if ($result->num_rows > 0) {
// Loop through each row
while ($row = $result->fetch_assoc()) {
// Multiply price and quantity for each row and add to the grand total
$product_id=$row['p_id'];
$qty2 =$row['qty'];
$cart_id =$row['c_id'];
//getting the product according to cart//
$slt1 ="SELECT * from product where pid='$product_id' ";
$cnm1=mysqli_query($conn,$slt1);
$cfetch= mysqli_fetch_array($cnm1);
$name=$cfetch['name'];
$manufacture=$cfetch['manufacture'];
$model=$cfetch['model'];  
$pic=$cfetch['pic01'];
$price=$cfetch['price'];


$subtotal = $cfetch["price"] * $row["qty"]; 
$discount= $subtotal * '95'/'100' ; 

$grandTotal += $discount  ;




if (isset($_POST['submit'])) {
$invoice_no=mt_rand();
$user_id= $_SESSION['bid'];
$name= $_POST["name"];
$address= $_POST["address"];
$number= $_POST["number"]; 
$status='Pending';

// Get all the submitted data from the form  
$insert_order="INSERT INTO orders(u_id, invoice, name, address, phone, p_id, qty, total, status) VALUES ('$user_id','$invoice_no','$name',' $address','$number','  $product_id','$qty2','$discount','$status')";

$run_order= mysqli_query($conn,$insert_order);

$empty="delete from cart where user_id='$user_id'" ;

$email=$_SESSION['bemail'];

/* sending mail to user email*/
$url = "https://script.google.com/macros/s/AKfycbxB6nc52pntuaqswXkRFLt5Fc0LVLuH1IggjhIdZXkoTGr6xS37rMw62qCJ2ZXSo3ed_Q/exec";
$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_POSTFIELDS => http_build_query([
        "recipient" => $email,
        "subject"   => 'Order Confirmation. ',
        "body"      => "Your Order is Confirmed!",
    ])
]);
$result = curl_exec($ch);

if (curl_errno($ch)) {
    // Display the cURL error
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Check if the result contains a specific success message
    if ($result) {
        echo 'Mail sent successfully';
    } else {
        echo 'Failed to send mail';
    }
}

curl_close($ch);

//Mail code end here//  




if (mysqli_query($conn,$empty)) {
echo  "<script>

window.location.href='index.php'
alert('Successfully Place Your Order');

</script>
";

} }




?>


<tr> 



<td> <img style='width: 50%; height: 50px;' data-src="admin/upload/<?php echo $pic;?>" alt="Image" src="admin/upload/<?php echo $pic;?>"></td> 


<td> <?php   echo $name;    ?></td>
<td> <?php   echo $manufacture    ?></td>

<td>  <?php   echo $qty2;    ?>   </td>
<td> <?php   echo $price;    ?></td>

<td> <?php   echo $discount;    ?></td> 

</tr>
<?php    }}
?>
</tbody>

</table>

<b> Grand Total:</b> Rs. <?php echo $grandTotal;  ?>

<br>
</div>


<div class="col-md-5"> 
<br>
<br>

<div style="background-color: rgba(236, 240, 241,0.4)
;">


<h3 style="text-align: center;color: black;">Enter Your Detail To Proceed Order</h3>

<form method="POST" action=" " enctype="multipart/form-data">

<div class="row">
<div class="col-md-12">

<label style="font-size: 17px;"> Name </label>

<input type="text" class="form-control" placeholder="Name "  name="name" required="required">

<label style="font-size: 17px;"> Address</label>
<textarea class="form-control" name="address" required> 
</textarea>    
<label style="font-size: 17px;">Phone Number</label>

<input type="text" name="number" min="11" maxlength="13" class="form-control" placeholder="Phone Number" required="required">

<label style="font-size: 17px;">Payment Method </label>
<center>  




<label style="font-size: 17px;"> Cash on Delivery </label>    </center>


<a href="#" style="text-decoration:none;" > <input type="submit" class="form-control" name="submit" value="Submit" style="background-color: black; color: white;"></a>

</div>


<br>
</div> </div>
</form>  



</div>
</div>

<div class="col-md-1"> </div>

</div>
</div>

<?php include 'footer.php'; ?>