<?php

function Productcomponent($productid,$productname,$originalproduct,$productprice,$productcolor,$productimg){

    $element="   
    <form method='post' action='Product.php?id=$productid' target='votar'>   
    <div id='$productid' class='element'>
    <img src='$productimg' alt=''> 
    <a id='product-name' href='Products.php?id=$productid'> $productname </a><br>
    <br>
    <h4 id='price'>  <small style='color:#080303a6;'> <s> $originalproduct</s> </small> <span>&dollar;$productprice</span></h4> <br>
    <label class='product-color' for='color'>$productcolor</label><br>
    <br>
   <label class='quantity' > Qty: <input name='Qty' onchange='myFunction2(this)' value='1' min='1' max='10' type='number' ></label>
     <input  name='add'  class='click'  type='button' onclick='myFunction1(this)' value='ADD TO CART'></div>
     </form> ";   
 echo $element;

}

function Shopcomponent($productid,$productname,$productprice,$productimg,$productcolor,$categorie,$template,$discount,$Rate)

{
  $element=" 
  <div class='product $template $categorie $productcolor' style='display:block' data-price='' rate='$Rate'>
  <img src='$productimg' alt=''>
  <p><span class='discount'>$discount</span><span style='color: rgb(204, 12, 57) ;font-size: small;'><b>On deal</b></span></p>
  <br>
  <div><a href='Products.php?id=$productid'>$productname</a></div>
  <h6 rate='$Rate'>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
   <i class='fa fa-star'> </i>
  </h6>
  <br><br>
  <b>&dollar;$productprice</b> 
  </div> ";
  echo $element;


}

function Cartcomponent($id,$productid,$productname,$productprice,$productimg,$template,$Qty)

{
  $element=
"
<form  method='post' action='Cart.php?action=cart&id=$id&prodid=$productid' target='votar'>
<li style='display: flex;height: 250px;'>
<img src='$productimg' alt=''>
<div class='description'>
<h3><a href='Products.php?id=$productid'>$productname</a></h3>
<b>$template</b>
<br>
<div class='stock'>In stock</div>
<input type='checkbox'> <div class='gift'>  This is a gift <a href='#'>Learn more</a></div>
<br>
<br>
<label class='quantity' > Qty: <input onchange='myFunction1(this)' name='btnChange' value='$Qty' min='1' max='10' type='number' ></label>
</div>
<div class='price'> <b>$$productprice</b>
<input name='btnDelete' type='button' value='Delete' onclick='myFunction(this)'>
</div>
</li>
<hr>
</form>
";
echo $element;
}


?>