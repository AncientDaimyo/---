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
    <form class="login-form" action="/signup/registration" method="post">
        <p style="color:white;">
            <?php 
                if(isset($_SESSION['flash_message'])) {
                    echo $_SESSION['flash_message'];
                    unset($_SESSION['flash_message']);
                } 
            ?>
        </p>
        <input class="input" type="text" name="username" placeholder="Имя"/>
        <input class="input" type="text" name="email" placeholder="Email"/>
        <input class="input" type="text" name="phonenumber" placeholder="Телефон"/>
        <input class="input" type="password" name="password" placeholder="Пароль"/>
        <input class="input" type="password" name="password_ash"placeholder="Повторите пароль"/>
        <input class="input-button" type="submit" value="Зарегистрироваться"/>
    </form>
</main>
<footer>
</footer>
