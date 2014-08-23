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

$produtoid=$_POST["id"];
$lojaid=$_POST["lojaid"];
$cr=$_POST["corredor"];
$errors = Corredores::updateproduct($produtoid, $lojaid,$cr);

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: verloja.php?id=".$_POST["lojaid"]);
}


$loja = Lojas::getbyId($_POST["lojaid"]);

$produtos = Corredores::getProductsbyStore($_POST["lojaid"]);

$noproducts=false;
	if($produtos==null)
$noproducts=true;

$smarty->assign("noproducts", $noproducts);

$smarty->assign("loja", $loja);

$smarty->assign("produtos", $produtos);

$smarty->display('loja/showproducts.tpl');

?>