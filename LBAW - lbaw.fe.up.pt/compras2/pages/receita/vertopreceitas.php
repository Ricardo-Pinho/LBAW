<?

require_once('../../includes/base.php');
require_once('../../database/Receita.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'N�o tem permiss�es';
  header("Location: ../../index.php");
  die;
}*/

$receitas = Receitas::getTop();

$smarty->assign("receitas", $receitas);

$smarty->display('receita/listarreceitas.tpl');

?>