<?php mgSEO($data); ?>
 
<h1 class="new-products-title">Вход в кабинет</h1>

<?php if($data['msgError']): ?>
    <div class="j-alert__red"><?php echo $data['msgError'] ?></div>
<?php endif; ?>

<div class="user-login">
    <form action="<?php echo SITE ?>/enter" method="POST">
        <ul class="form-list">
            <li>Email:<span class="red-star">*</span></li>
            <li><input type = "text" name = "email" value = "<?php echo!empty($_POST['email'])?$_POST['email']:'' ?>"></li>
            <li>Пароль:<span class="red-star">*</span></li>
            <li><input type="password" name="pass"></li>
            <?php echo!empty($data['checkCapcha'])?$data['checkCapcha']:'' ?>
        </ul>
        <button type="submit" class="enter-btn default-btn">Войти</button>
        <a href="<?php echo SITE ?>/forgotpass" class="forgot-link">Забыли пароль?</a>
    </form>

    <div class="register">
        Если у Вас нет кабинета, пожалуйста, <a href="<?php echo SITE ?>/registration">зарегистрируйтесь</a>
    </div>
</div>