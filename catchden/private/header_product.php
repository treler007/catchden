<?
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";



if(isset($_POST['sendSignupp'])){
	require_once "$path/sys/libs/validate.php";
	$errors=[];
	if(clearValue($_POST['login'])==""){
		$errors[]="Введите Логин";
	}
	

	if($_POST['password']==""){
		$errors[]="Введите Пароль";
	}

	if(empty($errors)){
		$query=$db->query("SELECT `id`,`login`,`password`,`status` FROM users WHERE `login`='$_POST[login]'");
	   
		if( $query->rowCount()>0){
			// 1 способ md5
		  //  if($query->fetch_assoc()['password']==md5($_POST['password']))echo "Ура!";
		 $passwordInDB= $query->fetch();
			//2 способ password_hash
			if(password_verify($_POST['password'],$passwordInDB['password']))echo "Ура!";
				$_SESSION['auth']=true;
				$_SESSION['login']=$passwordInDB['login'];
				$_SESSION['status']=$passwordInDB['status'];
				$_SESSION['user_id']=$passwordInDB['id'];

				header("Location: /persona");

				
				
		  

			/* 
				$2y$10$p4Vpga3vqm9a1YffITrTLuO9jUCyVdJDjCQZ/Y6cK8NXOskQCa1Bm

			*/

			
		}
		else{
			echo "Данный пользователь не существует!";
		}
        
		
	}
	else echo $errors[0];


}
?>
               <!--регистрация-->

<?
require_once  "$path/sys/sysSignup.php";
if(isset($_POST['send'])){

    $_POST['login']=trim($_POST['login']);

   $query = $db->prepare("SELECT `login` FROM users WHERE `login`=:login");
   $query -> execute([
        ":login"=>$_POST['login']
   ]);

   $rowCount = $query->rowCount();
   
   if($rowCount>0){
       echo "Данный пользователь уже есть в базе данных!";
   }
   else{
        $errors=[];
        // создаем массив, куда будем записывать ошибки

        if($_POST['login']==""){
            $errors[]="Введите логин!";
            // записываем в переменную ошибки! Запись происходит в новый порядковый индекс
        }
        else{
            // используем регуляр. выражение для подбора логина! 
            // использовать можно только символы лат. алфавита, числа, а так же "_" "-"
            $reg = "/[a-z0-9_-]{3,10}/ui";

           if(!preg_match($reg,$_POST['login'])){
               $errors[] = "Логин должен состоять из символов лат. алфавита чисел, а так же символов _ -";
           }

        }
        if($_POST['password']==""){
            $errors[]="Введите пароль!";
        }
        
        if($_POST['password']!=$_POST['password2']){
            $errors[]="Пароли не совпадают!";
        }
        // echo "<br>";
        // print_r($errors);
        if($errors[0] == NULL){

            #шифрование пароля с помощью метода password_hash()
            $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);


            // если значение есть, то значит нажали на кнопку
            $querySave = $db->prepare("INSERT INTO `users` (`login`,`password`) VALUES(:login,:password)");
            $querySave -> execute([
                ":login"=>$_POST['login'],
                ":password"=>$_POST['password']
            ]);
            // query - в переводе запрос. Данная команда отправляет запрос к базе данных MySQL
           // $_SESSION['signup'] = true;
           
            // перенаправление на авторизацию
        }
        else{
            echo $errors[0];
            // вывод ошибок, если они есть! То есть, если в массиве errors есть записи, то значит и есть ошибки
        }
  }

}



?>
<!DOCTYPE html>
<html lang="en">
	<? include_once "$path/private/head.php"; ?>
<body>
	
		<div id="modalCatalog" class="CatalogMenu">
		  <div id="close_catalog"><h3 id="closeX">	&#10006;</h3></div>
          <div class="categor" id="sale"><a href="/Sale">Скидки</a></div>
		  <div class="categor" ><a href="/Wolman">Женщинам</a></div>
		  <div class="categor" ><a href="/Unisex">Унисекс</a></div>
		  <div class="categor" ><a href="/Man">Мужчины</a></div>
		  <div class="categor"><a href="/acces">Аксессуары</a></div>
		  <div class="categor"><a href="/Shoes">Обувь</a></div>


		</div>
	<div class="headerCap">
	<a href="/main" id="logo">KsuDan</a>
	

		
		<div class="text-field">
		 
		  <div class="text-field__icon">
			<form action="/products" method="get">
			<input class="text-field__input" type="search" name="search" id="search" placeholder="Найти" >
			<span class="text-field__aicon">
			  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
				<path
				  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
			  </svg>
			</span>
			</form>
		  </div>
		</div>
	<div class="cap">
        <div id="user" class="menuChang modalUser"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.4508 13.0573C13.0996 12.1591 12.5899 11.3433 11.9502 10.6553C11.3125 9.96524 10.557 9.41508 9.72551 9.03518C9.71807 9.03116 9.71062 9.02915 9.70317 9.02513C10.863 8.1206 11.617 6.64724 11.617 4.98492C11.617 2.23116 9.55052 0 7 0C4.44949 0 2.38301 2.23116 2.38301 4.98492C2.38301 6.64724 3.13699 8.1206 4.29683 9.02713C4.28938 9.03116 4.28193 9.03316 4.27449 9.03719C3.44045 9.41708 2.69205 9.96181 2.04977 10.6573C1.41067 11.3459 0.901113 12.1615 0.549245 13.0593C0.203571 13.9382 0.0171405 14.8805 4.65534e-05 15.8352C-0.000450341 15.8566 0.00303479 15.878 0.0102967 15.8979C0.0175586 15.9179 0.0284503 15.9361 0.04233 15.9515C0.0562097 15.9669 0.0727966 15.9791 0.0911133 15.9874C0.10943 15.9957 0.129106 16 0.148982 16H1.266C1.34791 16 1.41307 15.9296 1.41493 15.8432C1.45216 14.2915 2.02929 12.8382 3.04949 11.7367C4.10507 10.597 5.50693 9.96985 7 9.96985C8.49308 9.96985 9.89493 10.597 10.9505 11.7367C11.9707 12.8382 12.5478 14.2915 12.5851 15.8432C12.5869 15.9317 12.6521 16 12.734 16H13.851C13.8709 16 13.8906 15.9957 13.9089 15.9874C13.9272 15.9791 13.9438 15.9669 13.9577 15.9515C13.9715 15.9361 13.9824 15.9179 13.9897 15.8979C13.997 15.878 14.0005 15.8566 14 15.8352C13.9813 14.8744 13.797 13.9397 13.4508 13.0573ZM7 8.44221C6.14548 8.44221 5.34123 8.08241 4.73619 7.42915C4.13114 6.77588 3.79789 5.90754 3.79789 4.98492C3.79789 4.06231 4.13114 3.19397 4.73619 2.5407C5.34123 1.88744 6.14548 1.52764 7 1.52764C7.85452 1.52764 8.65877 1.88744 9.26381 2.5407C9.86886 3.19397 10.2021 4.06231 10.2021 4.98492C10.2021 5.90754 9.86886 6.77588 9.26381 7.42915C8.65877 8.08241 7.85452 8.44221 7 8.44221Z" fill="white"/>
			</svg>
			<div id="modal" class="modalUser ">
			<?php
	if(isset($_SESSION['login'])){ 
		?>
		<!-- Проверяем, есть ли у нас такая сессия. Если есть. то выводим в модальном окне следующий код -->
		<a class="closeModal" data-closeModal href="/persona">Личный кабинет</a>
		<a class="closeModal" data-closeModal href="#">Каталог</a>
		

		<div class="exit_Login1">
		<form action="../main" method="post"> <!-- Форма нам нужна для лотправки пост=-запроса на сервер -->
			<input type="submit" name="logOut" id="exit_login" value="Exit">
		</form>
	</div>
		<?
		// Проверяем, если нажат кнопка Выход из формы с пост-запросом, то делаем выход из всех сессий и переадресацию на стратовую страницу
			if(isset($_POST['logOut'])) {
				
				$_SESSION['login']=NULL; // Ставим значение 0
				$_SESSION['auth']=NULL; // Ставим значение 0
				
			

			   
                  
			} ?>
		<? } else { ?>
		<!-- Ниже код показывает стартвоые элементы, когда нет активных сессий -->
		<a class="closeModal" id="windowLogin" data-closemodal>Войти</a>
		<a class="closeModal" id="windowSignup" data-closemodal>Регистрация</a>
		<?php }
?>

              
			</div>
			          <!--логин-->
				<main class=" signup" id="startPage" >
				            <div class="main_signup__window" >
				                <h3>Log In</h3>
								  
									<div id="closeWindowLogin">	&#10006;</div>
									<form action="" method="post" id="formSignup">
                   			 <input type="text" name="login"  placeholder="Логин" id="login"><br>
                   
                  			  <input type="password" name="password" placeholder="Пароль" id="password"><br>
                  
                    		<input type="submit" name="sendSignupp" id="sendSignupp" value="Войти">
                </form>
				                </form>
				            </div>
						</main>
					<!--регистрации-->
					<main class="signup" id="startPage2">
            <div class="main_signup__window">
				<div id="closeWindowSignup">	&#10006;</div>
                <h3>Sign Up</h3>
				<form action="" method="post" id="formSignup">
                    <input type="text" name="login"  placeholder="Логин" id="login"><br>
                    
                    <input type="password" name="password" placeholder="Пароль" id="password"><br>
                    <input type="password2" name="password2" placeholder="Повторите пароль" id="password2"><br>
                    <input type="submit" name="send" id="send_Signup" value="Зарегестрироваться">
                </form>
                
            </div>

		</main>
		<?
		if(isset($_SESSION['auth'])){
			if($_SESSION['auth']==true){
				echo "<span id='profile'> $_SESSION[login]</span>";
			}
			else echo "Войти";
		}
			
		?>
			</div>
			
	    <a href="/sys/like.php" id="like">
			<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M4.25 1C2.45535 1 1 2.61538 1 4.60837C1 6.2172 1.56875 10.0355 7.1672 13.8954C7.26748 13.9638 7.38261 14 7.5 14C7.61739 14 7.73252 13.9638 7.8328 13.8954C13.4312 10.0355 14 6.2172 14 4.60837C14 2.61538 12.5446 1 10.75 1C8.95535 1 7.5 3.18689 7.5 3.18689C7.5 3.18689 6.04465 1 4.25 1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
	</a>
		<a href="/cart" id="basket">
			
<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.1818 5.88409H13.2627L9.67909 0.354057C9.52364 0.118019 9.26182 0 9 0C8.73818 0 8.47636 0.118019 8.32091 0.362487L4.73727 5.88409H0.818182C0.368182 5.88409 0 6.26344 0 6.72708C0 6.80295 0.00818179 6.87882 0.0327272 6.95469L2.11091 14.7692C2.29909 15.4773 2.92909 16 3.68182 16H14.3182C15.0709 16 15.7009 15.4773 15.8973 14.7692L17.9755 6.95469L18 6.72708C18 6.26344 17.6318 5.88409 17.1818 5.88409ZM9 2.34352L11.2909 5.88409H6.70909L9 2.34352ZM14.3182 14.314L3.69 14.3224L1.89 7.57007H16.1182L14.3182 14.314ZM9 9.25606C8.1 9.25606 7.36364 10.0148 7.36364 10.942C7.36364 11.8693 8.1 12.628 9 12.628C9.9 12.628 10.6364 11.8693 10.6364 10.942C10.6364 10.0148 9.9 9.25606 9 9.25606Z" fill="white"/>
</svg></a>
		



	</div>
	
</div>
	<div class="choice">
	<div id="catalog" > 
		<svg width="13" height="10" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
		<line y1="0.5" x2="13" y2="0.5" stroke="black"/>
		<line y1="3.5" x2="13" y2="3.5" stroke="black"/>
		<line y1="6.5" x2="13" y2="6.5" stroke="black"/>
		
		</svg>
		Каталог</div>
	<div id="box1" class="link"><a href="/Sale">Скидки</a></div>
	<div id="box2" class="link"><a href="#">Блог</a></div>
	<div id="box3"  class="link"><a href="#">Контакты</a></div>
	<div id="box4" class="link"><a href="#">Доставка</a></div>
	
</div>
