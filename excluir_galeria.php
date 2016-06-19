<?php

try{
    //Carregar conexão com o banco de dados
    require_once 'conexao.php';

    //Verificar se existe o id do pais no get
    if(!isset($_GET['id_galeria']))
        throw new Exception("Nenhum id de galeria foi enviado!");

    //Query para apagar pais
    $query = "DELETE FROM galerias WHERE id_galeria = :id_galeria";

    //Preparar a query com PDO
    $p_sql = $pdo->prepare($query);

    //Verificação para evitar SQL Injection
    $p_sql->bindValue(":id_galeria", $_GET['id_galeria']);

    //Realizar exclusão do pais
    $p_sql->execute();

    //Redirecionar para a página principal
    header("Location: index.php");

} catch (Exception $e){
    //Mostrar mensagem de erro caso existir
    echo $e->getMessage();
}

exit();
