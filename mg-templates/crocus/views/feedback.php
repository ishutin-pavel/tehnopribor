<?php mgSEO($data); ?>

<h1 class="j-title">Обратная связь</h1>

<div class="j-page__static">
	<div class="j-static">
		<?php if(!empty($data['html_content'])&&$data['html_content']!='&nbsp;'){?>
			<div class="pade-desc">
				<?php echo $data['html_content'] ?>
			</div>
		<?php }?>

		<?php if(!empty($data['error'])){?>
			<div class="j-alert j-alert__red">
				<?php echo $data['error']; ?>
			</div>
		<?php }?>

		<div class="feedback-form-wrapper">
			<?php if($data['dislpayForm']){ ?>
			<form action="" method="post" name="feedback">
				<ul class="form-list">
					<li>Ф.И.О.:</li>
					<li><input type="text" name="fio" value="<?php echo !empty($_POST['fio'])?$_POST['fio']:'' ?>"></li>
					<li>Email:<span class="red-star">*</span></li>
					<li><input type="text" name="email" value="<?php echo !empty($_POST['email'])?$_POST['email']:'' ?>"></li>
					<li>Сообщение:<span class="red-star">*</span></li>
					<li><textarea class="address-area" name="message"><?php echo !empty($_REQUEST['message'])?$_REQUEST['message']:'' ?></textarea></li>
					<?php  if(MG::getSetting('useCaptcha')=="true"){ ?>
					<li>Введите текст с картинки:</li>
					<li><img src = "captcha.html" width="140" height="36"></li>
					<li><input type="text" name="capcha" class="captcha"></li>
					<?php }?>
				</ul>
				<input type="submit" name="send" value="Отправить сообщение">
			</form>
			<?php mgFormValid('feedback', 'feedback');?>
			<?php } else { ?>
			<div class='j-alert j-alert__green   successSend'> <?php echo $data['message']?> </div>
			<?php }; ?>
		</div>
	</div>
</div>