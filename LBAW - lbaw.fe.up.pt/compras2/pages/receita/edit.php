<?php

require_once('../../includes/base.php');
require_once('../../database/Receita.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Utilizador.php');

if ($_GET["addhouse"]=="true"){
			if($s_user=="")
			{
				$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
				header("Location: ../../index.php");
				die;
			}
			if($s_type!="admin")
				$casas = Casa_Utilizador::getHousesbyUser($s_id);
			else
				$casas = Casas::getAll();
			$nohouses=false;
			if($casas==null)
				$nohouses=true;
			
			$receita = Receitas::getById($_GET["id"]);
			
			$smarty->assign("nohouses", $nohouses);
			$smarty->assign("casas", $casas);
			$smarty->assign("receita", $receita);
			$smarty->assign("s_id", $s_id);
			$smarty->display('receita/addreceita.tpl');
		}
else{

if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

if ($s_values)
  $receita = $s_values;

$receita = Receitas::getById($_GET["id"]);

if ($receita == null) {
  $_SESSION["s_errors"]["generic"][] = 'A receita não existe!';
  header("Location: ../../index.php");
}


$smarty->assign("receita", $receita);

$smarty->display('receita/edit.tpl');

}

?>
