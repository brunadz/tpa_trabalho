<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Prestadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Atualizando Prestadores</h1><br>
    <form action="index.php?action=update_prestador&id=<?php echo $prestador['id']; ?>" method="post" style="padding-left: 30px;">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($prestador['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <label for="cnpj">Data de Nascimento:</label>
        <input type="=number" id="cnpj" name="cnpj" value="<?php echo htmlspecialchars($prestador['cnpj'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <label for="telefone">Telefone:</label>
        <input type="number" id="telefone" name="telefone" value="<?php echo htmlspecialchars($prestador['telefone'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br><br>
        <button class="btn btn-primary" type="submit" value="Update">Atualizar</button>
    </form>
    <a href="index.php?action=prestador"><button style="position: absolute; right: 60px; top: 10px;" type="button" class="btn btn-dark">Voltar</button></a>
</body>

</html>