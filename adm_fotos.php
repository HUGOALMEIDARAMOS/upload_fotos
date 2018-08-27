<?php

require_once 'conexao.php';

$id = $_GET['id_galeria'];


$query = "SELECT fotos.nome, fotos.arquivo, fotos.estado, galerias.titulo  FROM fotos INNER JOIN galerias ON fotos.fkgaleria=galerias.id_galeria WHERE  fkgaleria='$id'  ORDER BY id_foto DESC ;
";
$p_sql = $pdo->prepare($query);
$p_sql->execute();
$dados_fotos = $p_sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lan="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Galeria de Fotos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Listando Fotos</h1>
                   <p class="lead">Lista de fotos referente a galeria escolhida.</p>
                   <a class="btn btn-primary btn-lg" href="index.php" role="button">Galerias</a>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container ">

<div class="row">
    
    <div class="col-sm-12 col-md-12">

  

<form method="post" enctype="multipart/form-data" action="enviar_fotos.php">    
     <div class="row text-center">
           <input type="hidden" name="idgaleria" value="<?php echo $id; ?>"/>
            <div class="col-sm-12 col-md-4">
               <input type="text" class="form-control" placeholder="titulo" name="titulo" id="titulo">
           </div>
           <div class="col-sm-12 col-md-4">
                <input type="file" class="form-control-file" id="arquivo" name="arquivo">
           </div>
            <div class="col-sm-12 col-md-4 text-left">
                <input class="btn btn-outline-info" type="submit" value="adcionar fotos" name="upload"/>
           </div>
    </div>
  
<!--

 <div id="input_files">
           <div>
                <input type="hidden" name="idgaleria" value="<?php echo $id; ?>"/>
                <label>Titulo</label>
                <input type="text" name=""/>
                <label>Arquivo</label>
               <input type="file" name="arquivo"/>
           </div>
     </div>

    <input type="submit" value="adcionar fotos" name="upload"/>
    <input type="button" id="outra_foto" value="+ foto"/>

-->
</form>

  </div>

</div>

<div class="row mt-5">
    <div class="col-sm-12 col-md-12">

<table class="table table-striped table-bordered table-hover table-responsive-sm">
    <thead class="thead-dark">
   
    <tr class="text-center">
        <th>Descrição</th>
        <th>Foto</th>
        <th>Estado</th>
        <th>Galeria</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($dados_fotos as $dados): ?>
        <tr>
            <td><?= $dados['nome'];?></td>
            <td class="text-center"><img src="./fotos/<?=$dados['arquivo'];?>" width="75" height="75" class="rounded-circle"></td>
            <td><?= $dados['estado'];?></td>
            <td><?= $dados['titulo'];?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</div></div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!--  <script type="text/javascript">
            var boton=document.getElementById('outra_foto');
                boton.onclick=function () {

                    var div_cont=document.createElement('div');
                     var label1=document.createElement('label1');
                          label1.innerHTML='Titulo';
                     var input1=document.createElement('input');
                         input1.type='text';
                         input1.name='titulo[]';


                     var label2=document.createElement('label2');
                         label2.innerHTML='Arquivo';
                     var input2=document.createElement('input');
                         input2.type='file';
                         input2.name='arquivo[]';


                  var div = document.getElementById('input_files');
                    div_cont.appendChild(label1);
                    div_cont.appendChild(input1);
                    div_cont.appendChild(label2);
                    div_cont.appendChild(input2);

                     div.appendChild(div_cont);



                 }
    </script>-->
</body>
</html>
