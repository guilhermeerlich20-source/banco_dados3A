<?php

spl_autoload_register(function($class){
   require_once "class/{$class}.class.php";
});

$ex = new Exercicio();


if(filter_has_var((INPUT_POST), "btnSalvar")){
$idRaw = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$id = ($idRaw === null || $idRaw === '') ? null : (int)$idRaw;
$ex->setid($id);

$ex->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
$ex->setDescricao(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));
$ex->setGrupoMuscular(filter_input(INPUT_POST, "grupoMuscular", FILTER_SANITIZE_STRING));
if($ex->getid()>0){
   if($ex->update()){
      header("Location:exercicios.php");
   }
   }else{

if($ex->add()){
   header("Location:exercicios.php");
    }

  }

}elseif (filter_has_var(INPUT_POST, "btnExcluir")) {
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    if ($ex->delete('idexercicio', $id)) {
        header("Location: exercicios.php");
    }
}