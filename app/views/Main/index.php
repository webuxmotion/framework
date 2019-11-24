<?php if (!empty($posts)) : ?>
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
<?php endif; ?>
