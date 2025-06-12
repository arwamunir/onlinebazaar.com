  <div class="container-fluid">
    <div class="row">

  <div class="col-md-2">
  <?php include 'sidebar.php' ?>   
</div>

 

  <div class="col-md-10" style="margin-top: 120px;" >
  <h4  style="text-align: center;font-size: 20px;"> Complaints / Feedback</h4> <br> 
<div class="table-responsive">
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th >ID</th>
 
       <th>Name</th>
         <th>Email</th>
           <th>Feedback</th>
          

    </tr>
  </thead>
  <tbody>                                     
<?php
$i=0;
$fslt ="SELECT * from feedback ";
   $fcnm=mysqli_query($conn,$fslt);
   while ($row= mysqli_fetch_array($fcnm)) {
       $id=$row['f_id'];  
      $name= $row['name'];
     
     $email = $row['email'];
      
     $feedback = $row['feedback'];
    
    
    
     $i++;
?>                    
            <tr> 
               
      <td> <?php   echo  $i;    ?></td>      
    
      <td> <?php   echo $name;    ?></td>
      <td> <?php   echo $email;    ?></td>
 <td> <?php   echo $feedback;    ?></td>
  
   
    

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
  






  
  
  


