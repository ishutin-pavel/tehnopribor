<?php mgSEO($data); ?>

<h1 class="new-products-title">Регистрация</h1>
  <?php if($data['message']): ?>
    <div class="j-alert__green   successReg"><?php echo $data['message'] ?></div>
  <?php endif; ?>
  <?php if($data['error']): ?>
    <div class="j-alert__red   msgError"><?php echo $data['error'] ?></div>
  <?php endif; ?>
<div class="create-user-account-form">
  <?php if($data['form']): ?>
    <form action="<?php echo SITE ?>/registration" method="POST">
      <ul class="form-list">
        <li>Email:<span class="red-star">*</span></li>
        <li><input type = "text" name = "email" value = "<?php echo $_POST['email'] ?>"></li>
        <li>Пароль:<span class="red-star">*</span></li>
        <li><input type="password" name="pass"></li>
        <li>Подтвердите пароль:<span class="red-star">*</span></li>
        <li><input type="password" name="pass2"></li>
        <li>Имя:</li>
        <li><input type="text" name="name" value = "<?php echo $_POST['name'] ?>"></li>
        <li><input type="hidden" name="ip" value = "<?php echo $_SERVER['REMOTE_ADDR'] ?>"></li>      
        <?php if(MG::getSetting('useCaptcha')=="true"){ ?>
          <li>Введите текст с картинки:</li>
          <li><img style="margin-top: 5px; border: 1px solid gray; background: url('<?php echo PATH_TEMPLATE ?>/images/cap.png');" src = "captcha.html" width="140" height="36"></li>
          <li><input type="text" name="capcha" class="captcha"></li>
        <?php } ?>
      </ul>
      <button type = "submit" name="registration" class="register-btn default-btn">Зарегистрироваться</button>
    </form>
    <div class="clear">&nbsp;</div>
  <?php endif ?>
</div>