<?php
require_once 'ler_galeria_id.php';
?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="utf-8">
      <title>cadastro de galeria</title>


  <style>

  label, textarea{display:block;}

</style>
</head>
<body>
</body>

 <?php if (isset($error)) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><?= $error ?></strong>
        </div>
    <?php endif; ?>


 <form class="form-inline" method="post" action="atualizar_galeria.php">
 <input type="hidden" name="id_galeria" value="<?= isset($dado['id_galeria']) ? $dado['id_galeria'] : 0 ?>">

            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" placeholder="titulo do album" name="titulo"  value="<?= isset($dado['titulo']) ? $dado['titulo'] : "" ?>">
            <label for="descricao">Descrição</label>            
           <textarea type="text" rows="5" cols="90"  name="descricao"><?= isset($dado['descricao']) ? $dado['descricao'] : "" ?></textarea>
        <button type="submit" class="btn btn-default">Atualizar</button>
    </form>


</html>
