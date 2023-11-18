<?
if(isset($_POST['sendSignup'])):
        
        //Данный файл - обрабатывает ввод из формы
        require_once "$path/sys/libs/validate.php";


        $errors=[];
        if(clearValue($_POST['login'])==""){
            $errors[]="Введите Логин";
        }
        if(clearValue($_POST['email'])=="") $errors[]="Введите e-mail";

        if($_POST['password']==""){
            $errors[]="Введите Пароль";
        }
        if($_POST['password']!=$_POST['password2']){
            $errors[]="Пароли не совпадают";
        }
        if(empty($errors)){
            // 1 способ с помощью md5
            // $passwordMd5=md5($_POST['password']);

            // 2 cпособ с помощью password_hash()
            $passwordHash=password_hash($_POST['password'],PASSWORD_DEFAULT);
            $db->query("INSERT INTO `users` (`login`,`password`) VALUES('$_POST[login]','$passwordHash')");
            

            
        }
        else echo $errors[0];


     //$db->query("SELECT * FROM (SELECT * FROM `table` WHERE id>10) as `table2` ORDER BY id");
    endif;