<?php
session_start();
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
		<div class="reviews-container">
		<h3 class="theaters-title">Театральные кассы</h3>
		<p class="paragraph pkassa">В качестве примера списка театральных касс взят список касс КАССИР РУ.</p>
		<p class="paragraph pkassa">Во всех представленных ниже кассах действуют следующие способы оплаты:</p>
		<ul class="kassa">
			<li>Банковская карта</li>
			<li>Сертификат</li>
			<li>Наличные</li>
		</ul>
		<div class="mapkassa">
		
		<script type="text/javascript" charset="utf-8" 
		async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae185cff4227463e26e1fd32542557288e2ade0185858320abfd48ddfb91052ae&amp;width=991&amp;height=425&amp;lang=ru_RU&amp;scroll=true">
		</script>
		
		</div>
		<br>
		<table class="reviews-t">
		<thead>
		<tr>
		<th>Номер</th><th>Станция метро</th><th>Адрес</th><th>График работы</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td>1</td>
		<td><p style="color:#FF0000">Чернышевская</p></td>
		<td>СПб, ул.Кирочная, д.43, литера Б музей "Оловянного солдатика"<br>
		+7(921) 992-05-06</td>
		<td>Вторник - Воскресенье: 10.00-17.00.<br>
		Понедельник: выходной.<br>
		Без перерыва.</td>
		</tr>
		<tr>
		<td>2</td>
		<td><p style="color:#FF0000">Чернышевская</p></td>
		<td>СПб, ул.Кирочная, д.43 "Музей Суворова"<br>
		+7 (812) 703-40-40</td>
		<td>Вторник - Воскресенье: 10.00-17.00.<br>
		Понедельник: выходной.<br>
		Без перерыва.</td>
		</tr>
		<tr>
		<td>3</td>
		<td><p style="color:#800080">Спортивная</p></td>
		<td>СПБ, пр. Добролюбова, д.18 СК «Юбилейный» (кассовый павильон справа от центрального входа)<br>
		+7 (931) 977-90-72</td>
		<td>Будние дни: 09.00-21.00.<br>
		Выходные дни: 09.00-21.00.<br>
		Перерыв: 14.00-15.00.</td>
		</tr>
		<tr>
		<td>4</td>
		<td><p style="color:#008000">Маяковская</p></td>
		<td>СПб, Невский пр., д.100 КЗ Колизей<br>
		+7 (931) 970-77-94</td>
		<td>Будние дни: 10.00-20.00.<br>
		Выходные дни: 10.00-20.00.<br>
		Перерыв: 15.00-16.00.</td>
		</tr>
		<tr>
		<td>5</td>
		<td><p style="color:#008000">Зенит (Новокрестовская)</p></td>
		<td>СПБ, Крестовский остров, Футбольная аллея, д.8 КСК «Сибур Арена»<br>
		+7 (921) 992-05-08</td>
		<td>Будние дни: 10.00-20.00.<br>
		Выходные и праздничные дни: 10.00-20.00.<br>
		Перерыв: 14.30-15.00.</td>
		</tr>
		<tr>
		<td>6</td>
		<td><p style="color:#800080">Садовая</p></td>
		<td>СПб, ул.Садовая д.62, литер А "Никольские ряды"<br>
		+7 (921) 638-79-63</td>
		<td>Будние дни: 10.00-22.00.<br>
		Выходные дни: 10.00-22.00.<br>
		Перерыв: 14.00-15.00.</td>
		</tr>
		</tbody>
		</table>

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