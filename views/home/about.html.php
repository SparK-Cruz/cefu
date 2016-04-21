<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <a href="<?=Router::route("inicio")?>">Início</a>
    <h1><?=$model->titulo?></h1>
    <div><?=$model->conteudo?></div>
  </body>
</html>