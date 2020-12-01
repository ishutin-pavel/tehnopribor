<?php if($thisUser = $data['thisUser']): ?>

    <a class="j-login__personal" href="<?php echo SITE?>/personal">
        Кабинет
    </a>
    <a class="j-login__logout"  href="<?php echo SITE?>/enter?logout=1">
        Выйти
    </a>

<?php else: ?>

    <!-- login button - start -->
    <a class="j-login__enter" href="#j-modal__login">
        <svg class="icon icon--login"><use xlink:href="#icon--login"></use></svg>
        Войти
    </a>
    <!-- login button - end -->

    <!-- modal - start -->
    <div id="j-modal__login" class="j-modal j-login">

        <!-- modal content - start -->
        <div class="j-modal__content">

            <!-- tab - start -->
            <div class="j-tab__nav">
                <a href="#tab-login-1" class="j-tab__nav__a active">Вход</a>
                <a href="#tab-login-2" class="j-tab__nav__a">Регистрация</a>
            </div>

            <div id="tab-login-1" class="j-tab__content active">
                <form action="<?php echo SITE ?>/enter" method="POST">
                    <ul>
                        <li><input placeholder="Email*"  type="text" name="email" value="" required></li>
                        <li><input placeholder="Пароль*" type="password" name="pass" required></li>
                    </ul>
                    <div class="j-login__bottom">
                        <button type="submit" class="j-login__enter">Войти</button>
                        <a href="/forgotpass" class="j-login__forgot">Забыли пароль?</a>
                    </div>
                </form>
            </div>

            <div id="tab-login-2" class="j-tab__content">
                <form action="<?php echo SITE ?>/registration" method="POST">
                    <ul>
                        <li><input placeholder="Email*" type="text" name="email" value="" required></li>
                        <li><input placeholder="Пароль*" type="password" name="pass" required></li>
                        <li><input placeholder="Подтвердите пароль*" type="password" name="pass2" required></li>
                        <li><input placeholder="Имя*" type="text" name="name" value="" required></li>
                        <li><input type="hidden" name="ip" value=""></li>
                    </ul>
                    <button type="submit" name="registration" class="j-login__registration">Зарегистрироваться</button>
                </form>
            </div>
            <!-- tab - end -->
        </div>
        <!-- modal content - end -->
    </div>
    <!-- modal - end -->
<?php endif; ?>