<?php   include 'navbar.php' ?>
<?php
if (!isset($_SESSION['bemail'])) {         // condition Check: if session is not set. 
  header('location: index.php');   // if not set the user is sendback to login page.
}
?>

<style >
    .order{
  border-style: solid;
  border-color: black;
  background-color:blue;
  color: black;
font-style: italic;
  padding: 7px;
 font-size: 18px;
  font-weight: bold;
  width: 100%;
  margin: 15px 0px 25px 0px;
}

.account{
 
  padding: 7px;
 font-size: 18px;
  font-weight: bold;
  color: blue;
}

</style>

<div class="container-fluid">
  <div class="row">

 <br><br>
 <label class="account"> Your Account Detail  </label>      
 <table class="table table-stripped">
  <tr>

<!-- <th>Name</th> -->
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Password</th>
</tr>
  <tr>

<td><?PHP echo $_SESSION['bname'] ?></td>
<td><?PHP echo $_SESSION['bemail']?></td>
<td><?PHP echo $_SESSION['bgender']?></td>
<td><?PHP echo $_SESSION['bpassword']?></td>
<td></td>
</tr>
 </table>



<div class="order"> <center> Your Orders </center></div> <BR>


<div class="col-md-12">
  <!-- frontend start here -->

<table class="table text-center" border="2" >

  <thead >
    <tr>
     <th class="text-center">ID </th>
<th class="text-center">Invoice Number</th>
<th class="text-center">Product Name</th>
<th class="text-center">Quantity</th>
<th class="text-center">Total Amount</th>
<th class="text-center">Order Status</th>


    </tr>
  </thead>
  <tbody>    


    <?php 
$user_id =$_SESSION['bid'];
$i=0;
  
    $total = 0;
   
$cstorder= "SELECT * from orders where u_id='$user_id'";

    $run_price = mysqli_query($conn,$cstorder);
        
        while($fetch = mysqli_fetch_array($run_price)){
            
        $o_id=$fetch['o_id'];
     $u_id=$fetch['u_id'];
    $invoice=$fetch['invoice'];
     $name=$fetch['name'];
     $address=$fetch['address'];
       $phone=$fetch['phone'];
       $p2_id=$fetch['p_id'];
       $qty=$fetch['qty'];
       $total=$fetch['total'];
       
         $status=$fetch['status'];
       

 $slt4 ="SELECT * from product WHERE pid='$p2_id' "; 
   $cnm4=mysqli_query($conn,$slt4);
   $cfetch4= mysqli_fetch_array($cnm4);
     $proname =$cfetch4['name'];
    

     $i++;
?>


                <tr> 
        <td> <?php   echo  $i;    ?> </td>
<td><?PHP echo  $invoice; ?></td>
<td><?PHP echo $proname;  ?></td>
<td><?PHP echo  $qty; ?></td>
<td>  <?PHP  echo  $total;  ?></td>
<td> <?PHP echo $status; ?> </td>


 
       </tr> 

   <?php    }
   ?>

</tbody>
</table>  

</div>

</div>


</div>

<?php include'footer.php' ?>

