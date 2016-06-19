<?php

try {

    require_once 'conexao.php';

    $titulo       = $_POST['titulo'];
    $nome_arquivo = md5(time()) . '.jpg'; //Novo nome unico do arquivo
    $posicao      = 0;
    $estado       = 'visivel';
    $fkgaleria    = $_POST['idgaleria'];

    //verificar se o arquivo foi enviado
    if(!isset($_FILES['arquivo']))
        throw new Exception("Nenhum arquivo foi enviado!");
    //Verificar se ocorreu algum erro no upload
    elseif($_FILES['arquivo']['error'] !== UPLOAD_ERR_OK)
        throw new Exception("Erro ao fazer o upload: {$_FILES['arquivo']['error']}");

    $uploaddir  = './fotos/'; //Local de upload
    $uploadfile = $uploaddir . $nome_arquivo; //Destino do arquivo

    if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile))
        throw new Exception("Ocorreu um erro ao mover a foto para a pasta!");

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
                :fkgaleria)";


    $p_sql = $pdo->prepare($query);

    //VERIFICO PARA EVITAR O SQL INJECTION
    $p_sql->bindValue(":titulo", $_POST['titulo']);
    $p_sql->bindValue(":nome_arquivo", $nome_arquivo);
    $p_sql->bindValue(":posicao", $posicao);
    $p_sql->bindValue(":estado", $estado);
    $p_sql->bindValue(":fkgaleria", $fkgaleria);
    $p_sql->execute();

    //Redirecionar para a página principal
    header("Location: adm_fotos.php?id_galeria={$fkgaleria}");


} catch (Exception $e) {
    //MOSTRO MENSAGEM DE ERRO CASO EXISTA
    echo $e->getMessage();
}

exit();


