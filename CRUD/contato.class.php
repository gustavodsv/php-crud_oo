<?php
class Contato {
    private $retorno;
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "root");
    }

    # C - CREATE
    public function adicionar($email, $nome = '') {
        // 1º Verificar se o email já existe no sistema
        // 2º Se não existe adicionar email

        if($this->existeEmail($email) == false) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
            $this->retorno = true;
            return true;
        } else {
            $this->retorno = false;
            return false;
        }
    }

    # R - READ
    public function getInfo($id){
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }

    # R - READ
    public function getAll() {
        $sql = "SELECT * FROM contatos WHERE status = 1";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }
    public function getAllDesativados() {
        $sql = "SELECT * FROM contatos WHERE status = 0";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    # U - UPDATE
    public function editar($nome, $id) {
        $sql = "UPDATE contatos SET nome = :nome WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
    # U - UPDATE STATUS
    public function desativarStatus($id) {
        $sql = "UPDATE contatos SET status = 0 WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
    public function ativarStatus($id) {
        $sql = "UPDATE contatos SET status = 1 WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    # D - DELETE
    public function excluirPeloId($id) {
        $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
    }
    public function excluirPeloEmail($email) {
        $sql = "DELETE FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();
    }
    

    private function existeEmail($email) {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    
}