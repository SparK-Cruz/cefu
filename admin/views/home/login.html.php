<?php
  $viewbag->title = "Entrar";
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <p><?=$viewbag->message?></p>
    <form method="post">
      <input type="text" name="login" value="<?=$model->login?>" />
      <input type="password" name="senha" value=""/>
      <input type="submit" value="entrar" />
    </form>
  </body>
</html>