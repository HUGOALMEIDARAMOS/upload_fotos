<?php

require_once 'ler_galeria.php';


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Galeria de Fotos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style type="text/css" media="screen">

body, html{
    margin: 0px;
    padding: 0px;
   

}

.card{
    height: 250px;
   
   }

.card::after{
    height: 200px;
    width: 350px!important;
    
}

    
</style>


</head>
<body>

<!--JUMBOTRON ONDE TEM O TITULO DA PAGINA-->

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Listando Galerias</h1>
                   <p class="lead">Lista de galerias, onde cada uma contém suas fotos especificas.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CONTAINER ONDE ESTÁ O BOTÃO PARA INSERIR NOVA GALERIA-->

<div class="container">

    <div class="row mb-4">
        <div class="col-sm-12 col-md-12">
         <!-- <a href="nova_galeria.php" class="btn btn-outline-primary" >Carregar Nova Galeria</a>-->
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCadastar"> Carregar Nova Galeria</button>
        </div>
    </div>

    <!-- LINHA ONDE OS CARDS DOS DADOS VINDO DO BANCO SE ENCONTRAM-->

    <div class="row">      
           <?php foreach ($dados as $dado): ?>
             <div class="col-sm-3 col-md-3 mb-2">
                <div class="card-group">
               <div class="card shadow" style="width: 18rem;">
                   <div class="card-body">
                       
                       <h5 class="card-title"><?= $dado['titulo'] ?></h5>
                       <h6 class="card-subtitle mb-2 text-muted"><?= $dado['fecha_alta'] ?></h6>
                       <p class="card-text text-justify text-lowercase"><?= $dado['descricao'] ?></p>
                    </div>

                    <div class="card-footer bg-transparent text-center">
                         <a href="excluir_galeria.php?id_galeria=<?= $dado['id_galeria'] ?>" class=" btn btn-danger"><small>Excluir</small></a>

    <a href="<?= $dado['id_galeria'] ?>" class=" btn btn-warning" data-toggle="modal" data-target="#modalEditar" data-whatever="<?= $dado['id_galeria'] ?>" 
    data-whatevertitulo="<?= $dado['titulo'] ?>"
    data-whateverdescricao="<?= $dado['descricao'] ?>"><small>Editar</small></a>
                         <a href="adm_fotos.php?id_galeria=<?= $dado['id_galeria'] ?>" class="btn btn-success"><small>Fotos</small></a>
                    </div>
                </div>
                 </div>
             </div>
           <?php endforeach; ?>       
    </div>
</div>

<!--MODAL PARA EDITAR A GALERIA-->

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">                     


        <form  method="post" action="atualizar_galeria.php">
            <input type="hidden" name="id_galeria" value="<?= isset($dado['id_galeria']) ? $dado['id_galeria'] : 0 ?>">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" placeholder="titulo do album" name="titulo" id="recipient-titulo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição</label>
           <textarea type="text" rows="5" cols=""  name="descricao" class="form-control"  id="recipient-descricao"></textarea>
          </div>
           <input type="hidden" id="id_galeria" name="id_galeria">
          <div class="modal-footer">       
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


<!--MODAL PARA CADASTRAR A GALERIA-->


<div class="modal fade" id="modalCadastar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">                     


        <form  method="post" action="guardar_galeria.php">
           
          <div class="form-group">
            <label for="titulo" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" placeholder="titulo do album" name="titulo" id="titulo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição</label>
           <textarea type="text" rows="5" cols=""  name="descricao" class="form-control"  id="descricao"></textarea>
          </div>          
          <div class="modal-footer">       
        <button type="submit" class="btn btn-primary">cadastrar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>













<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#modalEditar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') 
  var recipienttitulo = button.data('whatevertitulo') 
  var recipientdescricao = button.data('whateverdescricao') 
  var modal = $(this)
  modal.find('.modal-title').text('Edição de galeria')
  modal.find('#id_galeria').val(recipient)
  modal.find('#recipient-titulo').val(recipienttitulo)
  modal.find('#recipient-descricao').val(recipientdescricao)
})
</script>


</body>
</html>

<!--
 <a href="editar_galeria.php?id_galeria=<?= $dado['id_galeria'] ?>" class=" btn btn-warning"><small>Editar</small></a>
-->