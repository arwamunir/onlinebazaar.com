 <?php include '../conn.php'; ?> 
 <div class="container-fluid">
    <div class="row">
  <div class="col-md-2">

  <?php include 'sidebar.php'; ?>
    

  </div>

  <div class="col-md-9">
 <br> <br> <br><br>
<div class="table-responsive">
<table class="table table-striped table-responsive" border="1">
  <thead>
    <tr>
      <th >ID</th>  
      <th >Invoice</th>    
        <th > User_ID </th>
          <th >Name</th>
      <th>Address</th>
      <th >Phone</th>
      <th >Product Name</th>
          <th >Quantity</th>
        <th > Total </th>
              <th >Status</th>
               <th >Action</th>
    </tr>
  </thead>
  <tbody>                                     
<?php

$i=0;
$slt ="SELECT * from orders";
   $cnm=mysqli_query($conn,$slt);
   while ($fetch= mysqli_fetch_array($cnm)) {

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
               
      <td> <?php   echo  $i;    ?></td>                   

       <td> <?php   echo $invoice;    ?></td>
            <td> <?php   echo $u_id;    ?></td>
        <td> <?php   echo $name;    ?></td>
         <td> <?php   echo $address;    ?></td>
      <td> <?php   echo $phone;    ?></td>
       <td> <?php   echo $proname;    ?></td>
        <td> <?php   echo $qty;    ?></td>
         <td> <?php   echo $total;    ?></td>
      
         
   <td> <?php   echo $status;    ?></td>
           <td>  
<a href="approveorderbtn.php?id5=<?php echo $o_id; ?>"> <input type="button" style="width: 85px;"  value="Dispatch" class="btn btn-success">  </a> <br>

<a href="cancelorderbtn.php?id5=<?php echo $o_id; ?>"> <input type="button" style="width: 85px;" value="Cancel" class="btn btn-primary">  </a> <br>

<a href="deliveredorderbtn.php?id5=<?php echo $o_id; ?>"> <input type="button"  value="Delivered" class="btn btn-warning">  </a>

                                    </td>

       </tr>
   <?php    }
   ?>
</tbody>
</table>
</div>
</div>
<div class="col-md-1"></div>
  </div>
</div>





