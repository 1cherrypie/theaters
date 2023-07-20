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
				<div class="content-container-theaters">
					<h3 class="theaters-title">Актеры</h3>
					<h3><a class="alphabet" href="#letter_a">А</a>
															
					<a class="alphabet" href="#letter_b">Б</a>
					<a class="alphabet" href="#letter_v">В</a>
					<a class="alphabet" href="#letter_g">Г</a>
					<a class="alphabet" href="#letter_d">Д</a>
					<a class="alphabet" href="#letter_e">Е</a>
					<a class="alphabet" href="#letter_e">Ё</a>
					<a class="alphabet" href="#letter_zh">Ж</a>
					<a class="alphabet" href="#letter_z">З</a>
					<a class="alphabet" href="#letter_i">И</a>
					<a class="alphabet" href="#letter_i">Й</a>
					<a class="alphabet" href="#letter_k">К</a>
					<a class="alphabet" href="#letter_l">Л</a>
					<a class="alphabet" href="#letter_m">М</a>
					<a class="alphabet" href="#letter_n">Н</a>
					<a class="alphabet" href="#letter_o">О</a>
					<a class="alphabet" href="#letter_p">П</a>
					<a class="alphabet" href="#letter_r">Р</a>
					<a class="alphabet" href="#letter_s">С</a>
					<a class="alphabet" href="#letter_t">Т</a>
					<a class="alphabet" href="#letter_u">У</a>
					<a class="alphabet" href="#letter_f">Ф</a>
					<a class="alphabet" href="#letter_h">Х</a>
					<a class="alphabet" href="#letter_c">Ц</a>
					<a class="alphabet" href="#letter_ch">Ч</a>
					<a class="alphabet" href="#letter_sh">Ш</a>
					<a class="alphabet" href="#letter_shch">Щ</a>
					<a class="alphabet" href="#">Ъ</a>
					<a class="alphabet" href="#">Ы</a>
					<a class="alphabet" href="#">Ь</a>
					<a class="alphabet" href="#letter_ae">Э</a>
					<a class="alphabet" href="#letter_yu">Ю</a>
					<a class="alphabet" href="#letter_ya">Я</a>
					</h3>
					
					<p id="letter_a" class="alphabet-l" href="#">А</p>
						<p><a class="alphabet-la" href="#">Арт-кафе "Подвал Бродячей собаки"</a></p>
						<p><a class="alphabet-la" href="#">Арт-центр "Чеширский кот"</a></p>
						<p><a class="alphabet-la" href="#">Театр "Аквариум"</a></p>
						
					<p id="letter_b" class="alphabet-l" href="#">Б</p>
					<p id="letter_v" class="alphabet-l" href="#">В</p>
					<p id="letter_g" class="alphabet-l" href="#">Г</p>
						<p><a class="alphabet-la" href="#">Государственный театр "Суббота"</a></p>
						<ul class="actors-list">
							<li><a class="contacts-link" href="actors_page_sb1.php">Градовских Любовь</a></li>
							<li><a class="contacts-link" href="actors_page_sb1.php">Крупский Максим</a></li>
						</ul>						
					<p id="letter_d" class="alphabet-l" href="#">Д</p>
						<p><a class="alphabet-la" href="#">Детский театр кукол "Ассорти-клуб" на Шаумяна</a></p>
	
					<p><a class="alphabet-la" href="#">Какой-нибудь театр</a></p>
					
					<p id="letter_e" class="alphabet-l" href="#">Е/Ё</p>
					<p id="letter_zh" class="alphabet-l" href="#">Ж</p>
					<p id="letter_z" class="alphabet-l" href="#">З</p>
						<p><a class="alphabet-la" href="#">Театр "За Чёрной речкой"</a></p>
					<p id="letter_i" class="alphabet-l" href="#">И/Й</p>
					<p id="letter_k" class="alphabet-l" href="#">К</p>
						<p><a class="alphabet-la" href="#">Камерный драматический театр "Левендаль"</a></p>
						<p><a class="alphabet-la" href="#">Камерный музыкальный театр "Санктъ-Петербургъ Опера"</a></p>
						<p><a class="alphabet-la" href="name_theater_ktm.php">КТМ (Камерный театр Малыщицкого)</a></p>
						<ul class="actors-list">
							<li><a class="contacts-link" href="actors_page_sb1.php">Вишня Наталья</a></li>
							<li><a class="contacts-link" href="actors_page_sb1.php">Худяков Александр</a></li>
						</ul>	
						<p><a class="alphabet-la" href="#">Камерная сцена Городского театра</a></p>
						<p><a class="alphabet-la" href="#">Камерная сцена Театра на Васильевском</a></p>
						<p><a class="alphabet-la" href="#">Театр "Круг"</a></p>
						<p><a class="alphabet-la" href="#">Театр "Кукольный формат" (KUKFO)</a></p>
						
						
						
					<p id="letter_l" class="alphabet-l" href="#">Л</p>
					<p id="letter_m" class="alphabet-l" href="#">М</p>
						<p><a class="alphabet-la" href="#">Международный театральный центр "Лёгкие люди"</a></p>
					<p id="letter_n" class="alphabet-l" href="#">Н</p>
					<p id="letter_o" class="alphabet-l" href="#">О</p>
						<p><a class="alphabet-la" href="#">Театр "Особняк"</a></p>
					<p id="letter_p" class="alphabet-l" href="#">П</p>
						<p><a class="alphabet-la" href="#">Площадка "Мастерская Нашего театра" (Подвал Нашего театра)</a></p>
						<p><a class="alphabet-la" href="#">Пространство "Скороход"</a></p>
					
					<p id="letter_r" class="alphabet-l" href="#">Р</p>
						<p><a class="alphabet-la" href="#">Русский психологический Театр "Ноосфера"</a></p>
					
					<p id="letter_s" class="alphabet-l" href="#">С</p>
						
					<p id="letter_t" class="alphabet-l" href="#">Т</p>
						<p><a class="alphabet-la" href="#">Театр Karlsson Haus на Ломоносова</a></p>
						<p><a class="alphabet-la" href="#">Театр Karlsson Haus на Фонтанке</a></p>
						<p><a class="alphabet-la" href="#">Театр Karlsson Haus на Фурштатской</a></p>
						<p><a class="alphabet-la" href="#">Театр Дождей</a></p>
						<p><a class="alphabet-la" href="#">Творческое объединение "ТриЧетыре"</a></p>
						<p><a class="alphabet-la" href="#">Театр Поколений имени З. Я. Корогодского</a></p>
						<p><a class="alphabet-la" href="#">Театральное пространство "Точка"</a></p>
						<p><a class="alphabet-la" href="#">Театр Романса на Мойке</a></p>
						<p><a class="alphabet-la" href="#">Театр Фантастики</a></p>
						
					<p id="letter_u" class="alphabet-l" href="#">У</p>
					<p id="letter_f" class="alphabet-l" href="#">Ф</p>
					<p id="letter_h" class="alphabet-l" href="#">Х</p>
					<p id="letter_c" class="alphabet-l" href="#">Ц</p>
						<p><a class="alphabet-la" href="#">Театр "ЦЕХЪ"</a></p>
					<p id="letter_ch" class="alphabet-l" href="#">Ч</p>
					<p id="letter_sh" class="alphabet-l" href="#">Ш</p>
					<p id="letter_shch" class="alphabet-l" href="#">Щ</p>
					<p id="letter_ae" class="alphabet-l" href="#">Э</p>
					<p id="letter_yu" class="alphabet-l" href="#">Ю</p>
					<p id="letter_ya" class="alphabet-l" href="#">Я</p>
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