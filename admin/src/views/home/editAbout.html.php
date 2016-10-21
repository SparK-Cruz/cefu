<?php
  $viewbag->title = "Editar Sobre";
?>
<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <h1>Editar Sobre</h1>
      <form method="post" enctype="multipart/form-data">
        <p><?=isset($viewbag->message)?$viewbag->message:""?></p>
        <div>
          <label>Título</label>
          <input type="text" name="titulo" value="<?=$model->titulo?>" />
        </div>
        <div>
          <label>Conteúdo</label>
          <textarea name="conteudo"><?=$model->conteudo?></textarea>
        </div>
        <div>
          <label>Imagem</label>
          <input type="file" name="imagem" />
        </div>
        <input type="submit" value="Salvar" />
      </form>
    </div>
  </body>
</html>