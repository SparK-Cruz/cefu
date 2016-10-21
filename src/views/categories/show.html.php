<?php
  $viewbag->title = $model->nome;
?>
<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <div class="title solid red">
        <h1><?=$model->nome?></h1>
      </div>
      <article>
        <h1><?=$model->nome?></h1>
        <div><p><?=$content::format($model->descricao)?></p></div>
        <h3>Cursos</h3>
        <div class="block-container">
        <?php
          $viewbag->cursos->each(function($curso)use($model, $url){
        ?>
        <a href="<?=$url::route("categorias/".$model->slug."/cursos/".$curso->slug)?>" class="block"><?=$curso->nome?></a>
        <?php
          });
        ?>
        </div>
      </article>
    </div>
    <?php include("src/views/common/footer.html.php"); ?>
  </body>
</html>