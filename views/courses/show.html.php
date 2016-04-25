<?php
  $viewbag->title = $model->nome;
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <article>
        <h1><span><?=$model->getCategoria()->nome?></span><?=$model->nome?></h1>
        <div><?=$model->descricao?></div>
      </article>
    </div>
    <?php include("views/common/footer.html.php"); ?>
  </body>
</html>