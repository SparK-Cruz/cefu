<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <h1>Categorias - <?=$viewbag->model->nome?></h1>
    <?php
      $viewbag->cursos->each(function($curso){
    ?>
    <p><?=$curso->nome?></p>
    <?php
      });
    ?>
  </body>
</html>