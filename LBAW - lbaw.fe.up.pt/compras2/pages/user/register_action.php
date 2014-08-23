<?php

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
if ($_POST["email"] == "") 
  $_SESSION["s_errors"]["uemail"] = 'O login nao pode ser vazio';

if ($_POST["nome"] == "") 
  $_SESSION["s_errors"]["uname"] = 'O nome nao pode ser vazio';

if ($_POST["password"] == "") 
  $_SESSION["s_errors"]["upass"] = 'A password nao pode ser vazia';

// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$email = $_POST["email"];
$pass = $_POST["password"];
$name = $_POST["nome"];
if($s_type == "admin")
{
if($_POST["gestor"] == "1")
	$gestor = TRUE;
if($_POST["gestor"] == "2"){
	$gestor = FALSE;
	$errors = Users::insert($name, $email, $pass);
	}
if($gestor == TRUE){
$semana_entrada =  $_POST["semana_entrada"];
$semana_saida = $_POST["semana_saida"];
$fsemana_entrada =  $_POST["fsemana_entrada"];
$fsemana_saida = $_POST["fsemana_saida"];
$semana_entrada_min =  $_POST["semana_entrada_min"];
$semana_saida_min = $_POST["semana_saida_min"];
$fsemana_entrada_min =  $_POST["fsemana_entrada_min"];
$fsemana_saida_min = $_POST["fsemana_saida_min"];
$errors = Users::insertadmin($name, $gestor, $fsemana_entrada, $fsemana_entrada_min, $fsemana_saida, $fsemana_saida_min, $semana_entrada, $semana_entrada_min, $semana_saida, $semana_saida_min, $pass , $email);
}
}

else
$errors = Users::insert($name, $email, $pass);	

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
  $_SESSION["s_messages"][] = "Utilizador criado com sucesso. Pode fazer Login.";
  header("Location: ../main/index.php");
}

?>