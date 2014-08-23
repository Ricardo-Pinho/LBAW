<?php

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Utilizadores.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/
if($s_user == "") {
  $_SESSION["s_errors"]["generic"][] = 'Tem que fazer o login primeiro';
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
$morada = $_POST["morada"];

$errors = Casas::insert($name, $morada,$s_id);	

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
  $_SESSION["s_messages"][] = "Casa criada com sucesso.";
  header("Location: ../main/index.php");
}

?>