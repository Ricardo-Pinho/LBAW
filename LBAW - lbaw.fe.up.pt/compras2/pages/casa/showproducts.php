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

$casa = Casas::getbyId($_GET["id"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_GET["id"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$produtos = Stock::getProductsbyHouse($_GET["id"]);

$noproducts=false;
	if($produtos==null)
$noproducts=true;

$smarty->assign("noproducts", $noproducts);

$smarty->assign("casa", $casa);

$smarty->assign("produtos", $produtos);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/showproducts.tpl');

?>