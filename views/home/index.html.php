<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <h1>Página inicial</h1>
    <a href="<?=Router::route("sobre")?>">Sobre</a>
    <a href="<?=Router::route("contato")?>">Contato</a>
  </body>
</html>