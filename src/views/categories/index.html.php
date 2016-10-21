<?php
  $viewbag->title = "Categorias";
?>
<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <div class="title solid red">
        <h1>Categorias</h1>
      </div>
      <article>
        <h1>Categorias</h1>
        <div class="block-container">
        <?php
          $model->each(function($categoria) use ($url) {
        ?>
        <a href="<?=$url::route("categorias/".$categoria->slug)?>" class="block"><?=$categoria->nome?></a>
        <?php
          });
        ?>
        </div>
      </article>
    </div>
    <?php include("src/views/common/footer.html.php"); ?>
  </body>
</html>