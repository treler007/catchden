MD img
MD css
MD js
@echo off
(
echo.^<!DOCTYPE html^>
echo.^<html lang="en"^>
echo.^<head^>
echo.	 ^<meta charset="UTF-8"^>
echo.	 ^<meta name="viewport" content="width=device-width, initial-scale=1.0"^>
echo.	 ^<meta http-equiv="X-UA-Compatible" content="ie=edge"^>
echo.	 ^<link rel="stylesheet" href="css/master.css"^>
echo.	^<!--  jquery --^>
echo.     ^<!-- ^<script src="https://code.jquery.com/jquery-3.6.0.js"  ^>^</script^> --^>
echo.	^<!--  local jquery --- установите jq в папку либс, для примера ниже --^>
echo.    ^<!-- ^<script src="js/jq.js"  ^>^</script^> --^>
echo.	 ^<script src="js/master.js" charset="utf-8"^>^</script^> ^<!--Скрипт работает после загрузки дом, чтоб изменить, уберите defer --^>
echo.
echo.
echo.	   ^<!-- Materialize CSS--^>
echo.	   ^<!--   ^<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"^> --^>
echo.	  ^<!-- Materialize JavaScript --^>
echo.	   ^<!-- ^<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"^>^</script^> --^>
echo.
echo.	^<!--less --^>
echo.	 	^<!-- ^<link rel="stylesheet" href="css/less.css"^> --^> 
echo.	   ^<!-- ^<script src="https://cdn.jsdelivr.net/npm/less"^>^</script^> --^>
echo.	  ^<!-- ^<link rel="stylesheet" href="css/less.less"^>--^>
echo.
echo.	^<!--bootstrap --^>
echo. 	^<!--^<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"^>--^>
echo.	 ^<title^>Document^</title^>
echo.^</head^>
echo.^<body^>
echo.	 
echo.^</body^>
echo.^</html^>)>index.html

@echo off
(
echo.^<? //echo "проверка работы";?^>
echo.^<!DOCTYPE html^>
echo.^<html lang="en"^>
echo.^<head^>
echo.	 ^<meta charset="UTF-8"^>
echo.	 ^<meta name="viewport" content="width=device-width, initial-scale=1.0"^>
echo.	 ^<meta http-equiv="X-UA-Compatible" content="ie=edge"^>
echo.	 ^<link rel="stylesheet" href="/css/master.css"^>
echo.	^<!--  jquery --^>
echo.     ^<!-- ^<script src="https://code.jquery.com/jquery-3.6.0.js"  ^>^</script^> --^>
echo.	^<!--  local jquery --- установите jq в папку либс, для примера ниже --^>
echo.    ^<!-- ^<script src="/js/jq.js"  ^>^</script^> --^>
echo.	 ^<script src="/js/master.js" charset="utf-8"^>^</script^> ^<!--Скрипт работает после загрузки дом, чтоб изменить, уберите defer --^>
echo.
echo.
echo.	   ^<!-- Materialize CSS--^>
echo.	   ^<!--   ^<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"^> --^>
echo.	   ^<!-- Materialize JavaScript --^>
echo.	   ^<!-- ^<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"^>^</script^> --^>
echo.
echo.  	^<!--less --^>
echo.	 ^<!-- ^<link rel="stylesheet" href="css/less.css"^> --^> 
echo.	   ^<!-- ^<script src="https://cdn.jsdelivr.net/npm/less"^>^</script^> --^>
echo.	  ^<!-- ^<link rel="stylesheet" href="css/less.less"^>--^>
echo.
echo.	^<!--bootstrap --^>
echo. 	^<!--^<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"^>--^>
echo.	 ^<title^>Document^</title^>
echo.^</head^>
echo.^<body^>
echo.	 
echo.^</body^>
echo.^</html^>)>index.php 

@echo off
(
echo. window.onload=function^(^){
echo.  //тут пишем код, который будет ожидать загрузки DOM    
echo. }
echo. //здесь в обычном режиме
echo. )>js/master.js

 
echo //Это Less файл. Начинаем работу> css/less.less 

@echo off
(
echo.*{
echo.margin:0;
echo.padding:0;
echo.box-sizing:border-box;
echo.outline:none;
echo.text-decoration:none;
echo.})>css/master.css


