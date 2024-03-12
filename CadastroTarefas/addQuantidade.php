<?php
require_once 'init.php';
// pega os dados do formuário
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : null;
$tipo_id = isset($_POST['selectTipo']) ? $_POST['selectTipo'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($quantidade) || empty($tipo_id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO quantidade(qtdCafe, tipoid) VALUES(:qtd, :tipo_id)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':qtd', $quantidade);
$stmt->bindParam(':tipo_id', $tipo_id);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>