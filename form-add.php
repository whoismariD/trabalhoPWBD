<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
          <!- head elements (Meta, title, etc) -->
         <!-- Link your php/css file -->
        <link rel="stylesheet" href="stylesheets.php" media="screen">
        <meta charset="utf-8">
        <title>Cadastro de Livros</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <h2>Cadastro de Livros</h2>
        <form action="add.php" method="post">
            <label for="codigo">Codigo do Livro: </label>
            <br>
            <input type="text" name="codigo" id="codigo">
            <br><br>
            <label for="titulo">Titulo: </label>
            <br>
            <input type="text" name="titulo" id="titulo">
            <br><br>
            <label for="autor">Autor: </label>
            <br>
            <input type="text" name="autor" id="autor">
            <br><br>
            <label for="anoLancamento">Ano de Lançamento: </label>
            <br>
            <input type="text" name="anoLancamento" id="anoLancamento" placeholder="dd/mm/YYYY">
            <br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
