<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/Quantidade_Necessaria.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$ingrediente = Ingredientes::getbyId($_GET["id"]);


$receitas = Quantidade_Necessaria::getRecipeesbyIngredient($_GET["id"]);

$norecipees=false;
if($receitas==null)
	$nosrecipees=true;

$smarty->assign("norecipees", $norecipees);

$smarty->assign("receitas", $receitas);

$smarty->assign("ingrediente", $ingrediente);

$smarty->display('produtos/showrecipeesbyingredient.tpl');

?>