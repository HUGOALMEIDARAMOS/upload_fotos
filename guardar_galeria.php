<?php

try{

require_once 'conexao.php';

  //AQUI TESTA SE O CAMPO ENVIADO ESTAR VAZIO

    if(!isset($_POST['titulo']))
        throw new Exception("Nenhum titulo foi enviado!");
    if(!isset($_POST['descricao']))
        throw new Exception("Nenhuma descrição foi enviado!");

//AQUI FACO O SQL DE INSERÇÃO

$query = "INSERT INTO galerias (titulo, fecha_alta, descricao) VALUES (:titulo,:fecha_alta, :descricao)";
$p_sql = $pdo->prepare($query);


 //VERIFICO PARA EVITAR O SQL INJECTION
    $p_sql->bindValue(":titulo", $_POST['titulo']);
    $p_sql->bindValue(":fecha_alta", date('Y-m-d H:i:s'));
    $p_sql->bindValue(":descricao", $_POST['descricao']);
    $p_sql->execute();
    header("Location: index.php");

} catch (Exception $e){
    //MOSTRO MENSAGEM DE ERRO CASO EXISTA 
    echo $e->getMessage();
}

exit();

