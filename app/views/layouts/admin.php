<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/styles.css">
  <?=$this->getMeta();?>
</head>
<body>
<header class="header">
  <a class="logo" href="/admin">PG-ADMIN</a>
  <?php new core\widgets\menu\Menu([
    'tpl' => WWW . '/menu/select.php',
    'container' => 'select',
    'class' => 'my-select',
    'table' => 'categories',
    'cache' => 60,
    'cacheKey' => 'menu_select',
  ]); ?>
</header>
<div class="sidebar">
  <div class="sidebar__nav-wrap">
    <?php new core\widgets\menu\Menu([
      'tpl' => WWW . '/menu/my_menu.php',
      'container' => 'ul',
      'class' => 'my-menu',
      'table' => 'categories',
      'cache' => 60,
      'cacheKey' => 'menu_ul',
    ]); ?>
  </div>
</div>
<div class="content">
  <?=$content?>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="/bootstrap/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?=$this->showScripts();?>
</body>
</html>
