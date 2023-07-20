<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">

<?php
    require_once("header.php");
?>
<!-- Блок для вывода сообщений -->
    </head>
<body>
</br>
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        //Если в сессии существуют радостные сообщения, то выводим их
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
    if(!isset($_SESSION["user_email"]) && !isset($_SESSION["user_pass"])){
?>
        <div id="form_register">
            <div id=titreg>Форма регистрации</div>
 
            <form action="register.php" method="post" name="form_register">
                <div class="container">
                    <table>
                        <tbody><tr>
                            <td> Имя: </td>
                            <td>
                                <input type="text" name="username" required="required">
                            </td>
                        </tr>
     
                        <tr>
                            <td> Фамилия: </td>
                            <td>
                                <input type="text" name="user_surname" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td> Логин: </td>
                            <td>
                                <input type="text" name="user_login" required="required">
                            </td>
                        </tr>
                        
                        <tr>
                            <td> Email: </td>
                            <td>
                                <input type="email" name="user_email" required="required"><br>
                                <span id="valid_email_message" class="mesage_error"></span>
                            </td>
                        </tr>
                  
                        <tr>
                            <td> Пароль: </td>
                            <td>
                                <input type="password" name="user_pass" placeholder="минимум 6 символов" required="required"><br>
                                <span id="valid_password_message" class="mesage_error"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </form>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>

<br>
<?php
    }
     
    //Подключение подвала
    require_once("footer.php");
?>

</body>
</html>