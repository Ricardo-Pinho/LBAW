<?php

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/NaoAlimenticio.php');
require_once('../../database/Casa_Utilizador.php');
require_once('../../database/Casas.php');
require_once('../../database/Loja.php');

// check parameters
if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O ID é obrigatório!'; 
  header("Location: ../../index.php");
  die;
}

if($_GET["type"]=="ingrediente"){
	if ($s_values)
	  $ingrediente = $s_values;
	else
	  $ingrediente = Ingredientes::getById($_GET["id"]);

	if ($ingrediente == null) {
	  $_SESSION["s_errors"]["generic"][] = 'O ingrediente '.$_GET["id"].' não existe!';
	  header("Location: ../../index.php");
	  die;
	}


	$smarty->assign("ingrediente", $ingrediente);

	if($_GET["addhouse"]!="true" && $_GET["addstore"]!="true")
		$smarty->display('produtos/edit.tpl');
	else if ($_GET["addhouse"]=="true"){
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
			
			$smarty->assign("nohouses", $nohouses);
			$smarty->assign("casas", $casas);
			$smarty->display('produtos/addingrediente.tpl');
		}
	else{
			if($s_user=="")
			{
				$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
				header("Location: ../../index.php");
				die;
			}
			if($s_type=="admin")
				$lojas = Lojas::getAll();
			else
				{
					$_SESSION["s_errors"]["generic"][] = 'Não tem permissões!';
					header("Location: ../../index.php");
					die;
				}
			$nostores=false;
			if($lojas==null)
				$nostores=true;
			
			$smarty->assign("nostores", $nostores);
			$smarty->assign("lojas", $lojas);
			$smarty->display('produtos/addingredientetostore.tpl');
		}
}

else if($_GET["type"]=="produto"){
	if ($s_values)
	  $produto = $s_values;
	else
	  $produto = NaoAlimenticios::getById($_GET["id"]);

	if ($produto == null) {
	  $_SESSION["s_errors"]["generic"][] = 'O produto '.$_GET["id"].' não existe!';
	  header("Location: ../../index.php");
	}


	$smarty->assign("produto", $produto);
	if($_GET["addhouse"]!="true" && $_GET["addstore"]!="true")
		$smarty->display('produtos/edit.tpl');
	else if($_GET["addhouse"]=="true"){
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
			$nostores=false;
			if($casas==null)
				$nostores=true;
			
			$smarty->assign("nostores", $nostores);
			$smarty->assign("casas", $casas);
			$smarty->display('produtos/addproduto.tpl');
		}
	else{
			if($s_user=="")
			{
				$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
				header("Location: ../../index.php");
				die;
			}
			if($s_type=="admin")
				$lojas = Lojas::getAll();
			else
				{
					$_SESSION["s_errors"]["generic"][] = 'Não tem permissões!';
					header("Location: ../../index.php");
					die;
				}
			$nostores=false;
			if($lojas==null)
				$nostores=true;
			
			$smarty->assign("nostores", $nostores);
			$smarty->assign("lojas", $lojas);
			$smarty->display('produtos/addprodutotostore.tpl');
		}
}

?>
