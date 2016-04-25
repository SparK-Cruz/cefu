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
        <h1><?=$model->nome?></h1>
        <div><?=$model->descricao?></div>
        <h3>Cursos</h3>
        <div class="block-container">
        <?php
          $viewbag->cursos->each(function($curso)use($model){
        ?>
        <a href="<?=Router::route("categorias/".$model->slug."/cursos/".$curso->slug)?>" class="block"><?=$curso->nome?></a>
        <?php
          });
        ?>
        </div>
      </article>
    </div>
    <?php include("views/common/footer.html.php"); ?>
  </body>
</html>