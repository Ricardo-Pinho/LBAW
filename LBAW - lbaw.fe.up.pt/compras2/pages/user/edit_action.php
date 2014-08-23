<?php

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

// check privileges
if ($s_type != "admin" && $s_user !=$_POST["email"]) {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}
if($_GET["password"]==true)
{
if ($_POST["oldpassword"] == "") 
  $_SESSION["s_errors"]["generic"][] = 'A password antiga não pode ser vazia';
  
if ($_POST["newpassword1"] == "") 
  $_SESSION["s_errors"]["generic"][] = 'A password nova não pode ser vazia';
  
if ($_POST["newpassword1"] == "") 
  $_SESSION["s_errors"]["generic"][] = 'Tem que Confirmar a password';

if($_POST["newpassword1"]!=$_POST["newpassword2"])
  $_SESSION["s_errors"]["generic"][] = 'A nova password e a confirmacao nao sao iguais';
  
// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$email = $_POST["email"];
$oldpassword =  $_POST["oldpassword"];
$newpassword = $_POST["newpassword1"];

$errors = Users::updatepassword($newpassword, $email, $oldpassword);

}
else{
// check parameters
if ($_POST["nome"] == "") 
  $_SESSION["s_errors"]["generic"][] = 'O nome não pode ser vazio';

// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$email = $_POST["email"];
$name =  $_POST["nome"];
if($s_type == "admin")
{
if($_POST["gestor"] == "1")
	{
	$gestor = TRUE;
	}
if($_POST["gestor"] == "2")
	{
	$gestor = FALSE;
	$errors = Users::adminrevoke($email, $name);
	}
if($gestor==TRUE){
$semana_entrada =  $_POST["semana_entrada"];
$semana_entrada_min =  $_POST["semana_entrada_min"];
$semana_saida = $_POST["semana_saida"];
$semana_saida_min = $_POST["semana_saida_min"];
$fsemana_entrada =  $_POST["fsemana_entrada"];
$fsemana_entrada_min =  $_POST["fsemana_entrada_min"];
$fsemana_saida = $_POST["fsemana_saida"];
$fsemana_saida_min = $_POST["fsemana_saida_min"];
$errors = Users::adminupdate($name, $gestor, $fsemana_entrada, $fsemana_entrada_min, $fsemana_saida, $fsemana_saida_min, $semana_entrada, $semana_entrada_min, $semana_saida, $semana_saida_min, $email);
}
}

else
$errors = Users::update($email, $name);	
}

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
  $_SESSION["s_messages"][] = 'Utilizador alterado com sucesso';
  header("Location: verconta.php?id=" . $email);
}

?>