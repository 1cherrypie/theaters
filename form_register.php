<?php
session_start();
?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8" http-equiv="Content-Type"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Театрал|Регистрация</title>
		<link type="text/css" rel="stylesheet" href="css_style.css">
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
	<body id="top">
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
 
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        //Если в сессии существуют успешные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
		
		?>
			</div>
		<?php
		
		//Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if(!isset($_SESSION["email_user"]) && !isset($_SESSION["password_user"])){
		
		?>
		
		<div id="formregister">
            <h3 class="auth-title">Регистрация</h3>
 
            <form action="register1.php" method="post" name="form_register" class="formregistr">
                <div class="formregistr_container">
				
				
				<p>Выберите тип пользователя:</p>
				<div class="form_radio">
				
				<label for="radio3">
				<input id="radio3" type="radio" class="radio-d" value="3" name="num_user" required="required">
				<span>Обычный пользователь</span></label><br>
				</div>
			
				Фамилия:<br>
				<input type="text" class="formregistr_input" placeholder="Введите фамилию" name="lastname_user" required="required"><br>
				
				Имя:<br>
				<input type="text" class="formregistr_input" placeholder="Введите имя" name="firstname_user" required="required"><br>
				
				Отчество:<br>
				<input type="text" class="formregistr_input" placeholder="Введите отчество" name="middlename_user" required="required"><br>
				
				<p>Пол:</p>
				<div class="form_radio">
				<label for="radio4">
				<input id="radio4" type="radio" class="radio-d" value="м" name="pol_user" required="required">
				<span>Мужской<span></label><br>
				<label for="radio5">
				<input id="radio5" type="radio" class="radio-d" value="ж" name="pol_user" required="required">
				<span>Женский<span></label><br>
				</div>
				
				Email:<br>
				<input type="email" class="formregistr_input" placeholder="Введите email" name="email_user" required="required">
				<span id="valid_email_message" class="mesage_error"></span><br>
				
				Логин:<br>
				<input type="text" class="formregistr_input" placeholder="Введите логин" name="login_user" required="required">
				<br>
				
				Пароль:<br>
				<input type="password" class="formregistr_input" placeholder="Введите пароль" name="password_user" required="required">
				<span id="valid_password_message" class="mesage_error"></span><br>
				
				Телефон:<br>
				<input type="text" class="formregistr_input" placeholder="Введите телефон" name="tel_user" required="required"><br>
				
				Дата рождения:<br>
				<input type="date" class="formregistr_input" placeholder="Введите дату рождения" name="bday_user" required="required"><br>
				<br>
				<div class="button_container">
				<button type="submit" name="btn_submit_register" class="formauth_button" value="registration">РЕГИСТРАЦИЯ</button>
				<button type="reset" name="btn_reset_register" class="formauth_button" value="reset">СБРОСИТЬ</button>
				</div>
            </form>
        </div>
<?php
    }else{
?>
        <div id="link_logout">
            <h3 class="logout-title">Вы уже зарегистрированы и авторизованы!</h3>
        </div>
<?php
    }
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
			<a href="#" class="scrollup">Наверх</a>		
			</div>	
			<footer class="footer">
				<div class="some-container">
					<div class="footer-menu">
					<div class="footer-block">
					<div class="bottom-menu-header">
						<a href="index.html"><h3>Театрал</h3></a>
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