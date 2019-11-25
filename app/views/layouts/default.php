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
      <a class="logo" href="/">PG-NEWS</a>
      <?php new core\widgets\menu\Menu([
        'tpl' => WWW . '/menu/select.php',
        'container' => 'select',
        'class' => 'my-select',
        'table' => 'categories',
        'cache' => 60,
        'cacheKey' => 'menu_select',
      ]); ?>
        <ul>
            <li><a href="/user/login">Login</a></li>
            <li><a href="/user/signup">Signup</a></li>
            <li><a href="/user/logout">Logout</a></li>
        </ul>
    </header>
    <div class="sidebar">
      <div class="sidebar__header">Categories</div>
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

        <?php if (isset($_SESSION['error'])) :?>
        <div class="p-4">
            <div class="alert mb-0 alert-danger">
              <?=$_SESSION['error']; unset($_SESSION['error']);?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])) :?>
        <div class="p-4">
            <div class="alert mb-0 alert-success">
              <?=$_SESSION['success']; unset($_SESSION['success']);?>
            </div>
        </div>
        <?php endif; ?>

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
