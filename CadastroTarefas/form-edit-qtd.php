<?php
    require 'init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (empty($id))
    {
        echo "ID para alteração não definido";
        exit;
    }
    $PDO = db_connect();
    $sqlcafe = "SELECT id, qtdCafe, tipo_id FROM quantidade WHERE id = :id";
    $stmtcafe = $PDO->prepare($sqlTarefa);
    $stmtcafe->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtcafe->execute();
    $cafe = $stmtTarefa->fetch(PDO::FETCH_ASSOC);
    if (!is_array($tarefa))
    {
        echo "Nenhum cadastro encontrado";
        exit;
    }
    $sqlTipo = "SELECT id, tiposCafe FROM tipos ORDER BY tiposCafe ASC";
    $stmtTipo = $PDO->prepare($sqlTipo);
    $stmtTipo->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div id="menu"></div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Editar quantidade café</p>
        </div>
        <form action="editQuantidade.php" method="post">
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo $cafe['qtdCafe'] ?>">
            </div>
            <div class="form-group">
                <label for="selectTipo">Selecione o tipo do café</label>
                <select class="form-control" name="selectTipo" id="selectTipo">

                  <?php while($dados = $stmtTipo->fetch(PDO::FETCH_ASSOC)): ?>

                        <option value=" <?php echo $dados['id'] ?> "> <?php echo $dados['qtdCafe'] ?> </option>
                      
                  <?php endwhile; ?>

                </select>
        
              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html">Cancelar</a>
              </div>
          </form>  
    </div>
    <div class="container">
        <div class="card-footer">
            <p>Todos os direitos reservados a &copy;Copyright</p>
        </div>
    </div>
</body>
</html>