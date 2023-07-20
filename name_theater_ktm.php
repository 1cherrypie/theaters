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
					<h3 class="theaters-title">КТМ</h3>
					<img class="theater-img" src="../images/kmt.png" alt="Камерный театр Малыщицкого" title="Камерный театр Малыщицкого">
					
					
					<?php

$sql = "SELECT name_theater, address_theater, tel_theater, site_theater, id_theater FROM `theaters` WHERE (((id_theater)=1));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?><p class="desc-theater-info"><?=$row["name_theater"]?></p>
		<p class="desc-theater-info"><?=$row["address_theater"]?></p>
		<p class="desc-theater-info" style="color:#FF0000">м. Чернышевская</p>
		<p class="desc-theater-info">Телефон:<br><?=$row["tel_theater"]?> | 88129811656</p>
		<p class="desc-theater-info">Сайт:
		<br><a class="contacts-link" href="https://www.vmtheatre.ru/"><?=$row["site_theater"]?></a></p>
		<p class="desc-theater-info">Код театра: <?=$row["id_theater"]?></p>
		<?php
}
} else {
	echo "0 results";
} 
$mysqli->close();
?>
					
					<p class="paragraph desc-theater">Описание театра взято с официального сайта. 
					<br>Ну а где же ещё мне его брать?
					<br>Придумывать некогда</p>
					<p class="paragraph desc-theater">И ещё. Зацените, какая у меня буквица красивешная :3</p>
					
					<p class="paragraph desc-theater">Камерный театр Малыщицкого (КТМ) был основан в 1989 году 
					и носит имя своего создателя — В. А. Малыщицкого (1940-2008 гг.), 
					подвижника, режиссера и педагога, основавшего в нашем городе несколько театров. 
					Он был бескомпромиссным режиссером, который говорил со зрителями современным, ясным языком.</p>
					<p class="paragraph desc-theater">В настоящий момент КТМ значимая единица на театральной карте города. 
					Спектакли нашего театра известны как профессиональному сообществу, так и широкой аудитории. 
					КТМ – уникален не только для Петербурга, но и для всей страны. 
					В нем осуществляются первые постановки пьес современных драматургов, а классические тексты обретают новое звучание. 
					На площадке театра проходила лаборатория, в рамках которой молодые режиссеры представили эскизы по пьесам современных драматургов. 
					Наш театр поддерживают Союз театральных деятелей РФ, Комитет по культуре Санкт-Петербурга, 
					Министерство культуры РФ – на выигранные гранты театр осуществляет постановки новых спектаклей.</p>
					<p class="paragraph desc-theater">Спектакли режиссёра П. Ю. Шерешевского принимают участие в российских и международных театральных фестивалях. 
					Работы Петра Юрьевича, созданные им в разных городах, регулярно номинируются на Российскую национальную театральную премию «Золотая Маска».</p>
					<p class="paragraph desc-theater">Спектакли Камерного театра Малыщицкого ежегодно отмечаются критическими статьями, и профессиональными наградами.</p>
					
					</div>
					<div class="map-kassa">
					
					<script type="text/javascript" charset="utf-8" 
					async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5f42f432f794f4989f417c7aa980647701f2135a2182c804772a39c4c698881b&amp;width=993&amp;height=410&amp;lang=ru_RU&amp;scroll=true">
					</script>
					
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