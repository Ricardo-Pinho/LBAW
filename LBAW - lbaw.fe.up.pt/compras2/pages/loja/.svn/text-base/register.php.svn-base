<?
require_once('../../includes/base.php');


if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

$smarty->display('loja/register.tpl');

?>