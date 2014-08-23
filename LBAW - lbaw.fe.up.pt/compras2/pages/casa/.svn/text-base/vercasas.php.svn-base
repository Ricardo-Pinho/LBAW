<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Utilizador.php');
require_once('../../database/Utilizadores.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/
$nohouses=false;
if($_GET["id"]!=null){
$casas = Casa_Utilizador::getHousesbyUser($_GET["id"]);
$connections = Casas::getAllConnectionsbyUser($_GET["id"]);
$users = Casas::getAllUsersbyHouse($_GET["id"]);
}
else{
$casas = Casas::getAll();
$connections = Casa_Utilizador::getAll();
$users = Users::getAllbyOwnedHouse();
}
if($casas==null)
$nohouses=true;

$smarty->assign("nohouses", $nohouses);

$smarty->assign("casas", $casas);

$smarty->assign("connections", $connections);

$smarty->assign("users", $users);

$smarty->display('casa/vercasas.tpl');

?>