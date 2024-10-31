<?php

class Prestador
{
    private $conn;
    public $table_name = "prestador";

    public $id;
    public $nome;
    public $cnpj;
    public $telefone;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, cnpj, telefone) VALUES (:nome, :cnpj, :telefone)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cnpj = htmlspecialchars(strip_tags($this->cnpj));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));

        // Bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':telefone', $this->telefone);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne()
    {
        $query = "SELECT nome, cnpj, telefone FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->cnpj = $row['cnpj'];
        $this->telefone = $row['telefone'];
    }

    // Update - Atualizar os dados de um usuário
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, cnpj = :cnpj, telefone = :telefone WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cnpj = htmlspecialchars(strip_tags($this->cnpj));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));

        // Bind parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':telefone', $this->telefone);

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
