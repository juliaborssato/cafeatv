<?php
    require_once 'init.php';
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : null;
    $tipo_id = isset($_POST['selectTipo']) ? $_POST['selectTipo'] : null;
   

    // validação (bem simples, só pra evitar dados vazios)
    if (empty($quantidade) || empty($tipo_id))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE quantidade SET qtdCafe = :quantidade, tipo_id = :tipo_id WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':qtd', $quantidade);
    $stmt->bindParam(':tipo_id', $tipo_id);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: msgSucesso.html');
    }
    else
    {
        echo "Erro ao alterar!";
        print_r($stmt->errorInfo());
    }
?>