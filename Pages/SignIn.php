<?php 
  session_start();
  require_once "paths.php"
?>
<head>
  <meta charset="utf-8" />
  <title>Вход</title>
  <link rel="stylesheet" href="<?php echo $rmBrowserStyle?>" />
  <link rel="stylesheet" href="<?php echo $mainStylePath?>" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
<header>
        <div class="header-block left">
            <a class="button-link" href="/pages/main.php">
                <div class="button">
                    <p class="header-text">Главная</p>
                </div>
            </a>
        </div>
        <div class="header-block center">
            
        </div>
        <div class="header-block right">
               
        </div>
    </header>
    <main>
        <form class="login-form" action="/signin-controller.php" method="post">
            <p style="color:white;">
            <?php 
            if(isset($_SESSION['flash_message'])) {
                echo $_SESSION['flash_message'];
                unset($_SESSION['flash_message']);
            } 
            ?>
            </p>
            <input type="text" name="login" class="input" placeholder="Логин"/>
            <input type="password" name="password" class="input" placeholder="Пароль"/>
            <div class="g-recaptcha" data-sitekey="key"></div>
            <input type="submit" class="input-button" value="Вход"/>
        </form>
    </main>
    <footer></footer>
</body>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

</html>