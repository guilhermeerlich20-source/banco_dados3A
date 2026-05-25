<?php

class Exercicio extends CRUD {
   protected $table = "exercicio";

  private ?int $id = null;
  private $nome;

   private $descricao;

   private $grupomuscular;

   public function add() {
      $sql = "INSERT INTO $this->table (nome, descricao, grupo_muscular) VALUES (:nome, :descricao, :grupoMuscular)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
      $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
      $stmt->bindParam(':grupoMuscular', $this->grupomuscular, PDO::PARAM_STR);
      return $stmt->execute();    
   }

   public function update() {
      $sql = "UPDATE $this->table SET nome = :nome, descricao = :descricao, grupo_muscular = :grupoMuscular WHERE idexercicio = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(":id",$this->id, PDO::PARAM_INT);
      $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
      $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
      $stmt->bindParam(':grupoMuscular', $this->grupomuscular, PDO::PARAM_STR);
      return $stmt->execute();
   }

   public function getid() {
     return $this->id;
   }

   public function getNome() {
     return $this->nome;
   }

   public function getDescricao() {
     return $this->descricao;
   }

   public function getGrupoMuscular() {
     return $this->grupomuscular;
   }

   public function setid($id) {
     $this->id = $id;
   }

   public function setNome($nome) {
     $this->nome = $nome;
   }

   public function setDescricao($descricao) {
     $this->descricao = $descricao;
   }

   public function setGrupoMuscular($grupomuscular) {
     $this->grupomuscular = $grupomuscular;
   }
}