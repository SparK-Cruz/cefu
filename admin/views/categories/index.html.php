<?php
  $viewbag->title = "Categorias";
?>
<!DOCTYPE html>
<html>
  <?php include("views/common/head.html.php"); ?>
  <body>
    <?php include("views/common/header.html.php"); ?>
    <div class="content">
      <h1>Categorias</h1>
      <a href="<?=Router::route("categorias/nova")?>">Nova</a>
      <table>
        <tr>
          <th>Nome</th>
          <th>Caminho</th>
          <th></th>
        </tr>
        <?php $model->each(function($row){ ?>
          <tr>
            <td><?=$row->nome?></td>
            <td><?=$row->slug?></td>
            <td>
              <form action="<?=Router::route("categorias/".$row->id."/delete", "post")?>" method="post" class="delete">
                <a href="<?=Router::route("categorias/".$row->id)?>">Editar</a>
                <a href="categorias/<?=$row->id?>#delete" class="delete warning">Apagar</a>
              </form>
            </td>
          </tr>
        <?php }); ?>
      </table>
    </div>
    <script type="text/javascript">
      var deleteLinks = [].slice.call(document.querySelectorAll("form.delete a.delete"));
      deleteLinks.forEach(function(link){
        link.onclick = function(event){
          event.preventDefault();
          link.parentNode.submit();
        };
      });
    </script>
  </body>
</html>