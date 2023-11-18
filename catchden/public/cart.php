<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";


if(isset($_POST['sendotprav'])){
  // echo "INSERT INTO `person_product`(`user_id`,`namber`,`name_fio`) VALUES(":id,`user_id`=".$_SESSION['user_id'].",:namber,:fio")";

    $querySave = $db->prepare("INSERT INTO `person_product` (`user_id`,`namber`,`name_fio`) VALUES(".$_SESSION['user_id'].",:namber,:fio)");
    $querySave -> execute([
        ":namber"=>$_POST['namber'],
        ":fio"=>$_POST['fio']
    ]);
   


  
}
?>

<?php if (@$querySave==true) { ?> 
    <div class="otpravka_fon">
  <div class="otpravka"><div id="uvedomlen"><div id="senky"><h3>Спасибо за заказ!</h1></div><br> <div id="senky2">С вами свяжется менеджер <br>в течении 15 минут</div></div>
    <a href=/main>Вернуться на главную</a>
  </div>
</div>
<?php } else { ?> 
  
<?php } ?>


<!DOCTYPE html>
<html lang="en">
	<? include_once "$path/private/head.php"; ?>
   
    <? include_once "$path/private/header_product.php"; ?>
    <?php
       if(isset($_SESSION['login'])){

        
       
        
       
?>
<div class="window_form_glav" id="window_form_glav1">
<div class="window_form">
    <div id="clsoe_otprav">&#10006;</div>
    <form action="" method="post" id="form_otprav">
    <input type="text" name="fio" id="fio" placeholder="ФИО" />
    <input type="text" name="namber" id="phone" placeholder="+7(000)000-00-00"/>
    <input type="submit" name="sendotprav" id="sendotprav" value="Отправить">
    </form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/imask"></script>
<script>
    var element = document.getElementById('phone');
var maskOptions = {
    mask: '+7(000)000-00-00',
    lazy: false
} 
var mask = new IMask(element, maskOptions);

var element2 = document.getElementById('email');
var maskOptions2 = {    
    mask:function (value) {
                if(/^[a-z0-9_\.-]+$/.test(value))
                    return true;
                if(/^[a-z0-9_\.-]+@$/.test(value))
                    return true;
                if(/^[a-z0-9_\.-]+@[a-z0-9-]+$/.test(value))
                    return true;
                if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.$/.test(value))
                    return true;
                if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}$/.test(value))
                    return true;
                if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}\.$/.test(value))
                    return true;
                if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}\.[a-z]{1,4}$/.test(value))
                    return true;
                return false;
                    },
    lazy: false
} 
var mask2 = new IMask(element2, maskOptions2);


    </script>
    <script>
    $(function() {
  jQuery(function($) {
    $('#fio').on('keypress', function() {
      var that = this;
      setTimeout(function() {
        var res = /[^а-яА-ЯїЇєЄіІёЁ ]/g.exec(that.value);
        that.value = that.value.replace(res, '');
      }, 0);
    });
  });
})
</script>
		 <main>
            <div class="main__cart">
                <div class="main__cart__left">
                    <h1>Корзина</h1>
                    <div class="main__sum">
                        <div></div>
                        <div></div>
                    </div>
                    
                    <div class="main__product">
                        
                    
                    
                    </div>
                </div>
               <div class="main__cart__right1"> 
                <div class="main__cart__right">
                    <div id="top_blok"><h1>Итого:</h1></div>
                    <div id="bonus1">Ваш бонус по карте: 0<br>
                    <input type="submit" name="CartSend" id="CartSend" value="Использовать">
                    </div>
                   <div class="totalsum">Заказ на сумму:
                     <div id="total"></div>
                    </div>
                    <div id="botCart1">
                    <input type="submit" name="CartSend" id="CartSend" value="Оформить">
       </div>
                    
                    
                </div>
            </div>
</div>

		 </main>
		

	 </div>
     <script>
        fetch("/sys/showCart.php")
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
                            <div class="productsCart__content__sum" data-card-sum=${row.id}> ${row.price * row.count } </div> 
                        </div>
                          
                        </div>`;
                newDivAfter.innerHTML=`
                <div class="plusProduct" data-product-id = ${row.id} data-product-price=${row.price}>
                +
                </div>
                <div class="totalCount">
                ${row.count}
                </div>
                <div class="minProduct" data-product-id = ${row.id} data-product-price=${row.price}>
                -
                </div >
                
                `; 
                newDivAfter.classList.add("calcButtonscard");       
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
                    if(Number( data.path[1].childNodes[3].innerText)>0)
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
            


            }
        });
     
     </script>
<script>
botCart1.onclick= () =>{
    
}
document.getElementById("botCart1").onclick = ()=>{
    window_form_glav1.style.display="grid";
    };

    document.getElementById("clsoe_otprav").onclick = ()=>{
    window_form_glav1.style.display="none";
    };


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
