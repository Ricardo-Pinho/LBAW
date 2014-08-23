<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/Corredor.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$ingrediente = Ingredientes::getbyId($_GET["id"]);


$lojas = Corredores::getStoresbyIngredient($_GET["id"]);

$nostores=false;
	if($lojas==null)
$nostores=true;

$smarty->assign("nostores", $nostores);

$smarty->assign("lojas", $lojas);

$smarty->assign("ingrediente", $ingrediente);

$smarty->display('produtos/showstoresbyingredient.tpl');

?>