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
	<body id="top" background="../images/oboi11.jpg">
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
					<h3 class="theaters-title1">Пять историй про любовь</h3>
					<img class="theater-img" src="../images/5story.jpg" alt="Пять историй про любовь" title="Пять историй про любовь">
					
					
					<?php

$sql = "SELECT name_perf, name_genre, dir_perf, name_theater, id_perf FROM `afisha` WHERE (((id_perf)=9));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?><p class="desc-theater-info"><?=$row["name_perf"]?></p>
		<p class="desc-theater-info"><?=$row["name_genre"]?></p>
		<p class="desc-theater-info">Режиссер: 
		<a class="contacts-link" href="#"><?=$row["dir_perf"]?></a></p>
		<p class="desc-theater-info"><a class="contacts-link" href="#"><?=$row["name_theater"]?></a></p>
		<?php
}
} else {
	echo "0 results";
} 
$mysqli->close();
?>
					
					<p class="paragraph desc-theater">Описание постановки взято на официальном сайте.</p>
					
					<p class="paragraph desc-theater">Пять школьных сочинений, пять уроков взросления, пять историй о том, 
					что все мы пришли в этот мир ненадолго, что счастье неопределенно и недостижимо, что потери и разочарования неизбежны и что у нас, 
					по большому счету, ничего нет, кроме нас самих – только любовь, тепло и участие друг в друге.

</p>
					<p class="paragraph desc-theater">«В любви надо признаваться!» — говорит Лене ее Мама. 
					Это главный урок, который мы должны успеть усвоить вместе с героями спектакля…</p>
					<p class="paragraph desc-theater">Пьеса Елены Исаевой «Про мою маму и про меня» стала победителем 
					первого драматургического конкурса «Действующие лица».</p><br>
										
					</div>
					<div class="gallery-img">
					<div class="cssSlider">
	<ul class="slides">
		<li id="slide1"><img src="../images/g-img1.jpg" alt="" /></li>
		<li id="slide2"><img src="../images/g-img2.jpg" alt="" /></li>
		<li id="slide3"><img src="../images/g-img3.jpg" alt="" /></li>
		<li id="slide4"><img src="../images/g-img4.jpg" alt="" /></li>
		<li id="slide5"><img src="../images/g-img5.jpg" alt="" /></li>
	</ul>
	<ul class="thumbnails">
		<li><a href="#slide1"><img src="../images/g-img1.jpg" /></a></li>
		<li><a href="#slide2"><img src="../images/g-img2.jpg" /></a></li>
		<li><a href="#slide3"><img src="../images/g-img3.jpg" /></a></li>
		<li><a href="#slide4"><img src="../images/g-img4.jpg" /></a></li>
		<li><a href="#slide5"><img src="../images/g-img5.jpg" /></a></li>
	</ul>
</div>
					</div>
					<br><br>
					<div class="table-r-container">
					<table class="table-r">
		<tbody>
		<tr>
		<td>Режиссер</td>
		<td>Татьяна Воронина</td>
		</tr>
		<tr>
		<td>Художник</td>
		<td>Георгий Пашин</td>
		</tr>
		<tr>
		<td>Балетмейстер</td>
		<td>Олег Зимин</td>
		</tr>
		<tr>
		<td>Художник по свету</td>
		<td>Андрей Ничипор</td>
		</tr>
		<tr>
		<td>Зав. труппой</td>
		<td>Алла Новгородова</td>
		</tr>
		</tbody>
		</table>
					<br>
					<table class="table-r">
		<thead>
		<tr>
		<th colspan="2">ДЕЙСТВУЮЩИЕ ЛИЦА И ИСПОЛНИТЕЛИ</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td>Лена маленькая</td>
		<td>Олеся Линькова, Кристина Якунина</td>
		</tr>
		<tr>
		<td>Лена большая</td>
		<td>Анна Васильева, Оксана Сырцова</td>
		</tr>
		<tr>
		<td>Мама</td>
		<td>Марина Конюшко</td>
		</tr>
		<tr>
		<td>Женщина (Учительница, мама Ленки Домблянкиной, жена Фили,Зинка, тетя Галя, Ленка Горбей и др.)</td>
		<td>Татьяна Кондратьева</td>
		</tr>
		<tr>
		<td>Баба Рая (Дама из Министерства, Рая, мама Кати, Юлька)</td>
		<td>Анастасия Резункова</td>
		</tr>
		<tr>
		<td>Мужчина (Филя, командующий армией, Петр Троян, Игоряшка)</td>
		<td>Владимир Шабельников, Максим Крупский</td>
		</tr>
		<tr>
		<td>Парень (Женя, Леша, Игоряшка в детстве, Сережа)</td>
		<td>Иван Байкалов</td>
		</tr>
		<tr>
		<td>Оркестрик</td>
		<td>Виктор Кренделев, Сергей Линьков, Элина Тимковская</td>
		</tr>
		</tbody>
		</table>
		<br>
					</div>
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