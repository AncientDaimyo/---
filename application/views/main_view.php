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
        <?php if (!isset($_SESSION["username"])) { ?>
        <a class="button-link" href="/signin">
            <div class="button">
                <p class="header-text">Вход</p>
            </div>
        </a>
        <a class="button-link" href="/signup">
            <div class="button">
                <p class="header-text">Регистрация</p>
            </div>
        </a>
        <?php } ?>
        <?php if (isset($_SESSION["username"])) { ?>
            <a class="button-link" href="/profile">
                <div class="button">
                    <p class="header-text">Профиль</p>
                </div>
            </a>
        <?php } ?>    
    </div>
</header>
<main>
    <div class="main-block l">
        <p class="text">Кем бы ты ни был, кем бы ты не стал, помни, где ты был и кем ты стал.</p>
    </div>
    <div class="main-block r">
        <p class="text">Лучше быть последним — первым, чем первым — последним.</p>
    </div>
    <div class="main-block l">
        <p class="text">Если волк молчит то лучше его – Не перебивать.</p>
    </div>
    <div class="main-block r">
        <p class="text">Это не у меня нет девчонки, это ни у одной девчонки нет меня.</p>
    </div>
    <div class="main-block l">
        <p class="text">Главное не иметь образ льва, а обладать силой волка.</p>
    </div>
    <div class="main-block r">
        <p class="text">Если волк молчит то лучше его не перебивать.</p>
    </div>
    <div class="main-block l">
        <p class="text">На случай, если буду нужен, то я там же, где и был, когда был не нужен</p>
    </div>
</main>
<footer>
</footer>

