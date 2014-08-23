<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Quantidade_Disponivel.php');
require_once('../../database/Casa_Utilizador.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$casa = Casas::getbyId($_GET["id"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_GET["id"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$ingredientes = Quantidade_Disponivel::getIngredientsByHouse($_GET["id"]);

$noingredients=false;
	if($ingredientes==null)
$noingredients=true;

$smarty->assign("noingredients", $noingredients);

$smarty->assign("casa", $casa);

$smarty->assign("ingredientes", $ingredientes);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/showingredients.tpl');

?>