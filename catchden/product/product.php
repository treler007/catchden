<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";



?>

<!DOCTYPE html>
<html lang="en">
	<? include_once "$path/private/head.php"; ?>
   
    <? include_once "$path/private/header_product.php"; ?>
    <div class="categorMen1">
	<a href="/main">Главная</a>
	<div>
		<svg width="10" height="7" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M6.17678 2.17678C6.27441 2.07915 6.27441 1.92085 6.17678 1.82322L4.58579 0.232233C4.48816 0.134602 4.32986 0.134602 4.23223 0.232233C4.1346 0.329864 4.1346 0.488155 4.23223 0.585786L5.64645 2L4.23223 3.41421C4.1346 3.51184 4.1346 3.67014 4.23223 3.76777C4.32986 3.8654 4.48816 3.8654 4.58579 3.76777L6.17678 2.17678ZM0 2.25L6 2.25V1.75L0 1.75L0 2.25Z" fill="black"/>
		</svg>
		</div>
	<div id="men1">Поиск</div>
</div>
<div class="product__category">
	<a href="/productGlobal/hudi.php">Худи</a>
	<a href="/productGlobal/jeans.php">Брюки/джинсы</a>
	<a href="/productGlobal/sweater.php">Свитеры</a>
	<a href="/productGlobal/jackets.php">Куртки</a>
	<a href="/productGlobal/shoes.php">Обувь</a>
	<a href="/productGlobal/acces.php">Акуссуары</a>
	<a href="/productGlobal/t-shirts.php">Футболки</a>
</div>
<div id="lineProduct"><hr><hr></div>
<div class="main__in__content" id="searchPage">
<div class="product_glav" id="searchPage2">
    <?
					if(isset($_GET['search'])){
						
						$searchQueryProducts=$db->query("SELECT * FROM `products` WHERE `name` LIKE '%$_GET[search]%' ORDER BY `name` ASC");
						//var_dump($searchQuery);
						// echo "<h2>Результаты поиска: </h2>";
						
                        $search=$db->query("SELECT `name`,`price`,`link_img`,`id` FROM `products` WHERE `status`=1  ORDER BY `name` ");
						
						
                        if($searchQueryProducts->rowCount()>0){
							
							foreach($searchQueryProducts as $row){?>
                            	  <div class="productCard">
                    
					<div id="img_product"><img src="/img/<?echo $row['link_img'];?>" alt=""></div>
					<div data-idproduct=<?echo $row['id']?> class="dd">
								
						
								</div>
							
					<div id="name_product"><a href="/product/card-product.php?productid=<?echo $row['id']?>"><?echo $row['name']; ?></a></div>
					<div id="price"><?echo $row['price']; ?></div>
					<div id="size">Размеры: M, S, XL.</div>
					<div data-idproduct=<?echo $row['id']?> class="goods"></div>
				</div>
                            <?}
							}	
						}	
						
?>
</div>
					</div>
<script>
			searchPage.onclick = event =>{
		
		if(event.target.className=="goods"){
			//console.log(event.target.dataset.idproduct);
			fetch("/sys/addProductTocart.php", {  
				method: 'post',  
				headers: {  
				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
				},  
				body: `id=${event.target.dataset.idproduct}`
			   })
			.then(()=>console.log("Успех!"));
			
			 
		}
		//event.target.dataset.idproduct - id продукта который мы будем передавать в базу данных

	}
	searchPage2.onclick = event =>{
		
		if(event.target.className=="dd"){
			//console.log(event.target.dataset.idproduct);
			fetch("/sys/to_like.php", {  
				method: 'post',  
				headers: {  
				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
				},  
				body: `id=${event.target.dataset.idproduct}`
			   })
			.then(()=>console.log("Успех!"));
			
			 
		}
		//event.target.dataset.idproduct - id продукта который мы будем передавать в базу данных

	}
	 </script>
</body>
</html>