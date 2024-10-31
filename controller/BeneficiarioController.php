<?php

include_once 'models/Beneficiario.php';

class beneficiarioController
{
    private $db;
    private $beneficiario;

    public function __construct($db)
    {
        $this->db = $db;
        $this->beneficiario = new Beneficiario($db);
    }

    // Método para criar um novo usuário
    public function create($nome, $data_nascimento, $cpf, $sexo)
    {
        $this->beneficiario->nome = $nome;
        $this->beneficiario->data_nascimento = $data_nascimento;
        $this->beneficiario->cpf = $cpf;
        $this->beneficiario->sexo = $sexo;

        if ($this->beneficiario->create()) {
            return "Beneficiário criado.";
        } else {
            return "Não foi possível criar um beneficiário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id)
    {
        $this->beneficiario->id = $id;
        $this->beneficiario->readOne();

        if ($this->beneficiario->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $beneficiario_arr = array(
                "id" => $this->beneficiario->id,
                "nome" => $this->beneficiario->nome,
                "data_nascimento" => $this->beneficiario->data_nascimento,
                "cpf" => $this->beneficiario->cpf,
                "sexo" => $this->beneficiario->sexo
            );
            return $beneficiario_arr;
        } else {
            return "Beneficiário não localizada.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $nome, $data_nascimento, $cpf, $sexo)
    {
        $this->beneficiario->id = $id;
        $this->beneficiario->nome = $nome;
        $this->beneficiario->data_nascimento = $data_nascimento;
        $this->beneficiario->cpf = $cpf;
        $this->beneficiario->sexo = $sexo;

        if ($this->beneficiario->update()) {
            return "Beneficiário atualizada.";
        } else {
            return "Não foi possível atualizar o beneficiário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id)
    {
        $this->beneficiario->id = $id;

        if ($this->beneficiario->delete()) {
            return "Beneficiário excluído.";
        } else {
            return "Nao foi possível excluir o beneficiário.";
        }
    }
    public function index()
    {
        return $this->readAll();
    }

    // Método para listar todos os usuários (exemplo adicional)
    public function readAll()
    {
        $query = "SELECT id, nome, data_nascimento, cpf, sexo FROM " . $this->beneficiario->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $beneficiarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $beneficiarios;
    }
}
