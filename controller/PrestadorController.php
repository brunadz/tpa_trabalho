<?php

include_once 'models/Prestador.php';

class prestadorController
{
    private $db;
    private $prestador;

    public function __construct($db)
    {
        $this->db = $db;
        $this->prestador = new Prestador($db);
    }

    // Método para criar um novo usuário
    public function create($nome, $cnpj, $telefone)
    {
        $this->prestador->nome = $nome;
        $this->prestador->cnpj = $cnpj;
        $this->prestador->telefone = $telefone;

        if ($this->prestador->create()) {
            return "Prestador criado.";
        } else {
            return "Não foi possível criar um prestador.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id)
    {
        $this->prestador->id = $id;
        $this->prestador->readOne();

        if ($this->prestador->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $prestador_arr = array(
                "id" => $this->prestador->id,
                "nome" => $this->prestador->nome,
                "cnpj" => $this->prestador->cnpj,
                "telefone" => $this->prestador->telefone,
            );
            return $prestador_arr;
        } else {
            return "Prestador não localizada.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $nome, $cnpj, $telefone)
    {
        $this->prestador->id = $id;
        $this->prestador->nome = $nome;
        $this->prestador->cnpj = $cnpj;
        $this->prestador->telefone = $telefone;

        if ($this->prestador->update()) {
            return "Prestador atualizada.";
        } else {
            return "Não foi possível atualizar o prestador.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id)
    {
        $this->prestador->id = $id;

        if ($this->prestador->delete()) {
            return "Prestador excluído.";
        } else {
            return "Nao foi possível excluir o prestador.";
        }
    }
    public function index()
    {
        return $this->readAll();
    }

    // Método para listar todos os usuários (exemplo adicional)
    public function readAll()
    {
        $query = "SELECT id, nome, cnpj, telefone FROM " . $this->prestador->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $prestadors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $prestadors;
    }
}
