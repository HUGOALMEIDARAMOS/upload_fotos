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


 <form class="form-inline" method="post" action="guardar_galeria.php">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" placeholder="titulo do album" name="titulo">
            <label for="descricao">Descrição</label>            
           <textarea type="text" rows="5" cols="90"  name="descricao"></textarea>
        <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>


</html>
