<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Utilizador.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$casa = Casas::getbyId($_GET["id"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_GET["id"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$users = Casa_Utilizador::getUsersbyHouse($_GET["id"]);

$nousers=false;
	if($users==null)
$nousers=true;

$smarty->assign("nousers", $nousers);

$smarty->assign("casa", $casa);

$smarty->assign("users", $users);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/showusers.tpl');

?>