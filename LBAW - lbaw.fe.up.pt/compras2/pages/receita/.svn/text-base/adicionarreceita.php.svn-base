<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Utilizador.php');

$id = $_GET["id"];

// check privileges
if ($s_type == "") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}

$ingredientes = Ingredientes::getAll();

if($s_user=="")
{
	$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
	header("Location: ../../index.php");
	die;
}
if($s_type!="admin")
	$casas = Casa_Utilizador::getHousesbyUser($s_id);
else
	$casas = Casas::getAll();
$nohouses=false;
if($casas==null)
	$nohouses=true;

$smarty->assign("nohouses", $nohouses);
$smarty->assign("casas", $casas);
$smarty->assign("s_id", $s_id);

$smarty->assign('ingredientes', $ingredientes);

$smarty->display('receita/adicionarreceita.tpl');

?>