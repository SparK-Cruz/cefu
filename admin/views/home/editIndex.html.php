<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <h1>Editar Página Inicial</h1>
    <form method="post">
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
      <input type="submit" />
    </form>
  </body>
</html>