<?php include '../conn.php'; ?> 

<?php

            
              if (isset($_GET['aid'])){
            $ae= $_GET['aid'];

            $delete="DELETE FROM admin_login WHERE id = '$ae'";
            $delet = mysqli_query($conn,$delete );

         if ($delet){
           echo "<script>
           alert('Data Deleted')
           </script>";
            echo "<script>
           window.open('admin.php' ,'_self')
           </script>";
}
else
{
    echo "Error!";
}
 }
     ?>