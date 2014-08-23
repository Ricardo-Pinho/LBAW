<?

require_once('../../includes/base.php');
require_once('../../database/Receita.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$receitas = Receitas::getTop();

$smarty->assign("receitas", $receitas);

$smarty->display('receita/listarreceitas.tpl');

?>