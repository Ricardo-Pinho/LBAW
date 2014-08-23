<?

require_once('../../includes/base.php');
require_once('../../database/Loja.php');


$loja = Lojas::getById($_GET["id"]);


$smarty->assign("loja", $loja);

$smarty->display('loja/verloja.tpl');

?>