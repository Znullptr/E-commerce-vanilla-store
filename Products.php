<?php
   include("connection.php");
   include("functions.php");
   session_start();
   ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvil</title>
    <link rel="stylesheet" type="text/css" href="./css/myStyle6.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="./sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="Products.js"></script>
    </head>
    <body>
    <iframe name="votar" style="display:none" ></iframe>
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

 <?php
   $id=$_GET['id'];
   $query1="SELECT CodProd,ProdName,Description,ProdColor,ProdImg,QteStock,OrgPrixU,PrixU,NumTemp,Rate,CONCAT(FORMAT(Discount*100,0),'%') FROM Product where CodProd='$id'";
   $res1=mysqli_query($con,$query1);
   $row1=mysqli_fetch_assoc($res1);
   $discount=$row1["CONCAT(FORMAT(Discount*100,0),'%')"];
   $num=$row1['NumTemp'];
   $query2="SELECT LibTemp FROM Template WHERE NumTemp='$num'";
   $res2=mysqli_query($con,$query2);
   $temp=mysqli_fetch_assoc($res2)['LibTemp'];
   if(!isset($_SESSION['username']))
   {
   if(isset($_SESSION['cart'][$id]))
   {
    $Qty=$_SESSION['cart'][$id]['Qty'];
    $total=$row1['PrixU']*$Qty;
   }
   else
   {
       $Qty="1";
       $total=$row1['PrixU'];
   }
   
   }
   else {
    $user=$_SESSION['username'];
    $query="SELECT QteCde FROM Commande WHERE Username='$user' and State='Suspended' and CodProd='$id'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
    $row=mysqli_fetch_assoc($result);
    $Qty=$row['QteCde'];
    $total=$row1['PrixU']*$Qty;
}
else
{
    $Qty="1";
    $total=$row1['PrixU'];
}


   }

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
        if(!isset($_SESSION['username']))
        {
            if(isset($_POST['add'])){
         $_SESSION['cart'][$id]['Qty']=$_POST['Qty'];
         $_SESSION['cart'][$id]['img']=$row1['ProdImg'];
         $_SESSION['cart'][$id]['name']=$row1['ProdName'];
         $_SESSION['cart'][$id]['temp']=$temp;
         $_SESSION['cart'][$id]['prix']=$row1['PrixU'];
        }
        elseif(isset($_POST['Qty'])){
            $_SESSION['cart'][$id]['Qty']=$_POST['Qty'];
        }
    }
        else{
        $user=$_SESSION['username'];
        if(isset($_POST['add'])){
        $key=random_num(10);
        $Qty=$_POST['Qty'];
        $query="INSERT INTO `Commande` (`id`, `CodProd`, `Username`, `QteCde`, `date`) VALUES ('$key', '$id', '$user', '$Qty', current_timestamp())";
        mysqli_query($con,$query);

        }
        elseif(isset($_POST['Qty'])){
            $Qty=$_POST['Qty'];
            $query="UPDATE `Commande` SET `QteCde` = '$Qty' WHERE Username='$user' and CodProd='$id' and State='Suspended'";
            mysqli_query($con,$query);
        }

    if(isset($_POST['btnPurchase']))
    {
    $key=random_num(10);
    $Qty=$_POST['Qty'];
    $sql="SELECT * FROM Commande WHERE Username='$user' and State='Suspended' and CodProd='$id'";
    $result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
   $query="UPDATE `Commande` SET `State` = 'Validated' WHERE Username='$user' and CodProd='$id' and State='Suspended'";
else
   $query="INSERT INTO `Commande` (`id`, `CodProd`, `Username`, `QteCde`, `date`, `State`) VALUES ('$key', '$id', '$user', '$Qty', current_timestamp(),'Validated')";
    mysqli_query($con,$query);

    echo
    '<script type="text/javascript">',
    "Swal.fire('Congratulation!',
        'Your purchase has been sucessfully submitted!',
        'success')",
        '</script>';
    }
}
   }
  ?>
<main>
    <div class="img-container">
<div style="text-align: center;" >
<img src=<?php echo $row1['ProdImg'] ?> alt="">
</div>
<h4 rate= <?php echo $row1['Rate'] ?>>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
  </h4>
  <br> <br>
  <b style="margin-left:10px;font-size:15x;color: gray;"> <?php echo $temp?></b>
   <div style='color:#8C001A; font-size:19px; margin-top:130px; float:right;'><?php echo "$".$row1['PrixU'] ?> </div> <br>
    </div>
    <div class="description-slider">
    <h1> <?php echo $row1['ProdName'] ?></h1>
    <br>
    <b style="font-size:18px;color: gray;"> Description:</b>
    <ul>
        <?php 
        
        $lines = explode("\n",$row1['Description']) ;
        foreach($lines as $line)
        {
            echo "<li> $line </li>";
        }

        ?>
    </ul>
    <b style="font-size:18px;color:gray;"> Details:</b> <br> <br>
    <div class="details">
    <div id="org">Last Price: <s style='color:#080303a6;'> <?php echo "$".$row1['OrgPrixU'] ?> </s>  </div>
    <div>Price: <b id="price" style="color:#8C001A"><?php echo "$".$row1['PrixU'] ?></b> </div>
    <div id="save">You Save: <b style="color:#8C001A"><?php echo "$".(number_format((float)($row1['OrgPrixU']-$row1['PrixU']), 2, '.', ""))?>( <?php echo $discount ?>)</b> </div>

    </div>
    </div>
    <div class="payment">
    <form  id="myForm" action="Products.php?id=<?php echo $id  ?>" method="post" target='votar' >
<div id="total" style='color:#8C001A; font-size:19px;'><?php echo "$".number_format($total, 2, '.', ""); ?></div> <br>
<div style="color:green ;font-size:19px; ">In Stock.</div> <br> <br>
<label class='quantity' > Qty: <input id="Qty" onchange='myFunction1(this)' name='Qty'  min='1' max='10' type='number' ></label>
<script>
Qty.value= <?php echo $Qty?>;  
</script>
<br> <br>
<input  class="add" name='add' type='button' onclick='myFunction2(this)' value='Add To Cart'>
<?php
if($row1['OrgPrixU']==$row1['PrixU'])
{
    echo
    '<script type="text/javascript">',
     'org.style.display="none";',
     'save.style.display="none";',
     '</script>';
}
if(!isset($_SESSION['username']))
{
   if(isset($_SESSION['cart'][$id])  )
   {
    echo
    '<script type="text/javascript">',
     'changeToCartlogo();',
     '</script>';
   }
}
else{
    $user=$_SESSION['username'];
    $query="SELECT QteCde FROM Commande WHERE Username='$user' and State='Suspended' and CodProd='$id'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        echo
        '<script type="text/javascript">',
         'changeToCartlogo();',
         '</script>';
    }



}
 
   ?>
<br> <br>
<?php
if(!isset($_SESSION["username"]))
echo ("<input class='purchase' name='purchase' onclick='login_alert()' type='button' value='Buy Now'>");
else
echo ("<input class='purchase' name='btnPurchase'  onclick='success_alert()'type='submit' value='Buy Now'>");
?>
</form>
</div>
</main>
</body>
</html>