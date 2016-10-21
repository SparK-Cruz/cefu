<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <div class="title contact">
        <h1><?=$model->titulo?></h1>
      </div>
      <article>
        <h1><?=$model->titulo?></h1>
        <div><?=$content::format($model->conteudo)?></div>
        <form method="post">
          <div>
            <label>Nome</label>
            <input type="text" name="name" />
          </div>
          <div>
            <label>Email</label>
            <input type="email" name="email" />
          </div>
          <div>
            <label>Assunto</label>
            <input type="text" name="subject" />
          </div>
          <div>
            <label>Mensagem</label>
            <textarea name="message"></textarea>
          </div>
          <input type="submit" value="Enviar" />
        </form>
      </article>
    </div>
    <?php include("src/views/common/footer.html.php"); ?>
  </body>
</html>