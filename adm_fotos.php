<?php

require_once 'conexao.php';

$id = $_GET['id_galeria'];



$query = "SELECT *  FROM fotos WHERE  fkgaleria='$id';";
$p_sql = $pdo->prepare($query);
$p_sql->execute();
$dados_fotos = $p_sql->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lan="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Galeria de Fotos</title>

    <style>

    </style>

</head>
<body>

<h1>Painel de controle</h1>
<h2>Administração de Fotos</h2>

<form method="post" enctype="multipart/form-data" action="enviar_fotos.php">


     <div id="input_files">
           <div>
                <input type="hidden" name="idgaleria" value="<?php echo $id; ?>"/>
                <label>Titulo</label>
                <input type="text" name="titulo[]"/>
                <label>Arquivo</label>
               <input type="file" name="arquivo[]"/>
           </div>
     </div>

    <input type="submit" value="adcionar fotos" name="upload"/>
    <input type="button" id="outra_foto" value="+ foto"/>


    <script type="text/javascript">
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
    </script>

</form>

<hr>


<table>
    <thead>
    <tr>
        <th colspan="4">Lista de Pessoas</th>
    </tr>
    <tr>
        <th>Nome:</th>
        <th>Arquivo:</th>
        <th>Estado:</th>
        <th>posicao:</th>
        <th>Album:</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($dados_fotos as $dados): ?>
        <tr>
            <td><?= $dados['nome'];?></td>
            <td><img src="./fotos/<?=$dados['arquivo'];?>" width="200"  height="200"></td>
            <td><?= $dados['estado'];?></td>
            <td><?= $dados['posicao'];?></td>
            <td><?= $dados['fkgaleria'];?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>



</body>
</html>
