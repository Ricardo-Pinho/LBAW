<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/Quantidade_Disponivel.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$ingrediente = Ingredientes::getbyId($_GET["id"]);


$casas = Quantidade_Disponivel::getHousesbyIngredient($_GET["id"]);

$nohouses=false;
	if($casas==null)
$nohouses=true;

$smarty->assign("nohouses", $nohouses);

$smarty->assign("casas", $casas);

$smarty->assign("ingrediente", $ingrediente);

$smarty->display('produtos/showhousesbyingredient.tpl');

?>