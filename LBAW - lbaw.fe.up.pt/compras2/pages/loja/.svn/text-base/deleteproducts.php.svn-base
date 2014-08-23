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

$errors = Corredores::deleteproduto($_GET["lojaid"], $_GET["id"]);

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: verloja.php?id=".$_GET["lojaid"]);
}

$loja = Lojas::getbyId($_GET["lojaid"]);

$produtos = Corredores::getProductsbyStore($_GET["lojaid"]);

$noproducts=false;
	if($produtos==null)
$noproducts=true;

$smarty->assign("noproducts", $noproducts);

$smarty->assign("loja", $loja);

$smarty->assign("produtos", $produtos);

$smarty->display('loja/showproducts.tpl');
?>