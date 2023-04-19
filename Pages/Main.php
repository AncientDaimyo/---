<?php session_start()?>
<head>
  <meta charset="utf-8" />
  <title>Главная</title>
  <link rel="stylesheet" href="www/style.css" />
</head>
<body>
    <header><a href="/pages/main.php">Главная</a></header>
    <main>
        <?php if (!isset($_SESSION["username"])) { ?>
        <a class="button-link" href="/pages/signin.php">
            <div class="button">
                <b>Вход</b>
            </div>
        </a>
        <a class="button-link" href="/pages/signup.php">
            <div class="button">
                <b>Регистрация</b>
            </div>
        </a>
        <?php } ?>
        <?php if (isset($_SESSION["username"])) { ?>
            <a class="button-link" href="/pages/profile.php">
                <div class="button">
                    <b>Профиль</b>
                </div>
            </a>
            <a href="/exit.php">Выйти</a>
        <?php } ?>
    </main>
    <footer></footer>
</body>
</html>
