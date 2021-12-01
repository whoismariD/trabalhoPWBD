<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT codigo, titulo, autor, anoLancamento FROM livros WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$livros = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($livros)) {
    echo "Nenhum livro encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
          <!- head elements (Meta, title, etc) -->
         <!-- Link your php/css file -->
        <link rel="stylesheet" href="stylesheets.php" media="screen">
        <meta charset="utf-8">
        <title>Edição de Livro</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <h2>Edição de Livro</h2>
        <form action="edit.php" method="post">
            <label for="codigo">Codigo do Livro: </label>
            <br>
            <input type="text" name="codigo" id="codigo" value="<?php echo $livros['codigo'] ?>">
            <br><br>
            <label for="titulo">Titulo: </label>
            <br>
            <input type="text" name="titulo" id="titulo" value="<?php echo $livros['titulo'] ?>">
            <br><br>
            <label for="autor">Autor: </label>
            <br>
            <input type="text" name="autor" id="autor" value="<?php echo $livros['autor'] ?>">
            <br><br>
            <label for="anoLancamento">Ano de Lançamento: </label>
            <br>
            <input type="text" name="anoLancamento" id="anoLancamento" placeholder="dd/mm/YYYY" 
                   value="<?php echo dateConvert($livros['anoLancamento']) ?>">
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar">
        </form>
    </body>
</html>