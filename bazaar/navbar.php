<?php include 'conn.php';  ?>

<?php
session_start();
?> <!-- session is used for storing information -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bazaar.com Online Shopping Mall</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Bootstrap CDN -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/8a2bdd4e42.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css" />

</head>
<style>
  
</style>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" id="navbartitle" href="index.php">Bazaar.com Online Shopping Mall</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>  
  <li class="nav-item">
  <a class="nav-link" href="product.php">Product</a>
      </li>  

  

<li class="nav-item">
      <?php

     if(!isset($_SESSION['bemail'])){
        
  echo"
 <a class='nav-link d' href='seller.php'>Seller Registration</a>
       
     ";

      } 
  ?>
      </li>
 <li class="nav-item">
  <a class="nav-link" href="cart.php">
    <i class="fa-solid fa-cart-shopping"></i>  Cart</a>
      </li>
     <li class="nav-item">
      <?php

     if(!isset($_SESSION['bemail'])){
        
  echo"
 <a class='nav-link d' href='registration.php'>Buyer Registration</a>

  <a class='nav-link d' href='login.php'style='text-decoration: none; '>
         Login</a>
       
     ";

     }else {
        echo"
<a class='nav-link d' href='myaccount.php'style='text-decoration: none;' >

         My Account</a>
        <a class='nav-link d' href='logout.php'style='text-decoration: none;' >
        
 <i class='fa-solid fa-right-to-bracket'></i> Logout</a>";
      } 
  ?>
      </li>


 

    

    </ul>

    <form class="form-inline my-2 my-lg-0" method="get" action="product.php" enctype="multipart/form-data"> 

      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" required>
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



</body>
</html>