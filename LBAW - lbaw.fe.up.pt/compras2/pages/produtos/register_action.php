<?php

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/NaoAlimenticio.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
if ($_POST["nome"] == "") 
  $_SESSION["s_errors"]["uemail"] = 'O nome nao pode ser vazio';

if ($_POST["unidade_medida"] == "") 
  $_SESSION["s_errors"]["uname"] = 'A unidade de medida nao pode ser vazia';

// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$nome = $_POST["nome"];
$unidade_medida = $_POST["unidade_medida"];

if($_GET["type"]=="ingrediente")
$tipo = $_POST["tipo"];

if($_GET["type"]=="ingrediente")
$errors = Ingredientes::insert($nome, $unidade_medida, $tipo);
else if($_GET["type"]=="produto")
$errors = NaoAlimenticios::insert($nome, $unidade_medida);
else{
  $_SESSION["s_errors"]["generic"][] = 'O Tipo tem que ser ou produto ou ingrediente!'; 
  header("Location: ../../index.php");
  die;
}	

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
if($_GET["type"]=="ingrediente")
  $_SESSION["s_messages"][] = "Ingrediente criado com sucesso.";
else if($_GET["type"]=="produto")
  $_SESSION["s_messages"][] = "Produto criado com sucesso.";
  header("Location: ../main/index.php");
}

?>