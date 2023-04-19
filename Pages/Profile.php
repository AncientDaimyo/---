<?php session_start()?>
<head>
  <meta charset="utf-8" />
  <title>Профиль</title>
  <link rel="stylesheet" href="www/style.css" />
</head>
<body>
    <header>
        <a href="/pages/main.php">Главная</a>
    </header>
    <main>
      <?php
        if (isset($_SESSION["username"])) echo "Name: " . $_SESSION["username"] . "<br>";
        if (isset($_SESSION["email"])) echo "Email: " . $_SESSION["email"] . "<br>";
        if (isset($_SESSION["phonenumber"])) echo "NamPhone number: " . $_SESSION["phonenumber"] . "<br>";
      ?>
      <form action="/changeprofile.php" method="post">
        <input type="text" name="username" placeholder="Новое имя"/>
        <input type="submit" value="Изменить имя"/>
      </form>
      <form action="/changeprofile.php" method="post">
        <input type="text" name="email" placeholder="Новый email"/>
        <input type="submit" value="ЗИзменить email"/>
      </form>
      <form action="/changeprofile.php" method="post">
        <input type="text" name="phonenumber" placeholder="Новый номер телефона"/>
        <input type="submit" value="Изменить номер телефона"/>
      </form>
      <form action="/changeprofile.php" method="post">
        <input type="text" name="upassword" placeholder="Новый пароль"/>
        <input type="submit" value="Изменить пароль"/>
      </form>
    </main>
    <footer></footer>
</body>
</html>