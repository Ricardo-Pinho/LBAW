<?php

require_once('../../includes/base.php');
require_once('../../database/Loja.php');

if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

if ($s_values)
  $loja = $s_values;

$loja = Lojas::getById($_GET["id"]);

if ($loja == null) {
  $_SESSION["s_errors"]["generic"][] = 'A loja não existe!';
  header("Location: ../../index.php");
}


$smarty->assign("loja", $loja);

$smarty->display('loja/edit.tpl');

?>
