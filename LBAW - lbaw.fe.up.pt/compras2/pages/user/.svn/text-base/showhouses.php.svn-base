<?

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');
require_once('../../database/Casa_Utilizador.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$user = Users::getbyId($_GET["mail"]);

$iduser=$_GET["id"];

$casas = Casa_Utilizador::getHousesbyUser($iduser);

$nohouses=false;
	if($casas==null)
$nohouses=true;

$smarty->assign("nohouses", $nohouses);

$smarty->assign("casas", $casas);

$smarty->assign("utilizador", $user);

$smarty->display('user/showhouses.tpl');

?>