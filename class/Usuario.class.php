<?php

class Usuario extends CRUD {
    protected $table = "usuario";

    private ?int $id = null;
    private $username;
    private $email;
    private $senha;
    private  $tipo;
    private $ativo;

    public function add() {
        $sql = "INSERT INTO $this->table (username, email, senha, tipo_usuario, ativo) VALUES (:username, :email, :senha, :tipo, :ativo)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $this->ativo, PDO::PARAM_INT);
        $stmt->execute();
        $this->id = $this->db->lastInsertId();
        return true;
    }

    public function update() {
        $sql = "UPDATE $this->table SET email = :email, senha = :senha, tipo_usuario = :tipo, ativo = :ativo WHERE idusuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':ativo', $this->ativo, PDO::PARAM_INT);

        if (!empty($this->senha)) {
            $stmt->bindValue(':senha', password_hash($this->senha, PASSWORD_DEFAULT), PDO::PARAM_STR);
        } else {
            // Se a senha não for fornecida, mantenha a senha atual
            $currentUser = $this->getById($this->id);
            if ($currentUser) {
                $stmt->bindValue(':senha', $currentUser['senha'], PDO::PARAM_STR);
            } else {
                // Se o usuário não existir, defina uma senha padrão ou lance um erro
                throw new Exception("Usuário não encontrado para atualização.");
            }
        }
        $stmt->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
}