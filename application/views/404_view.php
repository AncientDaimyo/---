<header>
  <a class="button-link" href="/main">
    <div class="button">
        <p class="header-text">Главная</p>
    </div>
  </a>
</header>
<main>
    <p class="text">Страница не существует!</p>
    <p style="color:white;">
      <?php 
      if(isset($_SESSION['flash_message'])) {
          echo $_SESSION['flash_message'];
          unset($_SESSION['flash_message']);
      } 
      ?>
    </p>
</main>
<footer></footer>

