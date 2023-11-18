<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];

require_once "$path/sys/db.php";
try{
if($_GET['action']==1){
    $db->query("UPDATE cart SET count=count+1 WHERE id = {$_GET['productid']}");
}
else{
    $db->query("UPDATE cart SET count=count-1 WHERE id = {$_GET['productid']}");
}
echo "true";
}
catch(Exception $e){
      echo "false:$e";
}
