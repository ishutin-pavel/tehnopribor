<?php if(!empty($data)): ?>
<div class="j-sub-categories">
    <?php foreach($data as $category): ?>
    <a class="j-sub-categories__item" href="<?php echo SITE.'/'.$category['parent_url'].$category['url']; ?>">
        <?php if(!empty($category['image_url'])): ?>
            <div class="j-sub-categories__img">
                <img src="<?php echo SITE.$category['image_url']; ?>" alt="<?php echo $category['title']; ?>" title="<?php echo $category['title']; ?>">
            </div>
        <?php else: ?>
            <div class="j-sub-categories__img">
                <img src="<?php echo SITE.'/uploads/thumbs/70_no-img.jpg' ?>" alt="<?php echo $category['title']; ?>" title="<?php echo $category['title']; ?>">
            </div>
        <?php endif; ?>
        <div class="j-sub-categories__title"><?php echo $category['title']; ?></div>
    </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>