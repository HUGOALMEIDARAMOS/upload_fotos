<?php

try{
    //Carregar conexão com o banco de dados
    require_once 'conexao.php';

    //Query para buscar todos os países
    $query = "SELECT * FROM galerias";

    //Preparar a query com PDO
    $p_sql = $pdo->prepare($query);

    //Realizar busca dos países
    $p_sql->execute();

    //Trazer lista de países num array
    $dados = $p_sql->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e){
    //Tornar lista de países vazia
    $dados = array();
    //Guardar mensagem de erro numa variavel
    $error = $e->getMessage();
}
