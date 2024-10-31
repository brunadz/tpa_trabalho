<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

</html>

<?php

include_once 'config/database.php';
include_once 'controllers/UserController.php';
include_once 'controllers/BeneficiarioController.php';
include_once 'controllers/PrestadorController.php';
include_once 'controllers/ProcedimentoController.php';


$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$beneficiarioController = new BeneficiarioController($db);
$prestadorController = new PrestadorController($db);
$procedimentoController = new ProcedimentoController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $userController->create($name, $email);
            echo $message;
            echo '<a href="index.php">Back to User List</a>';
        } else {
            include 'views/user/create.php';
        }
        break;

    case 'read_user':
        if ($id) {
            $user = $userController->readOne($id);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'update_user':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $userController->update($id, $name, $email);
                echo $message;
                echo '<a href="index.php">Back to User List</a>';
            } else {
                $user = $userController->readOne($id);
                include 'views/user/update.php';
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'delete_user':
        if ($id) {
            $message = $userController->delete($id);
            echo $message;
            echo '<a href="index.php">Back to User List</a>';
        } else {
            echo 'User ID is required.';
        }
        break;





    case 'create_beneficiario':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $data_nascimento = $_POST['data_nascimento'];
            $cpf = $_POST['cpf'];
            $sexo = $_POST['sexo'];
            $message = $beneficiarioController->create($nome, $data_nascimento, $cpf, $sexo);
            echo $message;
            echo '<a href="/project_mvc-main-tpaatividade/index.php?action=beneficiario"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de beneficiário</button></a>';
        } else {
            include 'views/beneficiario/create.php';
        }
        break;

    case 'read_beneficiario':
        if ($id) {
            $beneficiario = $beneficiarioController->readOne($id);
            if (is_array($beneficiario)) {
                include 'views/beneficiario/show.php';
            } else {
                echo $beneficiario; // Exibir mensagem de erro
            }
        } else {
            echo 'Beneficiario ID is required.';
        }
        break;

    case 'update_beneficiario':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'];
                $data_nascimento = $_POST['data_nascimento'];
                $cpf = $_POST['cpf'];
                $sexo = $_POST['sexo'];
                $message = $beneficiarioController->update($id, $nome, $data_nascimento, $cpf, $sexo);
                echo $message;
                echo '<a href="/project_mvc-main-tpaatividade/index.php?action=beneficiario"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de beneficiário</button></a>';
            } else {
                $beneficiario = $beneficiarioController->readOne($id);
                include 'views/beneficiario/update.php';
            }
        } else {
            echo 'Beneficiario ID is required.';
        }
        break;

    case 'delete_beneficiario':
        if ($id) {
            $message = $beneficiarioController->delete($id);
            echo $message;
            echo '<a href="/project_mvc-main-tpaatividade/index.php?action=beneficiario"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de beneficiário</button></a>';
        } else {
            echo 'Beneficiario ID is required.';
        }
        break;





    case 'create_prestador':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $cnpj = $_POST['cnpj'];
            $telefone = $_POST['telefone'];
            $message = $prestadorController->create($nome, $cnpj, $telefone);
            echo $message;
            echo '<a href="/project_mvc-main-tpaatividade/index.php?action=prestador"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de prestador</button></a>';
        } else {
            include 'views/prestador/create.php';
        }
        break;

    case 'read_prestador':
        if ($id) {
            $prestador = $prestadorController->readOne($id);
            if (is_array($prestador)) {
                include 'views/prestador/show.php';
            } else {
                echo $prestador; // Exibir mensagem de erro
            }
        } else {
            echo 'Prestador ID is required.';
        }
        break;

    case 'update_prestador':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'];
                $cnpj = $_POST['cnpj'];
                $telefone = $_POST['telefone'];
                $message = $prestadorController->update($id, $nome, $cnpj, $telefone);
                echo $message;
                echo '<a href="/project_mvc-main-tpaatividade/index.php?action=prestador"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de prestador</button></a>';
            } else {
                $prestador = $prestadorController->readOne($id);
                include 'views/prestador/update.php';
            }
        } else {
            echo 'Prestador ID is required.';
        }
        break;

    case 'delete_prestador':
        if ($id) {
            $message = $prestadorController->delete($id);
            echo $message;
            echo '<a href="/project_mvc-main-tpaatividade/index.php?action=prestador"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de prestador</button></a>';
        } else {
            echo 'Prestador ID is required.';
        }
        break;





    case 'create_procedimento':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $acoes = $_POST['acoes'];
            $message = $procedimentoController->create($nome, $tipo, $acoes);
            echo $message;
            echo '<a href="/project_mvc-main-tpaatividade/index.php?action=procedimento"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de procedimento</button></a>';
        } else {
            include 'views/procedimento/create.php';
        }
        break;

    case 'read_procedimento':
        if ($id) {
            $procedimento = $procedimentoController->readOne($id);
            if (is_array($procedimento)) {
                include 'views/procedimento/show.php';
            } else {
                echo $procedimento; // Exibir mensagem de erro
            }
        } else {
            echo 'Procedimento ID is required.';
        }
        break;

    case 'update_procedimento':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'];
                $tipo = $_POST['tipo'];
                $acoes = $_POST['acoes'];
                $message = $procedimentoController->update($id, $nome, $tipo, $acoes);
                echo $message;
                echo '<a href="/project_mvc-main-tpaatividade/index.php?action=procedimento"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de procedimento</button></a>';
            } else {
                $procedimento = $procedimentoController->readOne($id);
                include 'views/procedimento/update.php';
            }
        } else {
            echo 'Procedimento ID is required.';
        }
        break;

    case 'delete_procedimento':
        if ($id) {
            $message = $procedimentoController->delete($id);
            echo $message;
            echo '<a href="/project_mvc-main-tpaatividade/index.php?action=procedimento"><button style="position: absolute; left: 5px; top: 50px;" type="button" class="btn btn-dark">Voltar para a listagem de procedimento</button></a>';
        } else {
            echo 'Procedimento ID is required.';
        }
        break;



    case 'beneficiario':
        $beneficiario = $beneficiarioController->readAll();
        include 'views/beneficiario/index.php';
        break;

    case 'prestador':
        $prestador = $prestadorController->readAll();
        include 'views/prestador/index.php';
        break;

    case 'procedimento':
        $procedimento = $procedimentoController->readAll();
        include 'views/procedimento/index.php';
        break;

    case 'users':
        $users = $userController->readAll();
        include 'views/user/index.php';
        break;


    case 'login':
        $beneficiario = $beneficiarioController->readAll();
        include 'views/beneficiario/login.php';
        break;

    default:
        include 'views/home.php';
        break;
}
