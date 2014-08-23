<?

require_once('../../includes/base.php');
require_once('../../database/Receita.php');
require_once('../../database/Casa_Receita.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$receita = Receitas::getbyId($_GET["id"]);

$casas = Casa_Receita::getHousesbyRecipee($_GET["id"]);

$nohouses=false;
	if($casas==null)
$nohouses=true;

$smarty->assign("nohouses", $nohouses);

$smarty->assign("receita", $receita);

$smarty->assign("casas", $casas);

$smarty->display('receita/showhousesbyrecipee.tpl');

?>