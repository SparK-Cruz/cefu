<?php
  $viewbag->title = "Categiras - ".($model->id?"Editar":"Nova");
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <h1><?=$viewbag->title?></h1>
      <p><?=$viewbag->message?></p>
      <form method="post">
        <div>
          <label>Nome</label>
          <input type="text" name="nome" value="<?=$model->nome?>" />
        </div>
        <div>
          <label>Descricao</label>
          <textarea name="descricao"><?=$model->descricao?></textarea>
        </div>
        <div>
          <label>Caminho</label>
          <input type="text" name="slug" value="<?=$model->slug?>" />
        </div>
        <input type="submit" value="Salvar" />
      </form>
    </div>
  </body>
</html>
