<?php include 'navbar.php';  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
   
 
  img{
    width: 200px;
  height: 450px;
   
  }
 </style>




</head>
<body>

<div class="container-fluid">	
  <div class="row">

<div class="col-md-2">
  <br>
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >Categories</th>
 
       
          

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$fslt ="SELECT * from category ";
   $fcnm=mysqli_query($conn,$fslt);
   while ($row= mysqli_fetch_array($fcnm)) {
       $id=$row['id'];  
      $cname= $row['cname'];
     $i++;
?>                    
            <tr> 
               
      <td> <a href="catergory.php?catergory=<?php echo $id; ?>">
         <?php   echo  $cname;    ?>

      </a>

       </td>      
    
   
  
   
    

       </tr>
   <?php    }
   ?>
</tbody>
</table>
  </div>


</div>
<div class="col-md-10">
<?php
$get_slides = "SELECT * from slide";  
 $run_slides = mysqli_query($conn,$get_slides);
 while($row_slides=mysqli_fetch_array($run_slides)){
 $image[] = $row_slides['pic']; 
}
// die(print_r($image));
?>
<div class="col-md-12">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  data-src="admin/upload/<?php echo $image[0];?>" alt="First slide" src="admin/upload/<?php echo $image[0];?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img  data-src="admin/upload/<?php echo $image[1];?>" alt="First slide" src="admin/upload/<?php echo $image[1];?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img  data-src="admin/upload/<?php echo $image[2];?>" alt="First slide" src="admin/upload/<?php echo $image[2];?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<br>
<br>

    
   </div> <!-- closing col md 12-->

</div> <!-- row -->


</div> <!-- row -->

</div> <!-- container fluid -->


	<div class="name"> <center> New Arrival!</center></div>
     
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">    

<?php
$fslt ="SELECT * from product ";
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
  
      <?php    }
   ?>
  
  </div>
</div>
</div>

    <?php include'footer.php' ?>




</body>
</html>

