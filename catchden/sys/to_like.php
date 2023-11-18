<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";

$time = date("Y-m-d H:i:s"); //TIMESTAMP yyyy.mm.dd HH-ii-ss

echo "INSERT INTO `productslike`(`product_id`,`time_add`,`count`,`user_id`) VALUES(".$_POST['id'].",'".$time."',1,".$_SESSION['user_id'].")";

$query = $db -> prepare("INSERT INTO `productslike`(`product_id`,`time_add`,`count`,`user_id`) VALUES(:id,'".$time."',1,".$_SESSION['user_id'].")");

$query ->execute([
    ":id"=>$_POST['id']
  
]);
