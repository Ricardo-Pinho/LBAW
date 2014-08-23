<?

require_once('../../includes/base.php');
require_once('../../database/Receita.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/
if($s_type=="admin")
	$receitas = Receitas::getAlladmin();
else
	$receitas = Receitas::getAll();
$norecipees=false;
if($receitas==null)
	$norecipees=true;

$smarty->assign("receitas", $receitas);
$smarty->assign("norecipees", $norecipees);

$smarty->display('receita/listarreceitas.tpl');

?>