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
  <div>
    <p style="color:white;">
      <?php
        if (isset($_SESSION["username"])) echo "Имя: " . $_SESSION["username"] . "<br>";
        if (isset($_SESSION["email"])) echo "Email: " . $_SESSION["email"] . "<br>";
        if (isset($_SESSION["phonenumber"])) echo "Номер телефона: " . $_SESSION["phonenumber"] . "<br>";
    
      ?>
    </p>
  </div>
  <form action="/profile/logout" method="post">
    <input class="input-button" type="submit" value="Выйти"/>
  </form>
  <p style="color:white;">
    <?php 
    if(isset($_SESSION['flash_message'])) {
        echo $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
    } 
    ?>
    </p>
  <form class="login-form" action="/profile/change_name" method="post">
    <input class="input" type="text" name="username" placeholder="Новое имя"/>
    <input class="input-button" type="submit" value="Изменить имя"/>
  </form>
  <form class="login-form" action="/profile/change_email" method="post">
    <input class="input" type="text" name="email" placeholder="Новый email"/>
    <input class="input-button" type="submit" value="ЗИзменить email"/>
  </form>
  <form class="login-form" action="/profile/change_phonenumber" method="post">
    <input class="input" type="text" name="phonenumber" placeholder="Новый номер телефона"/>
    <input class="input-button" type="submit" value="Изменить номер телефона"/>
  </form>
  <form class="login-form" action="/profile/change_password" method="post">
    <input class="input" type="text" name="password" placeholder="Новый пароль"/>
    <input class="input-button" type="submit" value="Изменить пароль"/>
  </form>
</main>
<footer>
</footer>
