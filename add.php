<?php
require_once 'init.php';

// pega os dados do formuário
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
$autor = isset($_POST['autor']) ? $_POST['autor'] : null;
$anoLancamento = isset($_POST['anoLancamento']) ? $_POST['anoLancamento'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($codigo) || empty($titulo) || empty($autor) || empty($anoLancamento))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($anoLancamento);
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO livros(codigo, titulo, autor, anoLancamento) VALUES(:codigo, :titulo, :autor, :anoLancamento)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':autor', $autor);
$stmt->bindParam(':anoLancamento', $isoDate);

if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}