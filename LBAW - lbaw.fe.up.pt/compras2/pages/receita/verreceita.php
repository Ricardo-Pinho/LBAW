<?

require_once('../../includes/base.php');
require_once('../../database/Receita.php');

$id = $_GET["id"];

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$receita = Receitas::getById($id);
$ingredientes = Receitas::getIngredientesByIdReceita($id);

$smarty->assign("receita", $receita);
$smarty->assign("ingredientes", $ingredientes);


$smarty->display('receita/verreceita.tpl');

?>