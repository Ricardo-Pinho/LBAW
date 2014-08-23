<?php

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Utilizador.php');
require_once('../../database/Utilizadores.php');

$user = $s_id;

$house = $_POST["id"];
if($_GET["remuser"]=="true")
$house = $_GET["id"];

$arr = Casa_Utilizador::getIdByUserAndHouse($user,$house);

if($arr!=null){
	$ok=true;
}

if($ok==false&&$s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Esta casa não lhe pretence';
	header("Location: ../../index.php");
	die;
	}

if($_GET["remuser"]=="true")
{
	$houseid = $_GET["id"];
	$userid = $_GET["userid"];
	$errors = Casa_Utilizador::remuser($houseid,$userid);

	if ($errors) {
	  $_SESSION["s_errors"] = $errors;
	  header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	else {
	  $_SESSION["s_messages"][] = 'Utilizador removido da casa com sucesso';
	  header("Location: vercasa.php?id=" .$houseid);
	}
}

else if($_GET["adduser"]=="true")
{
	$houseid = $_POST["id"];
	$mail = $_POST["mail"];
	$userid = Users::getIdbyEmail($mail);
	$var = Casa_Utilizador::getConnection($houseid,$userid);
	if($var==null)
		$errors = Casa_Utilizador::AddUser($houseid,$userid);
	else{
		$_SESSION["s_errors"]["generic"][] = 'Este utilizador já pertence a esta casa';
		header("Location: ../../index.php");
		die;
	}

	if ($errors) {
	  $_SESSION["s_errors"] = $errors;
	  header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	else {
	  $_SESSION["s_messages"][] = 'Utilizador Adicionado a casa com sucesso';
	  header("Location: vercasa.php?id=" .$houseid);
	}
}
else {
// check parameters
if ($_POST["nome"] == "") 
  $_SESSION["s_errors"]["generic"][] = 'O nome não pode ser vazio';

// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$name =  $_POST["nome"];
$morada = $_POST["morada"];
$id = $_POST["id"];

$errors = Casas::update($name,$morada,$id);	

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
  $_SESSION["s_messages"][] = 'Casa alterada com sucesso';
  header("Location: vercasa.php?id=" . $id);
}

}

?>