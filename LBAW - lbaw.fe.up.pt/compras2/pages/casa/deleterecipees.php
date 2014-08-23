<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Receita.php');
require_once('../../database/Casa_Utilizador.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$errors = Casa_Receita::delete($_GET["casaid"], $_GET["id"]);	

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

$casa_user = Casa_Utilizador::HouseandUser($_GET["casaid"],$s_id);
if($s_type=="admin" || $casa_user !=null)
	$receitas = Casa_Receita::getRecipeesbyHouseadmin($_GET["casaid"]);
else
	$receitas = Casa_Receita::getRecipeesbyHouse($_GET["casaid"]);

$norecipees=false;
	if($receitas==null)
$norecipees=true;

$smarty->assign("norecipees", $norecipees);

$smarty->assign("casa", $casa);

$smarty->assign("receitas", $receitas);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/showrecipees.tpl');

?>