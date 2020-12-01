<?php if($thisUser = $data['thisUser']): ?>

    <a href="<?php echo SITE?>/personal">
        <svg class="icon icon--user"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--user"></use></svg>
        Кабинет
    </a>
    <a href="<?php echo SITE?>/enter?logout=1">
        <svg class="icon icon--log-out"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--log-out"></use></svg>
        Выйти
    </a>

<?php else: ?>

    <a href="#j-modal__login">
        <svg class="icon icon--log-in"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--log-in"></use></svg>
        Вход
    </a>
    <a href="#j-modal__register">
        <svg class="icon icon--pencil"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--pencil"></use></svg>
        Регистрация
    </a>

    <div id="j-modal__login" class="j-modal">
        <div class="j-modal__content">
            <form action="<?php echo SITE ?>/enter" method="POST">
                <ul class="form-list">
                    <li><input required placeholder="Email*"  type="text" name="email" value="" required></li>
                    <li><input required placeholder="Пароль*" type="password" name="pass" required></li>
                </ul>
                <button type="submit" class="enter-btn default-btn">Войти</button>
                <a href="/forgotpass" class="forgot-link">Забыли пароль?</a>
            </form>
        </div>
    </div>

    <div id="j-modal__register" class="j-modal">
        <div class="j-modal__content">
            <form action="<?php echo SITE ?>/registration" method="POST">
                <ul class="form-list">
                    <li><input required placeholder="Email*" type="text" name="email" value="" required></li>
                    <li><input required placeholder="Пароль*" type="password" name="pass" required></li>
                    <li><input required placeholder="Подтвердите пароль*" type="password" name="pass2" required></li>
                    <li><input required placeholder="Имя*" type="text" name="name" value="" required></li>
                    <li><input type="hidden" name="ip" value=""></li>
                </ul>
                <button type="submit" name="registration" class="register-btn default-btn">Зарегистрироваться</button>
            </form>
        </div>
    </div>

<?php endif; ?>