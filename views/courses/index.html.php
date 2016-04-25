<?php
  $viewbag->title = "Cursos";
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <article>
        <h1>Cursos</h1>
        <div class="block-container">
        <?php
          $model->each(function($row){
        ?>
        <a href="<?=Router::route("cursos/".$row->slug)?>" class="block"><?=$row->nome?></a>
        <?php
          });
        ?>
        </div>
      </article>
    </div>
    <?php include("views/common/footer.html.php"); ?>
  </body>
</html>