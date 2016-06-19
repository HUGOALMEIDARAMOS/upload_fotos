<?php

try{
    //Carregar conexão com o banco de dados
    require_once 'conexao.php';

    //Verificar se existe o id do pais no get
    if(!isset($_GET['id_galeria']))
        throw new Exception("Nenhum id de galeria foi enviado!");

    //Query para buscar todos os países
    $query = "SELECT * FROM galerias WHERE id_galeria = :id_galeria";

    //Preparar a query com PDO
    $p_sql = $pdo->prepare($query);

    //Verificação para evitar SQL Injection
    $p_sql->bindValue(":id_galeria", $_GET['id_galeria']);

    //Realizar busca dos países
    $p_sql->execute();

    //Trazer lista de países num array
    $dado = $p_sql->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e){
    //Tornar lista de países vazia
    $dado = array();
    //Guardar mensagem de erro numa variavel
    $error = $e->getMessage();
}
