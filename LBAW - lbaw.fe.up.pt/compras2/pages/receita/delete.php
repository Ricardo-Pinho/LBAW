<?php

require_once('../../includes/base.php');
require_once('../../database/Receita.php');


if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

$receita = Receitas::getById($_GET["id"]);

if ($receita == null) {
  $_SESSION["s_errors"]["generic"][] = 'Esta receita não existe!';
  header("Location: ../../index.php");
}

$smarty->assign("receita", $receita);

$smarty->display('receita/delete.tpl');

?>
