login.oninput = () =>{
    if(login.value.length>2){
         login.style.border="1px solid green";
    }
    else{
        login.style.border="1px solid red";
    }
   
}
password.oninput = () =>{
    if(password.value.length>2){
        password.style.border="1px solid green";
    }
    else{
        password.style.border="1px solid red";
    }
   
}
 formSignup.onsubmit=()=>{
     if(login.value.length<3){
         alert("Слишком короткий ник!");
         login.style.border="1px solid red";
         return false;
     }
     if(password.value.length<3){
        alert("Слишком короткий пароль!");
        password.style.border="1px solid red";
         return false;
     }

 }
 formSignup.onsubmit=()=>{
    if(login.value.length<3){
        alert("Слишком короткий ник!");
        return false;
    }
    if(password.value.length<3){
       alert("Слишком короткий пароль!");
        return false;
    }
    if(password.value!=password2.value){
       alert("Пароли не совпадают!");
        return false;
    }
}