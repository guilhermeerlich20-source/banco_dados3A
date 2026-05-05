<?php

spl_autoload_register(function($class){
   require_once "class/{$class}.class.php";
});

$ex = new Exercicio();


if(filter_has_var((INPUT_POST), "btnSalvar")){
$ex->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
$ex->setDescricao(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));
$ex->setGrupoMuscular(filter_input(INPUT_POST, "grupoMuscular", FILTER_SANITIZE_STRING));

if($ex->add()){
   header("Location:exercicios.php");
}
}