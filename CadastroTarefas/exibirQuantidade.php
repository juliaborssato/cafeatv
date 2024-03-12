<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, qtdCafe FROM quantidade ORDER BY qtdCafe ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Café</title>
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
                <p class="h3 text-center">Quantidade cadastrada</p>
            </div>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($tipo = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <th scope="row"><?php echo $tipo['id'] ?></th>
                        <td><?php echo $tipo['qtdCafe'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="form-edit-qtd.php?id=<?php echo $quantidade['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="deleteQuantidade.php?id=<?php echo $quantidade['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            </table>
        </div>
        <div class="container">
            <div class="card-footer">
                <p>Todos os direitos reservados a &copy;Copyright</p>
            </div>
        </div>
    </body>
</html>