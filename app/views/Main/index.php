<?php if (!empty($posts)) : ?>
    <?=__('last_posts')?>
    <div class="container">
        <?php foreach ($posts as $post) : ?>
            <div class="one">
                <div class="one__img-wrap">
                  <img src="/blue-eggs.jpg" alt="red-egg">
                </div>
                <h2><a href="/"><?=$post['title']?></a></h2>
            </div>
        <?php endforeach;?>
    </div>
    <?php if ($pagination->countPages > 1) : ?>
        <div class="text-center">
          <?=$pagination?>
        </div>
    <?php endif; ?>
<?php endif; ?>
