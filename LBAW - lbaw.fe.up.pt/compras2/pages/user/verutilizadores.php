<?

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'N�o tem permiss�es';
  header("Location: ../../index.php");
  die;
}*/

$users = Users::getAll();

$nousers=false;
if($users==null)
$nousers=true;

$smarty->assign("nousers", $nousers);

$smarty->assign("users", $users);

$smarty->display('user/verutilizadores.tpl');

?>