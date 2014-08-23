<?

require_once('../../includes/base.php');
require_once('../../database/Loja.php');
require_once('../../database/Corredor.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$loja = Lojas::getbyId($_GET["id"]);

$produtos = Corredores::getProductsbyStore($_GET["id"]);

$noproducts=false;
	if($produtos==null)
$noproducts=true;

$smarty->assign("noproducts", $noproducts);

$smarty->assign("loja", $loja);

$smarty->assign("produtos", $produtos);

$smarty->display('loja/showproducts.tpl');

?>