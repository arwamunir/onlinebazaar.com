 <?php include '../conn.php'; ?>  
  <?php

     if(isset($_GET['id'])){ 
    $edit_id  =$_GET['id'];
   $eslt ="SELECT * from slide where id='$edit_id'"; 

    $ecnm=mysqli_query($conn,$eslt);
    $xfetch= mysqli_fetch_array($ecnm);

     $pid=$xfetch['id'];
     $pic=$xfetch['pic'];
    

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
      
 <label style="font-size: 17px;">Select Slide Pic </label>       
  
     <input type="file" name="pic1"  class="form-control"  required="required" > <br>

 <img style='width: 80%; height: 50px;' src="upload/<?php echo $pic;?>">        
           <br> <br> <br>


     <a href="#" style="text-decoration:none;" > 
      <input type="submit" class="form-control" name="submit" value="Submit " style="background-color: green; color: white;">
    </a></form>
      <br> 
      </div>
        </div> 
   
  <div class="col-md-6" style="margin-top: 120px;" >
  <h4  style="text-align: center;font-size: 20px;"> Your Slide Detail</h4> <br> 
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >ID</th>
  
      <th >Pic</th>
        <th > Edit </th>
          <th >Delete </th>

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$fslt ="SELECT * from slide ";
   $fcnm=mysqli_query($conn,$fslt);
   while ($fetch= mysqli_fetch_array($fcnm)) {
      $pid=$fetch['id'];
     $ppic01=$fetch['pic'];


     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>               
   
  <td> <img style='width: 100%; height: 50px;' src="upload/<?php echo $ppic01;?>"></td>
       
                 <td> 
<a href="editslide.php?id=<?php echo $pid; ?>"> <input type="button" name="Edit" value="Edit" class="btn btn-success" style="width:85px;">  </a>
            </td>

                <td> 

 <a href="deletebtn.php?ids=<?php echo $pid; ?>"> <input type="button" name="delete" value="Delete" class="btn btn-danger">  </a>
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
  
      
        
 $picy= $_FILES["pic1"] ["name"];
    $tempname1 = $_FILES["pic1"]["tmp_name"];
  
     move_uploaded_file($tempname1,"upload/".$picy);   

   $rgt = "UPDATE slide SET pic='$picy'where id='$edit_id '";

        if (mysqli_query($conn,$rgt)) {
          echo  "<script>

      window.location.href='slide.php'
      alert('Successfully Upload Your Data!');

</script>
   ";
        }            
    }

  
?>


