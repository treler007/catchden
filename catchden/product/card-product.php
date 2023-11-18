<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";




  
?> 


<!DOCTYPE html>
<html lang="en">
	<? include_once "$path/private/head.php"; ?>
   <body>
    <? include_once "$path/private/header_product.php"; ?>
	


<?
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "catch";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['productid'];
$id = mysqli_real_escape_string($conn,$id);
$query = "SELECT * FROM `products` WHERE `id`='" . $id . "'";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)) {?>
<div class="news_wrapper">
    
    <div class="news_wrapper2">
        
        <img src="/img/<?=$row['link_img']?>" alt="" class='news_img'/> 


        <div class="read_cart">
        <div class="news_login">
            
            <?=$row['name']?>
        </div>
        <div class="news_title">
           Цена: <?=$row['price']?>
        </div>
        <div id="material"> <?=$row['material']?></div>
</div>
        
       
    </div>
<?php
}?>
</div>
</div>
