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

$casa = Casas::getById($_GET["id"]);

if ($casa == null) {
  $_SESSION["s_errors"]["generic"][] = 'A casa '.$_GET["id"].' não existe!';
  header("Location: ../../index.php");
}

$smarty->assign("casa", $casa);

$smarty->display('casa/delete.tpl');

?>
