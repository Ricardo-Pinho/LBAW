<?php

require_once('../../includes/base.php');
require_once('../../database/Loja.php');


if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

$store = Lojas::getById($_GET["id"]);

if ($store == null) {
  $_SESSION["s_errors"]["generic"][] = 'Esta loja não existe!';
  header("Location: ../../index.php");
}

$smarty->assign("loja", $store);

$smarty->display('loja/delete.tpl');

?>
