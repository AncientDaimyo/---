<head>
  <meta charset="utf-8" />
  <title>Регистрация</title>
  <link rel="stylesheet" href="www/style.css" />
</head>
<body>
    <header>
        <a href="/pages/main.php">Главная</a>
    </header>
    <main>
        <form action="/signup-controller.php" method="post">
            <input type="text" name="username" placeholder="Имя"/>
            <input type="text" name="email" placeholder="Email"/>
            <input type="text" name="phoneNumber" placeholder="Телефон"/>
            <input type="password" name="password" placeholder="Пароль"/>
            <input type="password" name="passwordAsh"placeholder="Повторите пароль"/>
            <input type="submit" value="Зарегистрироваться"/>
        </form>
    </main>
    <footer></footer>
</body>
</html>