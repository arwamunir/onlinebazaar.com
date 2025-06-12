<?php include '../conn.php'; ?> 

<?php

            
              if (isset($_GET['ids'])){
            $s= $_GET['ids'];

     $delete="DELETE FROM slide WHERE id = '$s'";
            $delet = mysqli_query($conn,$delete );

         if ($delet){
           echo "<script>
           alert('Data Deleted')
           </script>";
            echo "<script>
           window.open('slide.php' ,'_self')
           </script>";
}
else
{
    echo "Error!";
}
 }
     ?>



<?php

            
              if (isset($_GET['buyerdelete'])){
            $s= $_GET['buyerdelete'];

     $delete="DELETE FROM registration WHERE id = '$s'";
            $delet = mysqli_query($conn,$delete );

         if ($delet){
           echo "<script>
           alert('Data Deleted')
           </script>";
            echo "<script>
           window.open('buyer.php' ,'_self')
           </script>";
}
else
{
    echo "Error!";
}
 }
     ?>

<?php

            
              if (isset($_GET['buyerapprove'])){
            $e= $_GET['buyerapprove'];

 $accept="UPDATE registration SET status='Approved' WHERE id= '$e'";
     $approved = mysqli_query($conn,$accept);

            echo '<script type="text/javascript">';
            echo 'alert("Approved!");';
            echo 'window.location.href="buyer.php"';
            echo '</script>';
        }

 ?>     


<?php

            
              if (isset($_GET['sellerapprove'])){
            $e= $_GET['sellerapprove'];

 $accept="UPDATE seller SET status='Approved' WHERE id= '$e'";
     $approveds = mysqli_query($conn,$accept);

            echo '<script type="text/javascript">';
            echo 'alert("Approved!");';
            echo 'window.location.href="seller.php"';
            echo '</script>';
        }
?>
 
 <?php

            
              if (isset($_GET['sellerdelete'])){
            $e= $_GET['sellerdelete'];

     $delete="DELETE FROM seller WHERE id = '$e'";
            $delet = mysqli_query($conn,$delete );

         if ($delet){
           echo "<script>
           alert('Data Deleted')
           </script>";
            echo "<script>
           window.open('seller.php' ,'_self')
           </script>";
}
else
{
    echo "Error!";
}
 }
     ?>     
