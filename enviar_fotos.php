<?php

try{

require_once 'conexao.php';

$titulo = $_POST['titulo'];
$nome_arquivo = mktime().'.jpg';
$posicao=0;
$estado='visivel';
$fkgaleria = $_POST['idgaleria'];




$query = "INSERT INTO fotos (
           nome,
           arquivo,
            posicao,
             estado,
              fkgaleria
              ) VALUES (
              :titulo,
              :nome_arquivo,
               :posicao, 
               :estado, 
               :fkgaleria);";



$p_sql = $pdo->prepare($query);
//VERIFICO PARA EVITAR O SQL INJECTION
$p_sql->bindValue(":titulo", $_POST['titulo']);
$p_sql->bindValue(":nome_arquivo", $_POST['arquivo']);
$p_sql->bindValue(":posicao", $posicao);
$p_sql->bindValue(":estado", $estado);
$p_sql->bindValue(":fkgaleria", $fkgaleria);
$p_sql->execute();



 $uploaddir = './fotos/';
 $uploadfile = $uploaddir . basename($_FILES['arquivo']['name']);
 move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile);


//Redirecionar para a página principal
header("Location: adm_fotos.php");



} catch (Exception $e){
 //MOSTRO MENSAGEM DE ERRO CASO EXISTA
 echo $e->getMessage();
}

exit();


