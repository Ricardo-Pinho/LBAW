<?

require_once('../../includes/base.php');
require_once('../../database/Loja.php');


$stores = Lojas::getAll();

if($stores==null)
$nostores=true;

$smarty->assign("nostores", $nostores);

$smarty->assign("stores", $stores);

$smarty->display('loja/verlojas.tpl');

?>