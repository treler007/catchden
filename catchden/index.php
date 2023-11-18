<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";


if(@$_SERVER['REDIRECT_URL'] == "" OR $_SERVER['REDIRECT_URL'] == "/main"):
	require_once "$path/public/main.php";

	elseif($_SERVER['REDIRECT_URL'] == "/persona"):
		require_once "$path/public/persona.php";

elseif($_SERVER['REDIRECT_URL'] == "/acces"):
	require_once "$path/product/productAcces.php";
	
elseif($_SERVER['REDIRECT_URL'] == "/Man"):
		require_once "$path/product/productMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/Sale"):
	   require_once "$path/product/productSale.php";
	   
elseif($_SERVER['REDIRECT_URL'] == "/Shoes"):
	require_once "$path/product/productShoes.php";	   

elseif($_SERVER['REDIRECT_URL'] == "/Unisex"):
	require_once "$path/product/productUnisex.php";	

elseif($_SERVER['REDIRECT_URL'] == "/Wolman"):
	require_once "$path/product/productWolman.php";

elseif($_SERVER['REDIRECT_URL'] == "/products"):
		require_once "$path/product/product.php";

elseif($_SERVER['REDIRECT_URL'] == "/hudiMen"):
		require_once "$path/choiceMen/hudiMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/accesCatMen"):
		require_once "$path/choiceMen/accesCatMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/jacketsMen"):
		require_once "$path/choiceMen/jacketsMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/jeansMen"):
		require_once "$path/choiceMen/jeansMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/shoesCatMen"):
		require_once "$path/choiceMen/shoesCatMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/sweaterMen"):
			require_once "$path/choiceMen/sweaterMen.php";

elseif($_SERVER['REDIRECT_URL'] == "/t-shirtsMen"):
			require_once "$path/choiceMen/t-shirtsMen.php";
elseif($_SERVER['REDIRECT_URL'] == "/cart"):
			require_once "$path/public/cart.php";										
else:
	require_once "$path/public/404.php";
endif;