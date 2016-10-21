<?php
  $viewbag->title = "Cursos";
?>
<!DOCTYPE html>
<html>
  <?php include("src/views/common/head.html.php"); ?>
  <body>
    <?php include("src/views/common/header.html.php"); ?>
    <div class="content">
      <h1>Cursos</h1>
      <a href="<?=$url::route("cursos/novo")?>">Novo</a>
      <table>
        <tr>
          <th>Nome</th>
          <th>Caminho</th>
          <th>Categoria</th>
          <th></th>
        </tr>
        <?php $model->each(function($row) use ($url) { ?>
          <tr>
            <td><?=$row->nome?></td>
            <td><?=$row->slug?></td>
            <td><?=$row->getCategoria()->nome?></td>
            <td>
              <form action="<?=$url::route("cursos/".$row->id."/delete", "post")?>" method="post" class="delete">
                <a href="<?=$url::route("cursos/".$row->id)?>">Editar</a>
                <a href="cursos/<?=$row->id?>#delete" class="delete warning">Apagar</a>
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
          if(confirm("Deseja excluir o curso?"))
            link.parentNode.submit();
        };
      });
    </script>
  </body>
</html>