<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <div class="title about">
        <h1><?=$model->titulo?></h1>
      </div>
      <article>
        <h1><?=$model->titulo?></h1>
        <div><p><?=$content::format($model->conteudo)?></p></div>
      </article>
    </div>
    <?php include("src/views/common/footer.html.php"); ?>
  </body>
</html>