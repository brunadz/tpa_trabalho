<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Prestadores</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de Prestadores</h1><br>
    <a style="padding-left: 30px;" href="index.php?action=create_prestador"><button class="btn btn-primary" type="button">Criar um novo prestador</button></a><br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestador as $prestador): ?>
                <tr>
                    <td><?php echo htmlspecialchars($prestador['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($prestador['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($prestador['cnpj'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($prestador['telefone'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="index.php?action=read_prestador&id=<?php echo $prestador['id']; ?>">Ver</a>
                        <a href="index.php?action=update_prestador&id=<?php echo $prestador['id']; ?>">Editar</a>
                        <a href="index.php?action=delete_prestador&id=<?php echo $prestador['id']; ?>">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php"><button style="position: absolute; right: 60px; top: 10px;" type="button" class="btn btn-dark">Voltar</button></a>
</body>

</html>