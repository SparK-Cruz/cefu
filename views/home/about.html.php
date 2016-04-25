<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <div class="title about">
        <h1><?=$model->titulo?></h1>
      </div>
      <article>
        <h1><?=$model->titulo?></h1>
        <div><p><?=formatContent($model->conteudo)?></p></div>
      </article>
    </div>
    <?php include("views/common/footer.html.php"); ?>
  </body>
</html>