<?

session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";


    $db -> query("DELETE FROM cart WHERE id = '$_GET[id]'");
    $db -> query("DELETE FROM productslike WHERE id = '$_GET[id]'");
   
