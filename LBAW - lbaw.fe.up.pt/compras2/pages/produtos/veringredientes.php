<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

if($_GET["tipo"]!=null){
$tipo=$_GET["tipo"];
$ingredientes = Ingredientes::getAllByType($tipo);
}
else
$ingredientes = Ingredientes::getAll();

$noingredients=false;
if($ingredientes==null)
$noingredients=true;

$smarty->assign("noingredients", $noingredients);

$smarty->assign("ingredientes", $ingredientes);

$smarty->display('produtos/veringredientes.tpl');

?>