<?php
include("connection.php");
include("functions.php");
require_once('./component.php');
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{  
    //something is clicked
    $email=$_POST['email'];
    $password=$_POST['password'];


if (!empty($email) && !empty($password))
{  
$query="SELECT * FROM Client WHERE email='$email' limit 1";
$result=mysqli_query($con,$query);

  if($result && mysqli_num_rows($result) > 0)

   {
     $user_data=mysqli_fetch_assoc($result);
     $_SESSION['email']=$user_data['email'];
     $_SESSION['password']=$user_data['password'];
    
     if($user_data['password']===$password)
     {
       $_SESSION['username']=$user_data['username'];
       if(isset($_SESSION['cart'])){
       foreach ($_SESSION['cart'] as $key=>$value){
        $user=$_SESSION['username'];
        $query="SELECT * FROM Commande WHERE Username='$user' and State='Suspended' and CodProd='$key'";
        $res=mysqli_query($con,$query);
        $Qty=$value['Qty'];
if(mysqli_num_rows($res)>0)
{
  $query="UPDATE Commande SET QteCde=QteCde+'$Qty' WHERE CodProd='$key' and Username='$user' and State='Suspended'";
  mysqli_query($con,$query);
}
else{
       $id=random_num(10);
       $query="INSERT INTO `Commande` (`id`, `CodProd`, `Username`, `QteCde`, `date`) VALUES ('$id', '$key', '$user', '$Qty', current_timestamp())";
       mysqli_query($con,$query);

      }
    }}
       header("Location: Shop.php");
       die;
     }
     else{
      echo '<script type="text/javascript">',
      'show_error();',
      '</script>';
     }
     }
    else{
      echo '<script type="text/javascript" >',
      'show_error();',
      '</script>';
    }
    
    }
    else
    {
      echo '<script type="text/javascript" >',
      'show_error();',
      '</script>';
    }

    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvil</title>
    <link rel="stylesheet" type="text/css" href="./css/myStyle2.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script type="text/javascript" src="./Login.js"></script>
</head>
<body>
    <header>
        <h2> <a href="#" class="logo" >vanilla</a></h2>
        <ul>
          <li> <a href="./index.php" >Home</a></li>
          <li><a href="./Product.php">Product</a></li>
          <li> <a href="./Login.php" class="active">Shop</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </header>
      <form class="head" id="form_submit" method="post" action="Login.php">
        <div class="username">
          <h3>Email</h3> <br>
        <input id="email" name="email" type="email" placeholder="example@gmail.com">
      </div>
      <div class="password">
        <h3>Password</h3> <br>
        <input id="password" name="password" type="password" placeholder="Password" >
      </div>
      <div class="connect">
        <input id="login" type="button" value="connect">
      </div>
<div id="circle" class="circle"  > <?php echo $count=countProduct($con); ?> </div>
      <div id="cart" class="cart">
            <a href="./Cart.php" class="bi bi-cart icon"></a>
            <h4>Cart</h4>
      </div>
      <div class="search">
        <input id="search-item"  type="text" name="search" style="background-image: url('./img/search.jpg');" placeholder="Search.." onkeyup="Search()"><br>
       <a href="#" style="margin-left:15px;margin-top:7px;font-size:small;color:aqua;">Set your own theme</a>
      </div>
</form>
   <section class="main">
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
      <div class="signup">
      <strong style="font-size:30px;">Beautiful templates from
         your Vanilla store</strong>
      <br> <br>
vanilla store provides you with the latest luxuary products.you can accept credit cards,
manage your orders,deal with the best prices and more!
<br><br> <br>
<a href="./Signup.php">Sign up now</a>
 </div>
 <img style="height: 200px;width: 800px;margin-left: 10px;object-fit: cover;" src="./img/welcome.webp" alt="">
</div>
<br> <br>
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
     $discount=(int)$row["CONCAT(FORMAT(Discount*100,0),'%')"];
     if($discount>0)
     {
      
        $categorie.=" Promoted";
      
     }
     Shopcomponent($row['CodProd'],$row['ProdName'],$row['PrixU'],$row['ProdImg'],$row['ProdColor'],$categorie,$ProdTemplate['LibTemp'],$row["CONCAT(FORMAT(Discount*100,0),'%')"],$row['Rate']);

   } ?>


</section>

</div>
      </section>
</body>
</html>
