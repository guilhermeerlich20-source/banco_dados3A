<?php

class Exercicio extends CRUD {
   protected $table = "exercicio";

   private $id;
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
      // Implement update logic here
   }

   public function getid($id) {
     return $this->id;
     }

     public function getNome($nome) {
       return $this->nome;
     }

     public function getDescricao($descricao) {
       return $this->descricao;
     }

     public function getGrupoMuscular($grupomuscular) {
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