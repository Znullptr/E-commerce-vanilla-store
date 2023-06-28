<?php
session_start();
include("connection.php");
include("functions.php");
require_once('./component.php');
$user_data=check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/myStyle4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Nouvil</title>
</head>
<body>
<header>
        <h2> <a href="#" class="logo" >vanilla</a></h2>
        <ul>
          <li> <a href="./index.php" >Home</a></li>
          <li><a href="./Product.php">Product</a></li>
          <li> <a href="./Shop.php" class="active">Shop</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </header>
      <section class="head">
        <div class="user">
       <h3> <a  id="user" href="#" class="fa fa-user " onclick="return opendiv()" > User </a></h3><br>
       <div id="myDiv" style="display:none;" class="profile">
       <div style="display:flex;color:white;">
       <img style="width: 120px;height: 120px;"src="./img/user-200.png" alt="">
       <div style="margin-left:10px;"><?php  echo $user_data['name'];echo " ";echo$user_data['surname'];?>
      <br>
      <i style="font-size:15px;margin-top:5px;"><?php echo $user_data['username'];?></i> <br>
      <br>
      <br>  
      
      </div>
      
       </div>
       <a  class="edit" href="#"><b >Edit <span class="fa fa-edit" ></span> </b></a>
       <div  class="logout"><a href="Logout.php">Log Out</a></div>
       </div>
        <div class="name" ><?php echo $user_data['name']; ?></div>
      </div>
      <div id="circle" class="circle"  > <?php echo $count=countProduct($con); ?> </div>
      <div id="cart" class="cart">
            <a href="./Cart.php" class="bi bi-cart icon"></a>
            <h4>Cart</h4>
      </div>
        <div class="search">
        <input id="search-item" type="text" name="search" style="background-image: url('./img/search.jpg');" placeholder="Search.." onkeyup="search()"><br>
       <a href="#" style="margin-left:15px;margin-top:7px;font-size:small;color:aqua;">Set your own theme</a>
      </div>
</section>
      <main>
      <menu id="menu">
        Categories
        <hr>
        <br>
        <a href="#" data-filter="All"  id="all" class="Active" >All</a> <br> <br>
        <a href="#" data-filter="Promoted"   id="promoted" >Promoted</a> <br> <br>
        <a href="#" data-filter="Deluxe" id="deluxe" >Deluxe</a><br> <br>
        <input type="hidden" id="categorie"  value="All">
        <br>
        <br>
        Filter by color
        <hr>
        <br>
        <select  id="colors" onchange="myFunction1()" ><option selected value="All Colors" >All Colors</option><option value="White" >White</option><option value="Black" >Black</option><option value="Red" >Red</option><option value="Blue" >Blue</option><option value="Green" >Green</option><option value="Yellow" >Yellow</option><option value="Gray" >Gray</option><option value="Gold" >Gold</option><option value="Silver" >Silver</option></select><br><br><br>
        Filter by template
        <input type="hidden" id="color"  value="All Colors">
        <hr>
        <br>
        <select id="templates" onchange="myFunction2()"><option  selected value="All Templates" >All Templates</option><option value="Shirts" >Shirts</option><option value="Jackets" >Jackets</option><option value="Pants" >Pants</option> <option value="Watch" >watch</option><option value="Hats" >hats</option><option value="Shoes" >shoes</option><option value="Jewelry" >jewelry</option></select><br><br><br>
        <input type="hidden" id="template"  value="All Templates">
        Sort by
       <hr>
       <br>
       <select id="sort"  ><option  selected value="Default" >Randomly Sorted</option> <option value="By Price" >By Price</option><option value="By Date" >By Date</option></select><br><br><br>


      </menu>
      <div class="slide-container">
        <div style="display:flex;">
      <div class="welcome">
      <strong style="font-size:30px;">Beautiful templates from
         your Vanilla store</strong>
      <br> <br>
vanilla store provides you with the latest luxuary products.you can accept credit cards,
manage your orders,deal with the best prices and more!
<br><br>
<div >Welcome</div>
 </div>
 <img style="height: 200px;width: 800px;margin-left: 10px;object-fit: cover;"src="./img/welcome.webp" alt="">
</div>
<br>
<h2 id="title">List Of Products</h2>
<br>
<section class="container" id="store-products">
   <?php 
   $result=getProductData($con);
   while($row=mysqli_fetch_assoc($result))
   { 
    $categorie="";
     $num=$row['NumTemp'];
     $query="SELECT LibTemp FROM Template WHERE NumTemp='$num'";
     $res=mysqli_query($con,$query);
     $ProdTemplate=mysqli_fetch_assoc($res);
     if($row['Rate']==5)
     {
       $categorie.=" Deluxe";
     }
     $discount=$row["CONCAT(FORMAT(Discount*100,0),'%')"];
     if((int)$discount>0)
     {
      
        $categorie.=" Promoted";
      
     }
     Shopcomponent($row['CodProd'],$row['ProdName'],$row['PrixU'],$row['ProdImg'],$row['ProdColor'],$categorie,$ProdTemplate['LibTemp'],$discount,$row['Rate']);

   } ?>
</section>

</div>
  </main>
    <script type="text/javascript" src="./Shop.js"></script>
</body>
</html>
   
