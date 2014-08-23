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

$errors = Quantidade_Disponivel::qdelete($_GET["casaid"], $_GET["id"]);	

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: vercasa.php?id=".$_GET["casaid"]);
}


$casa = Casas::getbyId($_GET["casaid"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_GET["casaid"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$ingredientes = Quantidade_Disponivel::getIngredientsByHouse($_GET["casaid"]);

$noingredients=false;
	if($ingredientes==null)
$noingredients=true;

$smarty->assign("noingredients", $noingredients);

$smarty->assign("casa", $casa);

$smarty->assign("ingredientes", $ingredientes);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/showingredients.tpl');

?>