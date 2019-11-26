<div class="dropdown ml-4">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?=$this->language['code']?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php foreach ($this->languages as $key => $item) : ?>
      <a class="dropdown-item js-lang<?=$this->language['code'] == $key ? ' disabled' : ''?>" data-lang="<?=$key?>" href="/language/change?lang=<?=$key?>"><?=$key?></a>
    <?php endforeach; ?>
  </div>
</div>