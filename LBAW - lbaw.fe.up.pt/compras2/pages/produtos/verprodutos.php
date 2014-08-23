<?

require_once('../../includes/base.php');
require_once('../../database/NaoAlimenticio.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$produtos = NaoAlimenticios::getAll();
$noproducts=false;
if($produtos==null)
$noproducts=true;

$smarty->assign("noproducts", $noproducts);

$smarty->assign("produtos", $produtos);

$smarty->display('produtos/verprodutos.tpl');

?>