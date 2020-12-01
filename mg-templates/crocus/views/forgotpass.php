<?php mgSEO($data); ?>

<h1 class="j-title">Восстановление пароля</h1>

<?php if($data['message']):?>
	<div class="alert-info"><?php echo $data['message']?></div>
<?php endif; ?>


<?php if($data['error']):?>
	<div class="j-alert j-alert__red"><?php echo $data['error']?></div>
<?php endif;?>

<div class="j-page__static">
    <div class="j-static">
        <?php switch($data['form']){case 1: ?>
        <div class="restore-pass">
            <p class="custom-text">На адрес электронной почты будет отправлена инструкция по восстановлению пароля.</p>
            <form action = "<?php echo SITE?>/forgotpass" method = "POST">
                <ul class="form-list">
                    <li><input type = "text" name = "email" value="Email" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}"></li>
                </ul>
                <input type = "submit" name="forgotpass" class="enter-btn j-button" value = "Отправить" >
            </form>
        </div>
        <?php break; case 2: ?>
        <div class="restore-pass">
            <form action="<?php echo SITE?>/forgotpass" method="POST">
                <ul class="form-list">
                    <li>Новый пароль (не менее 5 символов):</li>
                    <li><input type = "password" name = "newPass"></li>
                    <li>Подтвердите новый пароль:<span class="red-star">*</span></li>
                    <li><input type="password" name="pass2"></li>
                </ul>
                <div class="clear"></div>
                <input type = "submit" class="enter-btn j-button" name="chengePass" value = "Сохранить">
            </form>
        </div>
        <?php } ?>
    </div>
</div>