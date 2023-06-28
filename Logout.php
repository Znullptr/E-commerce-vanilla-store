<?php
session_start();
if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
if(isset($_SESSION['cart']))
{
    unset($_SESSION['cart']);
}
header("Location: Login.php");
die;