<?php

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/NaoAlimenticio.php');

// check privileges
/*if ($s_type != "admin" && $s_user !=$_GET["id"]) {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O ID é obrigatório!'; 
  header("Location: ../../index.php");
  die;
}

if($_GET["type"]=="ingrediente")
{
	$ingrediente = Ingredientes::getById($_GET["id"]);

	if ($ingrediente == null) {
	  $_SESSION["s_errors"]["generic"][] = 'O ingrediente '.$_GET["id"].' não existe!';
	  header("Location: ../../index.php");
	}

	$smarty->assign("ingrediente", $ingrediente);

	$smarty->display('produtos/delete.tpl');
}

else if($_GET["type"]=="produto"){
	$produto = NaoAlimenticios::getById($_GET["id"]);

	if ($produto == null) {
	  $_SESSION["s_errors"]["generic"][] = 'O produto '.$_GET["id"].' não existe!';
	  header("Location: ../../index.php");
	}

	$smarty->assign("produto", $produto);

	$smarty->display('produtos/delete.tpl');
}
else{
  $_SESSION["s_errors"]["generic"][] = 'O Tipo tem que ser ou produto ou ingrediente!'; 
  header("Location: ../../index.php");
  die;
}

?>

