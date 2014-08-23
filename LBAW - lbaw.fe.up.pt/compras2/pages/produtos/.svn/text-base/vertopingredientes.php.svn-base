<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$ingredientes = Ingredientes::getTop();

$smarty->assign("ingredientes", $ingredientes);

$smarty->display('produtos/veringredientes.tpl');

?>