window.onload=function(){
    const menuChange= document.querySelectorAll(".modalUser");
    let len=menuChange.length;
    for(let i=0;i<len;i++){
       menuChange[i].onmouseover=function(){
           modal.style.display="grid";
          
           
       }
       menuChange[i].onmouseout=function(){
               
               modal.style.display="none";
       
           
       }
    }
   //function openMenu(){
   //    document.getElementById("modalCatalog").classList.toggle('active');
   //}
   //



catalog.onclick=() =>{
    modalCatalog.style.left="0";
  // setTimeout(()=>{
  //     modal.style.transform="scale(1)";
  // },50);

}
closeX.onclick=()=>{

   
    modalCatalog.style.left="-312px";
   
     // setTimeout(()=>{
     //     showModal.style.display="none";
     // },400);

   
}
//
//   // var winodwLogin2= document.querySelector(".startPage");
         windowLogin.onclick=() =>{
       
            startPage.style.display="grid";
          
           
         }
           closeWindowLogin.onclick=() =>{
       
            startPage.style.display="none";
       
        
       }




    windowSignup.onclick=() =>{
       
      startPage2.style.display="grid";
     
      
  }
  closeWindowSignup.onclick=() =>{
  
   startPage2.style.display="none";
  
   
}

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
    
  // setTimeout(()=>{
  //     modal.style.transform="scale(1)";
  // },50);








}