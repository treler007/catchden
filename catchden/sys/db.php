<?
$dbName = "catch";//имя базы данных
$dbUsername = "root";//имя пользователя для входа в базу данных
$dbPassword = "";//пароль для базы данных
$dbHost = "localhost";//указываем комп. на котором находится наша база данных. 
//$db=new mysqli("localhost","root","","web115");
$db=new PDO('mysql:host=localhost;dbname=catch', 'root', '');