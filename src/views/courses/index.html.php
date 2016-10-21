<?php
  $viewbag->title = "Cursos";
?>
<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <div class="title solid">
        <h1>Cursos</h1>
      </div>
      <article>
        <h1>Cursos</h1>
        <div class="block-container">
        <?php
          $model->each(function($row) use ($url) {
        ?>
        <a href="<?=$url::route("cursos/".$row->slug)?>" class="block"><?=$row->nome?></a>
        <?php
          });
        ?>
        </div>
      </article>
    </div>
    <?php include("src/views/common/footer.html.php"); ?>
  </body>
</html>