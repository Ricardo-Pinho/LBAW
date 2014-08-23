<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Stock.php');
require_once('../../database/Casa_Utilizador.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$casa = Casas::getbyId($_GET["casaid"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_GET["casaid"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$produto = Stock::getProductbyHouse($_GET["id"],$_GET["casaid"]);


$smarty->assign("casa", $casa);

$smarty->assign("produto", $produto);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/editproducts.tpl');

?>