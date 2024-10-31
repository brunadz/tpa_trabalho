<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes dos beneficiários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Detalhes dos beneficiários</h1><br>
    <p style="padding-left: 30px;"><strong>ID:</strong> <?php echo htmlspecialchars($beneficiario['id'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p style="padding-left: 30px;"><strong>Nome:</strong> <?php echo htmlspecialchars($beneficiario['nome'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p style="padding-left: 30px;"><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($beneficiario['data_nascimento'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p style="padding-left: 30px;"><strong>CPF:</strong> <?php echo htmlspecialchars($beneficiario['cpf'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p style="padding-left: 30px;"><strong>Sexo:</strong> <?php echo htmlspecialchars($beneficiario['sexo'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="index.php?action=beneficiario"><button style="position: absolute; right: 60px; top: 10px;" type="button" class="btn btn-dark">Voltar</button></a>
</body>

</html>