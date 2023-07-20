<?php
session_start();
include "dbconnect.php";
?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Театрал</title>
		<link rel="stylesheet" href="css_style1.css">
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
	<body id="top" background="../images/oboi8.jpg">
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
				<br>
				<section class="section-text">
					<p class="paragraph">Добро пожаловать на учебный сайт!</p>
					<p class="paragraph">Здесь Вы можете узнать что-нибудь о камерных театрах Санкт-Петербурга.</p>
				</section>
				<br>
				<div class="content-container">
				
				
				<?php

$sql = "SELECT name_perf, start_date, name_theater, id_perf FROM `afisha` WHERE (((id_perf)=5));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?>
		
				<div class="postanovka">
					<img class="afisha-img" src="../images/ktm.png" href="perf_page_5stories.php" alt="Заводной апельсин" title="Заводной апельсин">
					<div class="postanovka-list">
						<h3 href="perf_page_5stories.php"><?=$row["name_perf"]?></h3>
						<h4><?=$row["start_date"]?></h4>
						<h4><?=$row["name_theater"]?></h4>
							<span class="price">От 450 ₽</span>
							<a href="perf_page_5stories.php" class="button">Подробнее</a>
					</div>
				</div>
		
		
		<?php
}
} else {
	echo "0 results";
} 
?>
				<?php

$sql = "SELECT name_perf, start_date, name_theater FROM `afisha` WHERE (((id_perf)=6));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?>
		
				<div class="postanovka">
					<img class="afisha-img" src="../images/Marevo1.jpg" href="perf_page_5stories.php" alt="Марево любви" title="Марево любви">
					<div class="postanovka-list">
						<h3 href="perf_page_5stories.php"><?=$row["name_perf"]?></h3>
						<h4><?=$row["start_date"]?></h4>
						<h4><?=$row["name_theater"]?></h4>
							<span class="price">От 400 ₽</span>
							<a href="perf_page_5stories.php" class="button">Подробнее</a>
					</div>
				</div>
		
		
		<?php
}
} else {
	echo "0 results";
} 
?>
				
				<?php

$sql = "SELECT name_perf, start_date, name_theater FROM `afisha` WHERE (((id_perf)=7));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?>
		
				<div class="postanovka">
					<img class="afisha-img" src="../images/goodbyejune1.jpg" href="perf_page_5stories.php" alt="ПРОЩАЙИЮНЬ" title="ПРОЩАЙИЮНЬ">
					<div class="postanovka-list">
						<h3 href="perf_page_5stories.php"><?=$row["name_perf"]?></h3>
						<h4><?=$row["start_date"]?></h4>
						<h4><?=$row["name_theater"]?></h4>
							<span class="price">От 400 ₽</span>
							<a href="perf_page_5stories.php" class="button">Подробнее</a>
					</div>
				</div>
		
		<?php
}
} else {
	echo "0 results";
} 
?>
				
				<?php

$sql = "SELECT name_perf, start_date, name_theater FROM `afisha` WHERE (((id_perf)=8));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?>
		
				<div class="postanovka">
					<img class="afisha-img" src="../images/Vesch1.jpg" href="perf_page_5stories.php" alt="Вещь" title="Вещь">
					<div class="postanovka-list">
						<h3 href="perf_page_5stories.php"><?=$row["name_perf"]?></h3>
						<h4><?=$row["start_date"]?></h4>
						<h4><?=$row["name_theater"]?></h4>
							<span class="price">От 400 ₽</span>
							<a href="perf_page_5stories.php" class="button">Подробнее</a>
					</div>
				</div>
		
		
		<?php
}
} else {
	echo "0 results";
} 
?>				
					
				<?php

$sql = "SELECT name_perf, start_date, name_theater FROM `afisha` WHERE (((id_perf)=9));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?>
		
				<div class="postanovka">
					<img class="afisha-img" src="../images/5story1.jpg" href="perf_page_5stories.php" alt="Пять историй про любовь" title="Пять историй про любовь">
					<div class="postanovka-list">
						<h3 href="perf_page_5stories.php"><?=$row["name_perf"]?></h3>
						<h4><?=$row["start_date"]?></h4>
						<h4><?=$row["name_theater"]?></h4>
							<span class="price">От 400 ₽</span>
							<a href="perf_page_5stories.php" class="button">Подробнее</a>
					</div>
				</div>
		
		
		<?php
}
} else {
	echo "0 results";
} 
?>
					
				<?php

$sql = "SELECT name_perf, start_date, name_theater FROM `afisha` WHERE (((id_perf)=10));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?>
		
				<div class="postanovka">
					<img class="afisha-img" src="../images/Zaziki1.jpg" href="perf_page_5stories.php" alt="Цацики идет в школу" title="Цацики идет в школу">
					<div class="postanovka-list">
						<h3 href="perf_page_5stories.php"><?=$row["name_perf"]?></h3>
						<h4><?=$row["start_date"]?></h4>
						<h4><?=$row["name_theater"]?></h4>
							<span class="price">От 400 ₽</span>
							<a href="perf_page_5stories.php" class="button">Подробнее</a>
					</div>
				</div>
		
		
		<?php
}
} else {
	echo "0 results";
} 
$mysqli->close();
?>
				
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