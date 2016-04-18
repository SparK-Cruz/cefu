<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <h1>Categorias</h1>
    <?php
      $viewbag->model->each(function($categoria){
    ?>
    <p><?=$categoria->nome?></p>
    <?php
      });
    ?>
  </body>
</html>