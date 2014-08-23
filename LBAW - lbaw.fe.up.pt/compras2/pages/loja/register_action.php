<?php

require_once('../../includes/base.php');
require_once('../../database/Loja.php');

if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

// check parameters
if ($_POST["nome"] == "") 
  $_SESSION["s_errors"]["generic"][] = 'O nome nao pode ser vazio';

// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$name = $_POST["nome"];
$contacto = $_POST["contacto"];

$errors = Lojas::insert($name, $contacto);	

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
  $_SESSION["s_messages"][] = "Loja criada com sucesso.";
  header("Location: ../main/index.php");
}

?>