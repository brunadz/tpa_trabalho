<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Procedimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Lista de Procedimentos</h1><br>
    <a style="padding-left: 30px;" href="index.php?action=create_procedimento"><button class="btn btn-primary" type="button">Criar um novo procedimento</button></a><br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($procedimento as $procedimento): ?>
                <tr>
                    <td><?php echo htmlspecialchars($procedimento['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($procedimento['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($procedimento['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($procedimento['acoes'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="index.php?action=read_procedimento&id=<?php echo $procedimento['id']; ?>">Ver</a>
                        <a href="index.php?action=update_procedimento&id=<?php echo $procedimento['id']; ?>">Editar</a>
                        <a href="index.php?action=delete_procedimento&id=<?php echo $procedimento['id']; ?>">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php"><button style="position: absolute; right: 60px; top: 10px;" type="button" class="btn btn-dark">Voltar</button></a>
</body>

</html>