<?php
require_once 'init.php';
// resgata os valores do formulário
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
$autor = isset($_POST['autor']) ? $_POST['autor'] : null;
$anoLancamento = isset($_POST['anoLancamento']) ? $_POST['anoLancamento'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
// validação (bem simples, mais uma vez)
if (empty($codigo) || empty($titulo) || empty($autor) || empty($anoLancamento))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($anoLancamento);
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE livros SET codigo = :codigo, titulo = :titulo,"
        . " autor = :autor, anoLancamento = :anoLancamento WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':autor', $autor);
$stmt->bindParam(':anoLancamento', $isoDate);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}