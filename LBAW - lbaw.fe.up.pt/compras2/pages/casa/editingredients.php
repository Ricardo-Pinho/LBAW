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

$casa = Casas::getbyId($_GET["casaid"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_GET["id"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$ingrediente = Quantidade_Disponivel::getIngredientByHouse($_GET["id"],$_GET["casaid"]);


$smarty->assign("casa", $casa);

$smarty->assign("ingrediente", $ingrediente);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/editingredients.tpl');

?>