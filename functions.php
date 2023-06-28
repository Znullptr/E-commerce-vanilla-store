<?php
function check_login($con){

if(isset($_SESSION['username']))
{
$id=$_SESSION['username'];
$query="select * from Client where username= '$id' limit 1";
$result=mysqli_query($con,$query);
if($result && mysqli_num_rows($result) > 0)
{
    $user_data=mysqli_fetch_assoc($result);
    return $user_data;
}
}
header("Location: Login.php");
die;
}
function check_exist_user($con,$username){

            $query = "SELECT id FROM Client WHERE username ='$username'";
            $result = mysqli_query($con, $query);
            $num_rows = mysqli_num_rows($result);
            return $num_rows;
}
function check_exist_email($con,$email){
    $query = "SELECT id FROM Client WHERE email='$email'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
    }

    function random_num($length)
    {
        $text= "";
        if($length < 5)
        {
            $length=5;
        }
        $len=rand(4,$length);

        for($i=0;$i<$len;$i++)
        {
            $text .= rand(0,9);
        }

        return $text;
    }

       
                            
            function getData($con){
               
                $query="SELECT * FROM Product where Top=1";
               
                $result=mysqli_query($con,$query);
               
                if(mysqli_num_rows($result)>0)
                {
                    
                    return $result;
                }
            }             
                            
            function getProductData($con){

                $query="SELECT CodProd,ProdName,Description,ProdColor,ProdImg,QteStock,OrgPrixU,PrixU,NumTemp,Rate,CONCAT(FORMAT(Discount*100,0),'%') FROM Product where TOP=0";
               
                $result=mysqli_query($con,$query);
               
                if(mysqli_num_rows($result)>0)
                {
                    
                    return $result;
                }
            }             
                   function countProduct($con){
                    $user=null;
                    if(isset($_SESSION['username']))
                    $user=$_SESSION['username'];
                    $count=0;
                    if($user)
                    {
                    $query="SELECT * FROM Commande WHERE Username='$user' and State='Suspended'";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $Qty=$row['QteCde'];
                        $count+=(int)$Qty;
                    }
                }
                else{
                    if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key=>$value){
     
                        $count+=$value['Qty'];
                      }}
                }
                   return $count;
                }