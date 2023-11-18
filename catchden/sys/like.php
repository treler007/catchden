
<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";



?>

<!DOCTYPE html>
<html lang="en">
	<? include_once "$path/private/head.php"; ?>
   
    <? include_once "$path/private/header_product.php"; ?>
    <?php
       if(isset($_SESSION['login'])){

        
       
        
       
?> 
		 <main>
            <div class="main__cart" id="main_cart">
                <div class="main__cart__left">
                    <h1>Избранное</h1>
                    <div class="main__sum">
                        <div></div>
                        <div></div>
                    </div>
                    
                    <div class="main__product">
                        
                    
                    
                    </div>
                </div>
              
                    
                </div>
            </div>
</div>
		 </main>
		

	 </div>
     <script>
        fetch("/sys/showLike.php")
        .then(response => response.json())
        .then(data=> {
            let insertElement=document.querySelector(".main__product");
            
            for(let row of data){
                let newDiv = document.createElement("div");
                newDiv.classList.add("productsCart");
                newDivAfter=document.createElement("div");
                
                newDiv.innerHTML=`
                 
                <div class="productsCart__img"> <img src="/img/${row.link_img}"></div>
                        <div class="productsCart__content">
                       
                        <div class="productsCart__content__row1">
                          <div class=" productsCart__content__title">${row.name}</div> 
                            <div class="productsCart__content__delete" data-product-id = ${row.id}> &#10006; </div>
                        </div> 
                        <div class="productsCart__content__row2">
                        <div class="productsCart__content__desc"> Размер: S</div>
                        </div>
                        <div class="productsCart__content__row3">
                          <div class="productsCart__content__price">Цена:${row.price}  </div> 
                            <div class="productsCart__content__count"> Материал:${row.material}</div> 
                            <div class="productsCart__content__sum" data-card-sum=${row.id}> ${row.price} </div> 
                            <div data-idproduct=${row.id} class="goods" id="goods2"></div>
                        </div>
                          
                        </div>`;
             
                  
                newDiv.setAttribute("data-card-id",row.id);
                newDivAfter.setAttribute("data-card-id",row.id);
                insertElement.append(newDiv);
                newDiv.after(newDivAfter);
               // insertElement.innerHTML += `<div>${row.name}кол-во:${row.count}</div>`;
                

    
            }
        })
        
               
        .then(()=>{
            let insertElement = document.querySelector(".main__product");
            insertElement.onclick = data => {
                //console.log(data)
                function movingGoods(action){
                    fetch(`/sys/movingGoods.php?action=${action}&productid=${data.target.dataset.productId}`)
                    .then(response=> response.text())
                    .then(dataDB =>{
                        if(dataDB == "true"){
                            
                         // console.log("win");
                          if(action == 1){
                            data.path[1].childNodes[3].innerText = Number(data.path[1].childNodes[3].innerText)+1 ;
                          }
                          
                          else{
                            data.path[1].childNodes[3].innerText = Number(data.path[1].childNodes[3].innerText)-1 ;
                          }
                         
                          document.querySelector(`[data-card-sum="${data.target.dataset.productId}"]`).innerText = Number(data.path[1].childNodes[3].innerText ) * Number(data.target.dataset.productPrice) ;
                          let totalSum = 0;
                           for(let x of document.querySelectorAll("[data-card-sum]")){
                                totalSum += Number(x.innerText);
                           }
                           document.querySelector(".main__cart__right1")
                           document.querySelector("#total").innerHTML = totalSum;
                           
                           console.log(totalSum);
                        }
                        else{
                            console.log(`error:${data}`);
                        }
                    })

                    
              
                    }
              
                if(data.target.className=="plusProduct"){
                    movingGoods(1);
                }
                else if(data.target.className=="minProduct"){
                    movingGoods(2);
                }
                else if(data.target.dataset.productId){
                    // fetch(`/sys/deleteProductsCart.php`, {  
                    //     method: 'post',  
                    //     headers: {  
                    //     "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
                    //     },  
                    //     body: `id=${data.target.dataset.productId}` 
                    // })
                    fetch(`/sys/deleteProductsCart.php?id=${data.target.dataset.productId}`)
                    .then(() => {
                        console.log(data.target.dataset.productId);
                        let deleteCard=document.querySelectorAll(`[data-card-id="${data.target.dataset.productId}"]`);
                         for(let elem of deleteCard){
                            insertElement.removeChild(elem);
                         }
                       
                   });
                }
            
  main_cart.onclick = event =>{
		
		if(event.target.className=="goods"){
			//console.log(event.target.dataset.idproduct);
			fetch("/addProductTocart.php", {  
				method: 'post',  
				headers: {  
				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
				},  
				body: `id=${event.target.dataset.idproduct}`
			   })
               .then(()=>console.log("Успех!"));
			
			 
		}
		

	}

            }
        });
            
			
     </script>

       

</body>

</html>
<?php } else { ?>
<!-- Ниже код показывает стартвоые элементы, когда нет активных сессий -->
<div class="avtoriz" id="net">Войдите в личный кабинет<br>
  <div id="modal_avto">Войти</div>
  <div id="modal_avto2">Зарегестрироваться</div>


</div> 
    <script>
    modal_avto.onclick=()=>{
        startPage.style.display="grid";
        
    }
    modal_avto2.onclick=()=>{
        startPage2.style.display="grid";
        
    }
</script>
<?php }
