<?php

include_once 'models/Procedimento.php';

class procedimentoController
{
    private $db;
    private $procedimento;

    public function __construct($db)
    {
        $this->db = $db;
        $this->procedimento = new Procedimento($db);
    }

    // Método para criar um novo usuário
    public function create($nome, $tipo, $acoes)
    {
        $this->procedimento->nome = $nome;
        $this->procedimento->tipo = $tipo;
        $this->procedimento->acoes = $acoes;

        if ($this->procedimento->create()) {
            return "Procedimento criado.";
        } else {
            return "Não foi possível criar um rocedimento.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id)
    {
        $this->procedimento->id = $id;
        $this->procedimento->readOne();

        if ($this->procedimento->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $procedimento_arr = array(
                "id" => $this->procedimento->id,
                "nome" => $this->procedimento->nome,
                "tipo" => $this->procedimento->tipo,
                "acoes" => $this->procedimento->acoes
            );
            return $procedimento_arr;
        } else {
            return "Procedimento não localizada.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $nome, $tipo, $acoes)
    {
        $this->procedimento->id = $id;
        $this->procedimento->nome = $nome;
        $this->procedimento->tipo = $tipo;
        $this->procedimento->acoes = $acoes;

        if ($this->procedimento->update()) {
            return "Procedimento atualizado.";
        } else {
            return "Não foi possível atualizar o procedimento.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id)
    {
        $this->procedimento->id = $id;

        if ($this->procedimento->delete()) {
            return "Procedimento excluído.";
        } else {
            return "Nao foi possível excluir o procedimento.";
        }
    }
    public function index()
    {
        return $this->readAll();
    }

    // Método para listar todos os usuários (exemplo adicional)
    public function readAll()
    {
        $query = "SELECT id, nome, tipo, acoes FROM " . $this->procedimento->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $procedimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $procedimentos;
    }
}
