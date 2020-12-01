<nav id="j-offcanvas__topmenu" class="j-topmenu j-offcanvas">

	<ul class="j-topmenu__content j-offcanvas__content">
		<?php foreach($data['pages'] as $page):?>
		<?php if($page['invisible']=="1"){continue;}?>
		<?php if(URL::getUrl()==$page['link']||URL::getUrl()==$page['link'].'/'){$active = 'active';} else {$active = '';}?>
		<?php if(isset($page['child'])):?>
		<?php $slider = 'slider'; $noUl = 1; foreach($page['child'] as $pageLevel1){$noUl *= $pageLevel1['invisible']; } if($noUl){$slider='';}?>

		<li class="j-topmenu__li j-topmenu__li__1 j-offcanvas__li j-offcanvas__li__1">
			<a class="j-topmenu__a j-topmenu__a__1 j-offcanvas__a j-offcanvas__a__1" href="<?php echo $page['link']; ?>">
				<span class="j-topmenu__span">
					<?php echo MG::contextEditor('page', $page['title'], $page["id"], "page"); ?>
				</span>
				<svg class="icon icon--arrow-down"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-down"></use></svg>
				<svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
			</a>
			<?php  if($noUl){$slider=''; continue;} ?>

			<ul class="j-topmenu__ul j-topmenu__ul__1 j-offcanvas__ul j-offcanvas__ul__1">
				<?php foreach($page['child'] as $pageLevel1):?>
				<?php if($pageLevel1['invisible']=="1"){continue;}?>
				<?php if(isset($pageLevel1['child'])):?>
				<?php $slider = 'slider'; $noUl = 1; foreach($pageLevel1['child'] as $pageLevel2){$noUl *= $pageLevel2['invisible']; } if($noUl){$slider='';}?>

				<li class="j-topmenu__li j-topmenu__li__2 j-offcanvas__li j-offcanvas__li__2">
					<a class="j-topmenu__a j-topmenu__a__2 j-offcanvas__a j-offcanvas__a__2" href="<?php echo $pageLevel1['link']; ?>">
						<span class="j-topmenu__span">
							<?php echo MG::contextEditor('page', $pageLevel1['title'], $pageLevel1["id"], "page"); ?>
						</span>
						<svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
					</a>
					<?php  if($noUl){$slider=''; continue;} ?>

					<ul class="j-topmenu__ul j-topmenu__ul__2 j-offcanvas__ul j-offcanvas__ul__2">
						<?php foreach($pageLevel1['child'] as $pageLevel2):?>
						<?php if($pageLevel2['invisible']=="1"){continue;}?>
						<li class="j-topmenu__li j-topmenu__li__3 j-offcanvas__li j-offcanvas__li__3">
							<a class="j-topmenu__a j-topmenu__a__3 j-offcanvas__a j-offcanvas__a__3" href="<?php echo $pageLevel2['link']; ?>">
								<?php echo MG::contextEditor('page', $pageLevel2['title'], $pageLevel2["id"], "page");?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>

				</li>
				<?php else:?>
				<li class="j-topmenu__li j-topmenu__li__2 j-offcanvas__li j-offcanvas__li__2">
					<a class="j-topmenu__a j-topmenu__a__2 j-offcanvas__a j-offcanvas__a__2" href="<?php echo $pageLevel1['link']; ?>">
						<?php echo MG::contextEditor('page', $pageLevel1['title'], $pageLevel1["id"], "page");  ?>
					</a>
				</li>
				<?php endif;?>
				<?php endforeach;?>
			</ul>
		</li>
		<?php else:?>
		<li class="j-topmenu__li j-topmenu__li__1 j-offcanvas__li j-offcanvas__li__1">
			<a class="j-topmenu__a j-topmenu__a__1 j-offcanvas__a j-offcanvas__a__1" href="<?php echo $page['link']; ?>">
				<?php echo MG::contextEditor('page', $page['title'], $page["id"], "page"); ?>
			</a>
		</li>
		<?php endif;?>
		<?php endforeach;?>
	</ul>
</nav>