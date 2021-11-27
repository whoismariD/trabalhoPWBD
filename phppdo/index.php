<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM cadastro ORDER BY name ASC";

// SQL para selecionar os registros
$sql = "SELECT id, codigo, titulo, autor, anoLancamento "
        . "FROM cadastro ORDER BY name ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <p><a href="form-add.php">Adicionar Livro</a></p>
        <h2>Lista de Livros</h2>
        <p>Total de livros: <?php echo $total ?></p>
        <?php if ($total > 0): ?>
            <table width="50%" border="1">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Ano de Lançamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cadastro = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?=$cadastro['codigo'] ?></td>
                            <td><?=$cadastro['titulo'] ?></td>
                            <td><?=($cadastro['autor'] ?></td>
                            <td><?=dateConvert($cadastro['anoLancamento']) ?></td>
                                <a href="form-edit.php?id=<?=$cadastro['id'] ?>">Editar</a>
                                <a href="delete.php?id=<?=$cadastro['id'] ?>" 
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum livro registrado</p>
        <?php endif; ?>
    </body>
</html>