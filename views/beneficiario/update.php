<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Beneficiários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Atualizando Beneficiários</h1><br>
    <form action="index.php?action=update_beneficiario&id=<?php echo $beneficiario['id']; ?>" method="post" style="padding-left: 30px;">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($beneficiario['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($beneficiario['data_nascimento'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <label for="cpf">CPF:</label>
        <input type="number" id="cpf" name="cpf" value="<?php echo htmlspecialchars($beneficiario['cpf'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" value="<?php echo htmlspecialchars($beneficiario['sexo'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <button class="btn btn-primary" type="submit" value="Update">Atualizar</button>
    </form>
    <a href="index.php?action=beneficiario"><button style="position: absolute; right: 60px; top: 10px;" type="button" class="btn btn-dark">Voltar</button></a>
</body>

</html>