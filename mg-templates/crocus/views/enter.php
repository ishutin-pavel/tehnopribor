<?php mgSEO($data); ?>

<h1 class="j-title">Авторизация пользователя</h1>

<?php echo!empty($data['msgError'])?$data['msgError']:'' ?>

<div class="user-login">
    <div class="title">Зарегистрированный пользователь</div>
    <p class="custom-text">Если Вы уже зарегистрированы у нас в интернет-магазине, пожалуйста авторизуйтесь.</p>
    <form action="<?php echo SITE ?>/enter" method="POST">
        <ul class="form-list">
            <li>Email:<span class="red-star">*</span></li>
            <li><input type = "text" name = "email" value = "<?php echo!empty($_POST['email'])?$_POST['email']:'' ?>"></li>
            <li>Пароль:<span class="red-star">*</span></li>
            <li><input type="password" name="pass"></li>
            <?php echo!empty($data['checkCapcha'])?$data['checkCapcha']:'' ?>
            <?php if (!empty($_REQUEST['location'])) :?>
            <input type="hidden" name="location" value="<?php echo $_REQUEST['location'];?>" />
            <?php endif;?>
        </ul>
        <a href="<?php echo SITE ?>/forgotpass" class="forgot-link">Забыли пароль?</a>
        <button type="submit" class="enter-btn">Войти</button>
    </form>
</div>