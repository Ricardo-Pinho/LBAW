<?php

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Utilizadores.php');
require_once('../../database/Casa_Utilizador.php');

$user = $s_id;
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

$errors = Casas::delete($house);	

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: vercasa.php?id=".$house);
}

else {
$_SESSION["s_messages"][] = 'Casa '.$house.' removida com sucesso';
header("Location: ../../index.php");
}
