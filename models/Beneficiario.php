<?php

class Beneficiario
{
    private $conn;
    public $table_name = "beneficiario";

    public $id;
    public $nome;
    public $data_nascimento;
    public $cpf;
    public $sexo;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, data_nascimento, cpf, sexo) VALUES (:nome, :data_nascimento, :cpf, :sexo)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));

        // Bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':sexo', $this->sexo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne()
    {
        $query = "SELECT nome, data_nascimento, cpf, sexo FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->data_nascimento = $row['data_nascimento'];
        $this->cpf = $row['cpf'];
        $this->sexo = $row['sexo'];
    }

    // Update - Atualizar os dados de um usuário
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, data_nascimento = :data_nascimento, cpf = :cpf, sexo = :sexo WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));

        // Bind parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':sexo', $this->sexo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
