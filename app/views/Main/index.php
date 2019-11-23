<?php if (!empty($posts)) : ?>
    <div class="container">
        <?php foreach ($posts as $post) : ?>
            <div class="card">
                <img src="/blue-eggs.jpg" style="width: 100px;" class="card-img-top" alt="red-egg">
                <div class="card-body">
                    <h5 class="card-title"><?=$post['title']?></h5>
                    <p class="card-text"><?=$post['text']?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
<?php endif; ?>