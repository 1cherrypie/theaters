<?php
session_start();
include "dbconnect.php";
?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Театрал</title>
		<link rel="stylesheet" href="css_style.css">
		<script 
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
		</script>
		<script type="text/javascript">
$(document).ready(function(){
 
$(window).scroll(function(){
if ($(this).scrollTop() > 100) {
$('.scrollup').fadeIn();
} else {
$('.scrollup').fadeOut();
}
});
 
$('.scrollup').click(function(){
$("html, body").animate({ scrollTop: 0 }, 600);
return false;
});
 
});
</script>
	</head>
	<body id="top" background="../images/oboi.jpg">
		<header class="header" id="header">
			<div class="some-container">
				<nav class="top-menu">
					<div class="first-menu">
					<a class="logo first-m" href="index.php">Театрал</a>
					<form class="pole-search first-m" action="" method="get">
						<input class="search-pole" type="search" placeholder="Кандибобер" maxlength="28">
						<button type="submit" class="cndbober">Найти</button>
					</form>
					<div class="login first-m">
						
						<button 
						onclick="document.getElementById('id01').style.display='block'" 
						class="button_login">ВОЙТИ | РЕГИСТРАЦИЯ
						</button>
						
					</div>
					</div>
					<ul class="menu-main">
						<li><a href="#">Афиша</a></li>
						<li><a href="theaters.php">Театры</a></li>
						<li><a href="#">Постановки</a></li>
						<li><a href="actors.php">Актеры</a></li>
						<li><a href="employees.php">Работники</a></li>
						<li><a href="kassa.php">Кассы</a></li>
						<li><a href="#">Новости</a></li>
					</ul>
				</nav>
			</div>
		</header>
			<div class="content">
			
			
			<div class="block_for_messages">
		<?php
 
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не появилось заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не появилось заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
		</div>
		
		<?php
    //Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    //иначе выводим сообщение о том, что он уже авторизован
    if(!isset($_SESSION["email_user"]) && !isset($_SESSION["password_user"])){
?>
		
		<div id="id01" class="modal">
			
		
		<div id="form_auth"> 
            <form action="auth.php" method="post" name="form_auth" class="formauth animate">
                
				<span onclick="document.getElementById('id01').style.display='none'" 
			class="close" title="Close Modal">&times;</span>
				
				<div class="formauth_container">
				<h3 class="auth-title">Авторизация</h3>
				
				Email:<br>
				<input type="email" placeholder="Введите email" name="email_user" class="formauth_input" required="required">
				<span id="valid_email_message" class="mesage_error"></span><br>
				
				Пароль:<br>
				<input type="password" placeholder="Введите пароль" name="password_user" class="formauth_input" required="required">
				<span id="valid_pasword_message" class="mesage_error"></span><br>
				
				<div class="button_container">
				<button type="submit" name="btn_submit_auth" class="formauth_button" value="authorization">ВОЙТИ</button>
				<button type="reset" name="btn_reset_auth" class="formauth_button" value="reset">СБРОСИТЬ</button>
				<br>
				</div>
				<p>Если Вы не зарегистрированы, пройдите на <a href="form_register.php" class="formauth_link" >форму регистрации</a>.</p>
				</div>
            </form>
        </div>
	</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php
    }else{
        //Если пользователь авторизован, то выводим ссылку Выход
?> 
        

		<div id="id01" class="modal">
			<div id="form_logout">
			<span onclick="document.getElementById('id01').style.display='none'" 
			class="close" title="Close Modal">&times;</span>
			<div id="formlogout_container">
			<h3 class="formlogout-title">Вы уже авторизованы!</h3>
            <a class="formlogout-link" href="logout.php">Выход</a>
        </div>
		</div>
	</div>
		
<?php
    }
?>	
			
				<div class="some-container">
				<div class="some-content-container">
				<div class="content-container-theaters">
					<h3 class="theaters-title">Градовских Любовь</h3>
					<img class="theater-img" src="../images/gradovskuh.jpg" alt="Градовских Любовь" title="Градовских Любовь" width="300px">
										
					<?php

$sql = "SELECT lastname_actor, fisrtname_actor, middlename_actor, bday_actor, email_actor, tel_actor, id_actor FROM `actors` WHERE (((id_actor)=2)) ORDER BY lastname_actor DESC;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?><p class="desc-theater-info"><?=$row["lastname_actor"]?> <?=$row["fisrtname_actor"]?> <?=$row["middlename_actor"]?></p>
		<p class="desc-theater-info"><?=$row["bday_actor"]?></p>
		<p class="desc-theater-info"><?=$row["email_actor"]?></p>
		<p class="desc-theater-info">Телефон:<br><?=$row["tel_actor"]?></p>
		<p class="desc-theater-info"><a href="name_theater_ktm.php" class="contacts-link">Театр "Суббота"</a></p>
		<?php
}
} else {
	echo "0 results";
} 
$mysqli->close();
?>
					
					<p class="paragraph desc-theater">В 2006 г. окончила Высшее театральное училище им. Щепкина в Москве (курс В. П. Селезнева).</p>
					<p class="paragraph desc-theater">В труппе театра с января 2010 г.</p>
					
					</div>
					
					<div class="table-r-container">
					
					<table class="table-r">
		<thead>
		<tr>
		<th colspan="2">РОЛИ В СПЕКТАКЛЯХ</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td>"Митина любовь"</td>
		<td>Лика</td>
		</tr>
		<tr>
		<td>"Лунный пейзаж"</td>
		<td>Маша</td>
		</tr>
		<tr>
		<td>"Доходное место"</td>
		<td>Анна Павловна</td>
		</tr>
		<tr>
		<td>"Герои и боги"</td>
		<td>Афродита</td>
		</tr>
		<tr>
		<td>Город, знакомый до слез</td>
		<td>Антенна, Девушка Лика</td>
		</tr>
		<tr>
		<td>Мама, папа, сестренка и я</td>
		<td>Мама</td>
		</tr>
		<tr>
		<td>Недопёсок Наполеон III</td>
		<td>Собака Полтабуретка, школьница Чащина, Хор</td>
		</tr>
		</tbody>
		</table>
		<br>
		<table class="table-r">
		<thead>
		<tr>
		<th colspan="2">РОЛИ В ДИПЛОМНЫХ СПЕКТАКЛЯХ</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td>"Не все коту масленица"</td>
		<td>Феона</td>
		</tr>
		<tr>
		<td>"Ложь на длинных ногах"</td>
		<td>Ольга</td>
		</tr>
		</tbody>
		</table>
					</div>
					
					<br>
				</div>
				</div>
				<a href="#" class="scrollup">Наверх</a>
			</div>	
			<footer class="footer">
				<div class="some-container">
					<div class="footer-menu">
					<div class="footer-block">
					<div class="bottom-menu-header">
						<a href="index.php"><h3>Театрал</h3></a>
					</div>	
					<div class="bottom-menu-desc">
						<p>Информационный портал Кристины(с) 2021 Кристина, Все права защищены.</p>
						<p>Информация, размещенная на сайте, является объектом защиты авторских прав.</p>
						<p>Использовать материалы с сайта нельзя, но можно, я разрешаю :)</p>
					</div>
					</div>
				<div class="footer-block">
						<ul class="bottom-menu">
							<li><a href="#">Новости</a></li>
							<li><a href="#">Афиша</a></li>
							<li><a href="kassa.php">Кассы</a></li>
							<li><a href="#">Постановки</a></li>
						</ul>
				</div>
				<div class="footer-block">
						<ul class="bottom-menu">
							<li><a href="#">Правила и документация</a></li>
							<li><a href="#">О сайте</a></li>
							<li><a href="contacts.php">Контакты</a></li>
							<li><a href="#">Архив</a></li>
						</ul>
				</div>
				<div class="footer-block">
						<ul class="bottom-menu">
							<li><a href="#">Личный кабинет</a></li>
							<li><a href="all_reviews.php">Отзывы</a></li>
							<li><a href="#">Обратная связь</a></li>
						</ul>
				</div>
				</div>
				</div>
			</footer>
	</body>
</html>