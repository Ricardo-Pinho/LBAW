<?

require_once('../../includes/base.php');
require_once('../../database/NaoAlimenticio.php');
require_once('../../database/Stock.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$produto = NaoAlimenticios::getbyId($_GET["id"]);

$idproduto=$_GET["id"];

$casas = Stock::getHousesbyProduct($idproduto);

$nohouses=false;
	if($casas==null)
$nohouses=true;

$smarty->assign("nohouses", $nohouses);

$smarty->assign("casas", $casas);

$smarty->assign("produto", $produto);

$smarty->display('produtos/showhousesbyproduct.tpl');

?>