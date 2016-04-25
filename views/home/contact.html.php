<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <div class="title contact">
        <h1><?=$model->titulo?></h1>
      </div>
      <article>
        <h1><?=$model->titulo?></h1>
        <div><?=$model->conteudo?></div>
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
    <?php include("views/common/footer.html.php"); ?>
  </body>
</html>