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
					<h3 class="theaters-title">Сидельников Андрей</h3>
					<img class="theater-img" src="../images/direct-sb1.jpg" alt="Сидельников Андрей" title="Сидельников Андрей" width="300px">
										
					<?php

$sql = "SELECT lastname_empl, fisrtname_empl, middlename_empl, bday_empl, email_empl, tel_empl, id_empl FROM `employees` WHERE (((id_empl)=2));";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

        ?><p class="desc-theater-info"><?=$row["lastname_empl"]?> <?=$row["fisrtname_empl"]?> <?=$row["middlename_empl"]?></p>
		<p class="desc-theater-info"><?=$row["bday_empl"]?></p>
		<p class="desc-theater-info"><?=$row["email_empl"]?></p>
		<p class="desc-theater-info">Телефон:<br><?=$row["tel_empl"]?></p>
		<p class="desc-theater-info"><a href="name_theater_ktm.php" class="contacts-link">Театр "Суббота"</a></p>
		<?php
}
} else {
	echo "0 results";
} 
$mysqli->close();
?>
					<h4 class="contacts-paragraph">Главный режиссер театра "Суббота"</h4>
					<p class="paragraph desc-theater">
					Родился в 1973 г.</p>
<p class="paragraph desc-theater">					
В 1997 г. окончил Санкт-Петербургскую государственную академию культуры по специальности «Режиссура драмы» (мастерская Г. А. Кустова), 
в 2009 г. — Театральный институт им. Б. Щукина в Москве (мастерская М. Б. Борисова) по специальности режиссер драматического театра. 
С 1997 по 2011 гг. актер петербургских театров. Играл в спектаклях: М. Левшина, А. Сагальчика, А. Галибина, Г. Козлова, С. Спивака и др. 
Организатор и участник русско-немецкой театральной лаборатории импровизаций «Teatr-05» (2004).
					</p>
					<p class="paragraph desc-theater">
					С 2011 по 2019 гг. — режиссер-постановщик театра «На Литейном» (Санкт-Петербург).
					</p>
					<p class="paragraph desc-theater">
					В 2013-2016 гг. — главный режиссёр Иркутского областного ТЮЗа им. А. Вампилова.
					</p>
					<p class="paragraph desc-theater">
					В 2013 году прошел обучение в Школе театрального лидера в Центре им. Вс. Мейерхольда (Москва). 
					Окончил курс повышения квалификации «Искусство инсценирования» под руководством Н. С. Скороход в 
					Российском государственном институте сценических искусств в 2018 г.
					</p>
					<p class="paragraph desc-theater">
					В 2016 г. преподавал курс актерской импровизации в Школе-студии МХАТ (мастерская Дмитрия Брусникина).
					</p>
					<p class="paragraph desc-theater">
					С 2017 г. преподает тренинги по актерской импровизации в РГИСИ (мастерская Руслана Кудашова).
					</p>
					<p class="paragraph desc-theater">
					Координатор Международного конкурса коротких пьес  «Stories» в театре «Суббота».
					</p>
					<p class="paragraph desc-theater">
					Постановщик более 20 спектаклей в С.-Петербурге и других городах России.
					</p>
					<p class="paragraph desc-theater">
					С 2019 — главный режиссер театра. 
					В театре «Суббота» поставил спектакли: «#ПРОЩАЙИЮНЬ» (2016), 
					«Офелия боится воды» (2017), «Ревизор» (2018), «Лёха» (2019), «Вещь» (2020).
					</p>
					<br>
					<h4 class="contacts-paragraph">НАГРАДЫ И ПРЕМИИ:</h4>
					<p class="paragraph desc-theater">
					«Лучший режиссер» Международный молодежный форум «Март.Контакт» 
					за  спектакль «Митина любовь» театра «На Литейном», 2014.
					</p>
					<p class="paragraph desc-theater">
					«Лучший спектакль о любви» Международного театрального фестиваля «Встречи на Театральной» 
					за спектакль «#ПрощайИюнь» театра «Суббота», 2016.
					</p>
					<p class="paragraph desc-theater">
					«Лучший режиссер» приз С.-Петербургского общества «Театрал» 
					за спектакли «Ревизор» в театре «Суббота» и «Человек из Подольска» в театре «На Литейном», 2019.
					</p>
					<p class="paragraph desc-theater">
					Благодарность Законодательного собрания Ленинградской области 
					«За многолетний творческий труд, профессионализм и большой вклад в развитие театрального искусства» (2019 г.).
					</p>
					<p class="paragraph desc-theater">
					В 2019 г. в составе творческого коллектива театра «Суббота» получил Благодарность Губернатора Санкт-Петербурга 
					«За создание спектакля “Ревизор” по пьесе Н. В. Гоголя».
					</p>
					<p class="paragraph desc-theater">
					«#ПрощайИюнь» — лауреат фестиваля «Русская комедия» (Ростов-на-Дону, 2019 г.).
					</p>
					<p class="paragraph desc-theater">
					Лонг-лист Российской национальной премии «Золотая маска» и участник программы «Маска плюс» 
					со спектаклем «Ревизор» в театре «Суббота», 2019, 2020.
					</p>
					<p class="paragraph desc-theater">
					«Лёха» — лауреат премии «Золотой софит» 2020 г. в номинации «Лучший спектакль малой формы» 2020.
					</p>
					<p class="paragraph desc-theater">
					Лонг-лист Российской национальной премии «Золотая маска», спектакль «Лёха» 2021.
					</p>
					<br>
					<h4 class="contacts-paragraph">РЕЖИССЕРСКИЕ РАБОТЫ:</h4>
					<p class="paragraph desc-theater">
					2021<br>«Ты, я и правда» по пьесе Ф. Зеллера «Правда». Санкт-Петербургский театр Комедии им. Н. П. Акимова.
					</p>
					<p class="paragraph desc-theater">
					2020<br>«Вещь» по «Бесприданнице» А. Н. Островского. Санкт-Петербургский театр «Суббота».
					</p>
					<p class="paragraph desc-theater">
					2019<br>«Лёха» Ю. Поспелова. Санкт-Петербургский театр «Суббота».<br>
«Новогодние вверх тормашки» по мотивам пьесы К. Драгунской. Ростовский академический театр драмы им. М. Горького.<br>
«Пиковая дама» по повести А. С. Пушкина. Новокузнецкий драматический театр.<br>
«Чиполлино» мюзикл по мотивам сказки Д. Родари. Чехов-Центр (Южно-Сахалинск).
					</p>
					<p class="paragraph desc-theater">
					2018<br>
«Новогодние приключения Маши и Вити» П. Финн. Ростовский театр драмы им. М. Горького (Ростов-на-Дону).<br>
«Человек из Подольска» Д. Данилов. Театр «На Литейном» (С.-Петербург).<br>
«Алиса в стране чудес. Сказки под шатром» Л. Кэрролл. Театр «На Литейном» (С.-Петербург).<br>
«Ревизор» Н. В. Гоголь. Санкт-Петербургский театр «Суббота». Спектакль-участник программы «Маска плюс» Национального театрального фестиваля «Золотая маска» (Москва, 2020).
					</p>
					<p class="paragraph desc-theater">
					2017<br>«Путешествие Алисы» Л. Кэрролл. Новокузнецкий драматический театр.<br>
«Офелия боится воды» Ю. Тупикина. Санкт-Петербургский театр «Суббота».<br>
«Вишнёвый сад. Тишина», по мотивам пьесы А. П. Чехова. Театр «На Литейном» (С.-Петербург).
					</p>
					<p class="paragraph desc-theater">
					2016<br>«#ПРОЩАЙИЮНЬ» по лирической комедии А. Вампилова «Прощание в июне». Санкт-Петербургский театр «Суббота». 
«Лучший спектакль» Международного театрального фестиваля «Встречи на Театральной» (Рязань, 2017).<br>
«У меня есть сердце… (Когда мы были в июне)» К. Никитина. Театр «На Литейном» (С.-Петербург).
					</p>
					<p class="paragraph desc-theater">
					2015<br>«Апельсины из Марокко» В. Аксёнов. Театр «На Литейном» (С.-Петербург).<br>
«Дорогой жизни» спектакль-концерт, посвященный 70-й годовщине Победы. Театр «На Литейном» (С.-Петербург).<br>
«Семейные сцены» А. Яблонская. Иркутский ТЮЗ им. А. Вампилова.
					</p>
					<p class="paragraph desc-theater">
					2014<br>«Звездный мальчик» О. Уайльд. Иркутский ТЮЗ им. А. Вампилова.<br>
«Митина любовь» И. Бунин. Театр «На Литейном» (С.-Петербург). 
Диплом  «За хрустальную режиссуру» на Международном театральном молодежном форуме M@art-контакт  (Могилев, 2014). 
Участник фестиваля «Родниковое слово» им. Ф. Абрамова (Архангельск).
					</p>
					<p class="paragraph desc-theater">
					2013<br>«Двое бедных румын, говорящих по-польски» Д. Масловская. Черемховский драматический городской театр.
					</p>
					<p class="paragraph desc-theater">
					2012<br>«Счастливое дерево» Ш. Сильверстайн. Большой театр кукол (С.-Петербург).<br>
«Самоубийца» Н. Эрдман. Черемховский драматический городской театр.<br>
«Тайна пропавшего снега» К. Драгунская. Омский ТЮЗ.
					</p>
					<p class="paragraph desc-theater">
					2011<br>«(Самый) легкий способ бросить курить» М. Дурненков. Театр «На Литейном» (С.-Петербург).<br>
«Три мушкетера» Пьеса М. Бартенева по роману А. Дюма. Иркутский ТЮЗ им. А. Вампилова.<br>
«Побирушки» В. Шукшин. Черемховский драматический городской театр.<br>
«Добрый доктор Айболит» В. Коростелев. Хабаровский ТЮЗ.
					</p>
					<p class="paragraph desc-theater">
					2010<br>«Пантера» П. Гладилин. Новокузнецкий драматический театр.<br>
«Золушка» Е. Шварц. Иркутский ТЮЗ им. А. Вампилова.<br>
«Незнайка 2010» О. Никифорова. Хабаровский ТЮЗ.
					</p>
					<p class="paragraph desc-theater">
					2009<br>«Рождество в доме сеньора Купьелло» Э. де Филиппо. ГРДТ им. Н. А. Бестужева. (Улан-Удэ).
					</p>
					<p class="paragraph desc-theater">
					2008<br>«Чудо-цвет» В. Илюхов. ГРДТ им. Н.А. Бестужева. (Улан-Удэ).
					</p>
					<p class="paragraph desc-theater">
					2007<br>«Нельзя объять необъятное, но можно его поцеловать» К. Прутков. Театр Эстрады им. А.И. Райкина (С.-Петербург).
					</p>
					<p class="paragraph desc-theater">
Режиссер дубляжа фильмов: «Трон», «Пастырь», «Соломенные псы», «Руби Спаркс», «Семейка Крудс», «Воровка книг».
					</p>
					<br>
					<h4 class="contacts-paragraph">РОЛИ В СПЕКТАКЛЯХ:</h4>
					<h4 class="contacts-paragraph">Театр «На Литейном»</h4>
					<p class="paragraph desc-theater">Ачмианов — «Дуэль» А. Чехов. Режиссер — А. Сагальчик</p>
<p class="paragraph desc-theater">Дворовый человек — «Барышня-крестьянка» А. Пушкин. Режиссер —  А. Петров</p>
<p class="paragraph desc-theater">Монтер, Козлов — «С любимыми не расставайтесь» А. Володин. Режиссер —  А. Галибин</p>
<p class="paragraph desc-theater">Алексей Сергеевич Буланов — «Лес» А. Островский. Режиссер — Г. Козлов</p>
<p class="paragraph desc-theater">Саша-Он — «За что ты меня не любишь?» Б. Вахтин. Режиссер — С. Маламуд</p>
<p class="paragraph desc-theater">Папа Карло — «Буратино» А. Толстой. Режиссер — С. Свирко</p>
<p class="paragraph desc-theater">Рыжий клоун — «Пеппи Длинный чулок» А. Линдгрен. Режиссер — М. Левшин</p>
					<h4 class="contacts-paragraph">Театр «Комедианты»</h4>
					<p class="paragraph desc-theater">Ученик Боря — «Школьная смехопанорама» Э. Успенский. Режиссер — В. Рындин</p>
<p class="paragraph desc-theater">Жадюгин — «Волшебные сосульки» А. Макеев. Режиссер — А. Исполатов</p>
<p class="paragraph desc-theater">Федя — «Ехала деревня мимо мужика». И. Лебедева. Режиссер — А. Исполатов</p>
<p class="paragraph desc-theater">Гвардеец — «Сирано де Бержерак» Э. Ростан. Режиссер — М. Левшин</p>
<p class="paragraph desc-theater">Принц Арагонский — «Венецианский купец» У. Шекспир. Режиссер — М. Левшин</p>
<p class="paragraph desc-theater">Лауренсио — «Дурочка» Л. де Вега. Режиссер — М. Левшин</p>
<p class="paragraph desc-theater">Синьор Фрацози — «Не всякий вор грабитель» Д. Фо. Режиссер — М. Левшин</p>
					<h4 class="contacts-paragraph">Театр «Карамболь»</h4>
					<p class="paragraph desc-theater">Учитель танцев Раз-два-трис — «Три толстяка» Ю. Олеша. Режиссер — С. Спивак</p>
<p class="paragraph desc-theater">Мистер Гуд — «Мэри Поппинс, до свидания!» П. Трэверс. Режиссер — Л. Квинихидзе</p>
<p class="paragraph desc-theater">Тузенбах — «Три сестры» А. Чехов. Режиссеры — Л. Мартынова, И. Ефимов</p>
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