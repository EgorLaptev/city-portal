<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="http://wsrq/">Главная</a></li>
                <li><a href="register.php">Зарегистрироваться</a></li>
                <li><a href="login.php">Войти</a></li>
                <?php if(!empty($_SESSION['login'])) : ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <?= $_SESSION['login'] ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="list.html">Мои заявки</a></li>
                        <li><a href="new.html">Новая заявка</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Выход</a></li>
                    </ul>
                </li>
                <?php endif ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
