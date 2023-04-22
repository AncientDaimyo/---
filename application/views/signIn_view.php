<header>
    <div class="header-block left">
        <a class="button-link" href="/main">
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
    <form class="login-form" action="/signin/auth" method="post">
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
        <!-- <div class="g-recaptcha" data-sitekey="key"></div> -->
        <input type="submit" class="input-button" value="Вход"/>
    </form>
</main>
<footer>
</footer

