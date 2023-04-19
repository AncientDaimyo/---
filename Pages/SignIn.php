<head>
  <meta charset="utf-8" />
  <title>Вход</title>
  <link rel="stylesheet" href="www/style.css" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <header>
        <a href="/pages/main.php">Главная</a>
    </header>
    <main>
        <form action="/signin-controller.php" method="post">
            <input type="text" name="login" placeholder="Логин"/>
            <input type="text" name="password" placeholder="Пароль"/>
            <div class="g-recaptcha" data-sitekey="key"></div>
            <input type="submit" value="Вход"/>
        </form>
    </main>
    <footer></footer>
</body>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

</html>