<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Detalhes de usuário</h1><br>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="index.php">Voltar para lista de usuários</a>
</body>
</html>
