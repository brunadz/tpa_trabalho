<?php

class Procedimento
{
    private $conn;
    public $table_name = "procedimento";

    public $id;
    public $nome;
    public $tipo;
    public $acoes;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, tipo, acoes) VALUES (:nome, :tipo, :acoes)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->acoes = htmlspecialchars(strip_tags($this->acoes));

        // Bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':acoes', $this->acoes);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne()
    {
        $query = "SELECT nome, tipo, acoes FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->tipo = $row['tipo'];
        $this->acoes = $row['acoes'];
    }

    // Update - Atualizar os dados de um usuário
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, tipo = :tipo, acoes = :acoes WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->acoes = htmlspecialchars(strip_tags($this->acoes));

        // Bind parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':acoes', $this->acoes);

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
