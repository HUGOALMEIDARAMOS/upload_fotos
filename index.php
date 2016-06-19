<?php  

require_once 'ler_galeria.php';

 ?>
<!DOCTYPE html>
<html lan="pt-br">
<head>
   <meta charset="UTF-8">
<title>Galeria de Fotos</title>
</head>
<body>

<h1>Painel de controle</h1>
<h2>Listando Galeria</h2>

<div><a href="nova_galeria.php">Carregar Nova Galeria</a></div>


<table border="1">
  <thead>
       <tr>
             <th>Id</th>
            <th>Titulo</th>
            <th>Data</th>
            <th>Descricao</th>
            <th>Botões Acoes</th> 
      </tr>
   </thead>
  <tbody>
            <?php foreach($dados as $dado): ?>
            <tr>
              <th scope="row"><?= $dado['id_galeria']?></th>
               <td><?= $dado['titulo']?></td>
                <td><?= $dado['fecha_alta']?></td>
                <td><?= $dado['descricao']?></td>
                <td>
                   <div class="btn-group" role="group" aria-label="...">
                        <a href="excluir_galeria.php?id_galeria=<?= $dado['id_galeria']?>" class="btn btn-default">Excluir</a>
                        <a href="editar_galeria.php?id_galeria=<?= $dado['id_galeria']?>" class="btn btn-default">Editar</a>
                        <a href="adm_fotos.php?id_galeria=<?= $dado['id_galeria']?>" class="btn btn-default">Administrar Fotos</a>
                        
                   </div>
                </td>

             </tr>
            <?php endforeach; ?>
            </tbody>    

</table>

</body>
</html>

