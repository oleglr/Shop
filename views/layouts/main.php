<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин ноутбуков</title>
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" media="all"/>
<!--    <script src="js/jquery.js"></script>-->
</head>
<body>
<div id="container">
    <header>
        <div class="logotip">
            <a href='/'><img src="/assets/images/main/logotip.png" alt="Логотип сайта" title="Магазин ноутбуков"></a>
        </div>
    </header>
<!--    --><?//
//    if(isset($_SESSION[basket])) {
//        echo "<h3 class=\"basket\">Корзина: <span class=\"basket-items\"><a href='basket.php'><u>Просмотреть товары</u></a></span></h3>";
//    }else{
//        echo "<h3 class=\"basket\">Корзина: <span class=\"basket-items\">Корзина пуста</span></h3>";
//    }
//    ?>
    <div class="leftblock">
        <nav>
            <div class="menu">
                <ul>
                    <li><a href="/" class="active">Главная</a></li>
                    <li><a href="/product">Каталог</a></li>
                    <li><a href="/guestbook">Отзывы</a></li>
                    <li><a href="/gallery">Фото</a></li>
                    <li><a href="/contact">Контакты</a></li>
                    <li><a href='/auth/login'><u>Войти</u></a></li>
                    <li><a href='/auth/signup'><u>Регистрация</u></a></li>

<!--                    --><?php
//                    if(isset($_SESSION[login]) && isset($_SESSION[pass])) {
//                        echo "<li><a href='login.php?action=profile'><u>Личный кабинет</u></a></li>";
//                        echo "<li><a href='login.php?action=logout'><u>Выйти</u> </a>($_SESSION[login])</li>";
//                    }else{
//                        echo "<li><a href='login.php'><u>Войти</u></a></li>";
//                        echo "<li><a href='reg.php'><u>Регистрация</u></a></li>";
//                    }
//                    if(isset($_SESSION[login]) && isset($_SESSION[pass]) && $_SESSION[login] == 'admin') {
//                        ?>
<!--                        <li><a href="../admin/">Админка</a></li>-->
<!--                    --><?//}?>
                </ul>
            </div>
        </nav>
    </div>
    <div class="content">
        <h1>Интернет-магазин ноутбуков</h1>
        <hr>
        <?=$content?>
    </div>
    <footer>
        <p>&copy; Интернет-магазин написан в ознакомительных целях.</p>
    </footer>
</div>
</body>
</html>