<section class="login">
    <div class="indent container">

        <div class="tabs_login">
            <div class="tabs">
                <div class="tab active">Вход</div>
                <div class="tab">Регистрация</div>
            </div>
            
            <div class="tab_content active">
                <h2>Вход</h2>
                <form action="handlers/enter.php" method="POST">
                    <input type="text" name="login" placeholder="Логин">
                    <input type="password" name="password" placeholder="Пароль">
                    <button class="button">Войти</button>
                </form>
            </div>
            <div class="tab_content">
                <h2>Регистрация</h2>
                <!-- добавили файл обработки формы reg.php в папке handlers -->
                <form action="handlers/reg.php" method="POST">
                    <input type="text" name="firstname" placeholder="Имя">
                    <input type="text" name="lastname" placeholder="Фамилия">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password-1" placeholder="Пароль">
                    <input type="password" name="password-2" placeholder="Пароль">
                    <button class="button">Зарегистрироваться</button>
                </form>
            </div>

        </div> <!--end tabs_login-->

    </div>
</section>