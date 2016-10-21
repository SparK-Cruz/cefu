<?php
  $viewbag->title = $model->nome;
?>
<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <div class="title solid">
        <h1><?=$model->nome?></h1>
      </div>
      <article>
        <h1><span><?=$viewbag->categoria->nome?></span><?=$model->nome?></h1>
        <div><?=$content::format($model->descricao)?></div>
      </article>
    </div>
    <?php include("src/views/common/footer.html.php"); ?>
  </body>
</html>