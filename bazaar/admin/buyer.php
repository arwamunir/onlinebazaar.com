  <div class="container-fluid">
    <div class="row">

  <div class="col-md-2">
  <?php include 'sidebar.php' ?>   
</div>

 

  <div class="col-md-10" style="margin-top: 120px;" >
  <h4  style="text-align: center;font-size: 20px;"> Buyer Detail</h4> <br> 
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >ID</th>
 
       <th>Name</th>
         <th>Email</th>
           <th>Gender</th>
           <th>Status</th>      
          <th >Action </th>

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$fslt ="SELECT * from registration ";
   $fcnm=mysqli_query($conn,$fslt);
   while ($row= mysqli_fetch_array($fcnm)) {
       $id=$row['id'];  
      $name= $row['name'];
     
     $email = $row['email'];
      
     $gender = $row['gender'];
     $status = $row['status']; 
    
    
     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>      
    
      <td> <?php   echo $name;    ?></td>
      <td> <?php   echo $email;    ?></td>
 <td> <?php   echo $gender;    ?></td>
  <td> <?php   echo $status;    ?></td>
   
                <td> 

<a href="update.php?buyerapprove=<?php echo $id; ?>"> <input type="button" name="approved" value="Approve" class="btn btn-primary">  </a>

 <a href="update.php?buyerdelete=<?php echo $id; ?>"> <input type="button" name="delete" value="Delete" class="btn btn-danger">  </a>


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
  






  
  
  


