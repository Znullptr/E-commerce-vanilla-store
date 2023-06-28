<?php
require_once('./component.php');
include("connection.php");
include("functions.php");
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvil</title>
    <link rel="stylesheet" type="text/css" href="./css/myStyle1.css">
    <script src="./sweetalert2.all.min.js"></script>
    <script src="./product.js"> </script> 
</head>
<iframe name="votar" style="display:none"></ ></iframe>
<body>
    <header>
        <h2> <a href="#" class="logo" >vanilla</a></h2>
        <ul>
          <li> <a href="./index.php" >Home</a></li>
          <li><a href="./Product.php" class="active">Product</a></li>
          <li> <a href="./Shop.php">Shop</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">About</a></li>
        </ul>
      
      </header> 
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{ 
  $user=$_SESSION['username'];
  $prodid=$_GET['id'];
  if(isset ($_SESSION['username']))
{ 
  if(isset($_POST['add'])){
  $id=random_num(10);
  $Qty=$_POST['Qty'];
  $query="INSERT INTO `Commande` (`id`, `CodProd`, `Username`, `QteCde`, `date`) VALUES ('$id', '$prodid', '$user', '$Qty', current_timestamp())";
  mysqli_query($con,$query);
  }
  elseif(isset($_POST['Qty'])){
    $Qty=$_POST['Qty'];
    $query="UPDATE `Commande` SET `QteCde` = '$Qty' WHERE Username='$user' and CodProd='$prodid' and State='Suspended'";
    mysqli_query($con,$query);}
}

else{

         $prodid=$_GET['id'];
         if(isset($_POST['add'])){
         $query1="SELECT * FROM Product WHERE CodProd='$prodid'";
         $res1=mysqli_query($con,$query1);
         $row=mysqli_fetch_assoc($res1);
         $num=$row['NumTemp'];
         $query2="SELECT LibTemp FROM Template WHERE NumTemp='$num'";
         $res2=mysqli_query($con,$query2);
         $temp=mysqli_fetch_assoc($res2)['LibTemp'];
         $_SESSION['cart'][$prodid]['Qty']=$_POST['Qty'];
         $_SESSION['cart'][$prodid]['img']=$row['ProdImg'];
         $_SESSION['cart'][$prodid]['name']=$row['ProdName'];
         $_SESSION['cart'][$prodid]['temp']=$temp;
         $_SESSION['cart'][$prodid]['prix']=$row['PrixU'];
         }
         elseif(isset($_POST['Qty'])){
          $_SESSION['cart'][$prodid]['Qty']=$_POST['Qty'];
      }
  }
}
 
?>

      
      <h2 > <div> Top List : </div> </h2>  
     
    
    <br>
      <main style="display:flex;">
         <div  class="item-div" id="box">
     <?php     
    $result=getData($con);
    while($row=mysqli_fetch_assoc($result))
    {
      if($row['OrgPrixU']===$row['PrixU'])
           $row['OrgPrixU']="";
          else
          $row['OrgPrixU']="$".$row['OrgPrixU'];
       
      Productcomponent($row['CodProd'],$row['ProdName'],$row['OrgPrixU'],$row['PrixU'],$row['ProdColor'],$row['ProdImg']);
    }

    if(!isset ($_SESSION['username']))
    {   
     if(isset ($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $key=>$value){
       $Qty=$value['Qty'];
        echo
      '<script type="text/javascript">',
      "myFunction('$key','$Qty');",
       '</script>';
      }}
    
     }
     else
     {

      $user=$_SESSION['username'];
      $query="SELECT CodProd,QteCde FROM Commande WHERE Username='$user' and State='Suspended'";
      $result=mysqli_query($con,$query);
      while($row=mysqli_fetch_assoc($result))
      {
      $prodid=$row['CodProd'];
      $Qty=$row['QteCde'];
      echo
      '<script type="text/javascript">',
      "myFunction('$prodid','$Qty');",
       '</script>';}
    
      }
     
      
   
    ?>
         
    </div>
         <img src="./img/leftarrow.webp" class="left"  id="left" alt="">
         <img src="./img/leftarrow.webp" class="right" id="right" alt="">
          
         </main>
         
          <footer class="end">  </footer>


</body>
</html>