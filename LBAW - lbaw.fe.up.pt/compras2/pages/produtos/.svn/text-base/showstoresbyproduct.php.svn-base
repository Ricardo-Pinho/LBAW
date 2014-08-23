<?

require_once('../../includes/base.php');
require_once('../../database/NaoAlimenticio.php');
require_once('../../database/Corredor.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$produto = NaoAlimenticios::getbyId($_GET["id"]);

$idproduto=$_GET["id"];

$lojas = Corredores::getstoresbyProduct($idproduto);

$nostores=false;
	if($lojas==null)
$nostores=true;

$smarty->assign("nostores", $nostores);

$smarty->assign("lojas", $lojas);

$smarty->assign("produto", $produto);

$smarty->display('produtos/showstoresbyproduct.tpl');

?>