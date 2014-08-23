<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Receita.php');
require_once('../../database/Casa_Utilizador.php');
require_once('../../database/Loja.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$casa = Casas::getbyId($_GET["id"]);
$casa_user = Casa_Utilizador::HouseandUser($_GET["id"],$s_id);
if($s_type=="admin" || $casa_user!=null)
	$receitas = Casa_Receita::getRecipeesbyHouseadmin($_GET["id"]);
else
	$receitas = Casa_Receita::getRecipeesbyHouse($_GET["id"]);

$norecipees=false;
	if($receitas==null)
$norecipees=true;

if($s_user=="")
{
	$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
	header("Location: ../../index.php");
	die;
}
$lojas = Lojas::getAll();

$smarty->assign("lojas", $lojas);

$smarty->assign("norecipees", $norecipees);

$smarty->assign("casa", $casa);

$smarty->assign("receitas", $receitas);

$smarty->display('casa/shoplist.tpl');

?>