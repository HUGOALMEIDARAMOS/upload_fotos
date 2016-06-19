<?php
$id = $_GET['id_galeria'];
?>

<!DOCTYPE html>
<html lan="pt-br">
<head>
   <meta charset="UTF-8">
<title>Galeria de Fotos</title>

<style>
label, input{display:block;}


</style>

</head>
<body>

<h1>Painel de controle</h1>
<h2>Administração de Fotos</h2>

<form  method="post" enctype="multipart/form-data" action="enviar_fotos.php">

<input type="hidden" name="idgaleria" id="idgaleria" value="<?php echo $id; ?>"/>
<label>Titulo</label> <input type="text" name="titulo"/>
<label>Arquivo</label><input type="file" name="arquivo" />
<input type="submit" value="adcionar fotos"/>

</form>

</body>
</html>
