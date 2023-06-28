<?php
session_start();
include("connection.php");
include("functions.php");
require_once('./component.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/myStyle5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="./sweetalert2.all.min.js"></script>
   <script type="text/javascript" src="./Cart.js"></script>
  </head>
<iframe name="votar" style="display:none" ></iframe>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if(isset($_SESSION['username']))
  
    $user=$_SESSION['username'];

  if($_GET['action']=='cart')
  {
    $id=$_GET['id'];
    $key=$_GET['prodid'];

  if (isset($_POST["btnDelete"])) 
   {
     if($user)
     {
    $query1="DELETE FROM Commande WHERE id='$id'";
    print_r($id);
    mysqli_query($con,$query1);
    $query2="SELECT * FROM `Commande` WHERE Username='$user' and State='Suspended'";
    $res=mysqli_query($con,$query2);
     }
     else
     {
       unset($_SESSION['cart'][$key]);
      }
  }
else
   {
     if(isset($_POST["btnChange"]))
      {
        $Qty=$_POST['btnChange'];
        if($user)
     {
        $query="UPDATE Commande SET QteCde='$Qty' WHERE id='$id'";
        mysqli_query($con,$query);
     }
     else{
      $_SESSION['cart'][$key]['Qty']=$Qty;
     }
      }
    }
  }
    elseif($_GET['action']=='payment')
    {
    if(isset($_POST['btnPurchase']))
      {
        $query="UPDATE `Commande` SET `State` = 'Validated' WHERE Username='$user' and State='Suspended'";
        mysqli_query($con,$query);
        echo
        '<script type="text/javascript">',
        "Swal.fire('Congratulation!',
            'Your purchase has been sucessfully submitted!',
            'success')",
            '</script>';
      }
    }
}?>
<body>
    <header>
        <h2> <a href="#" class="logo" >vanilla</a></h2>
        <ul>
          <li> <a href="./index.php" >Home</a></li>
          <li><a href="./Product.php" >Product</a></li>
          <li> <a href="./Shop.php" class="active">Shop</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">About</a></li>
        </ul>
            </header> 
    <main>
      <div class="container">

<h2>Shopping Cart</h2>
<br>
<small>Price</small>
<hr>
<ul> 
  <?php 
   $total=0;
   $count=0;
  if(!isset($_SESSION['username']))
   {
     if(!isset($_SESSION['cart']) or sizeof($_SESSION['cart'])==0 )
     {
      echo "<h2 style='width:100%;height:150px; text-align:center;margin-top:50px;'> There are no products in the cart </h2> ";      
     }  
    else
    {      
    foreach ($_SESSION['cart'] as $key=>$value){
     
      Cartcomponent(null,$key,$value['name'],$value['prix'],$value['img'],$value['temp'],$value['Qty']);
      $total+=$value['prix']*$value['Qty'];
      $count+=$value['Qty'];
      

    }
    }
  }

  else
  {
  $user=$_SESSION['username'];
  $query="SELECT * FROM Commande WHERE Username='$user' and State='Suspended' ";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0)
  {
   while($row=mysqli_fetch_assoc($result)){
      $Qty=$row['QteCde'];
      $id=$row['id'];
      $CodProd=$row['CodProd'];
      $query1="SELECT * FROM Product WHERE CodProd='$CodProd'";
      $res1=mysqli_query($con,$query1);
      $row1=mysqli_fetch_assoc($res1);
      $num=$row1['NumTemp'];
      $query2="SELECT LibTemp FROM Template WHERE NumTemp='$num'";
      $res2=mysqli_query($con,$query2);
      $row2=mysqli_fetch_assoc($res2);
      $total+=$row1['PrixU']*$Qty;
      $count+=$Qty;
      Cartcomponent($id, $CodProd,$row1['ProdName'],$row1['PrixU'],$row1['ProdImg'],$row2['LibTemp'],$Qty);
    }
    }
    else{
    echo "<h2 style='width:100%;height:150px; text-align:center;margin-top:50px;'> There are no products in the cart </h2> ";      
    }
  }

?>
</ul>
</div>
<form action="Cart.php?action=payment" method="post">
<div class="payment">
  <div  class="subtotal">Subtotal(<span id="items" style="margin-left:0px;"><?php echo $count; ?> </span>items): <span id="total" style="font-size:17px; font-weight:bold;" id="total">
   <?php echo '$'.number_format($total, 2, '.', "");?>
       </span></div>
       <label for="gift"></label><input type="checkbox"> <span style="font-size: 14px;">This order contains a gift</span> <br> <br>
       <?php
if(!isset($_SESSION["username"]))
echo ("<input class='purchase' name='purchase' onclick='login_alert()' type='button' value='Buy Now'>");
else
echo ("<input class='purchase' name='btnPurchase' type='submit' value='Buy Now'>");
?>
</div>
</form>

      </main>
</body>
</html>