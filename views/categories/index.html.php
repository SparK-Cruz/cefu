<?php
  $viewbag->title = "Categorias";
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <div class="title solid red">
        <h1>Categorias</h1>
      </div>
      <article>
        <h1>Categorias</h1>
        <div class="block-container">
        <?php
          $model->each(function($categoria){
        ?>
        <a href="<?=Router::route("categorias/".$categoria->slug)?>" class="block"><?=$categoria->nome?></a>
        <?php
          });
        ?>
        </div>
      </article>
    </div>
    <?php include("views/common/footer.html.php"); ?>
  </body>
</html>