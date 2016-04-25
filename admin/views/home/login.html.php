<?php
  $viewbag->title = "Entrar";
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <div class="content login">
      <h1>Entrar</h1>
      <p><?=$viewbag->message?></p>
      <form method="post">
        <div>
          <label>Usuário</label>
          <input type="text" name="login" value="<?=$model->login?>" />
        </div>
        <div>
          <label>Senha</label>
          <input type="password" name="senha" value=""/>
        </div>
        <input type="submit" value="Entrar" />
      </form>
      <p><a href="<?=Router::route("")?>/../../">Voltar ao site</a></p>
    </div>
  </body>
</html>