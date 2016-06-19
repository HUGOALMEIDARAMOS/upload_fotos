<?php

try{
    //Carregar conexão com o banco de dados
    require_once 'conexao.php';

    //Verificar se existe o id do pais no post
    if(!isset($_POST['id_galeria']))
        throw new Exception("Nenhum id de galeria foi enviado!");

    //Verificar se existe o nome do pais no post
    if(!isset($_POST['titulo']))
        throw new Exception("Nenhum titulo foi enviado!");
 if(!isset($_POST['descricao']))
        throw new Exception("Nenhuma descricao foi enviado!");

    //Query para atualizar pais
    $query = "UPDATE galerias SET titulo = :titulo, fecha_alta = :fecha_alta, descricao= :descricao WHERE id_galeria = :id_galeria";

    //Preparar a query com PDO
    $p_sql = $pdo->prepare($query);

    //Verificação para evitar SQL Injection
    $p_sql->bindValue(":titulo", $_POST['titulo']);
    $p_sql->bindValue(":fecha_alta", date('Y-m-d H:i:s'));
     $p_sql->bindValue(":descricao", $_POST['descricao']);
    $p_sql->bindValue(":id_galeria", $_POST['id_galeria']);

    //Realizar atualização do pais
    $p_sql->execute();

    //Redirecionar para a página principal
    header("Location: index.php");

} catch (Exception $e){
    //Mostrar mensagem de erro caso existir
    echo $e->getMessage();
}

exit();
