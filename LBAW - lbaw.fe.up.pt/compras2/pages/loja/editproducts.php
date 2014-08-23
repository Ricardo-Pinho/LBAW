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

$loja = lojas::getbyId($_GET["lojaid"]);


$produto = Corredores::getProductbyStore($_GET["id"],$_GET["lojaid"]);


$smarty->assign("loja", $loja);

$smarty->assign("produto", $produto);

$smarty->display('loja/editproducts.tpl');

?>