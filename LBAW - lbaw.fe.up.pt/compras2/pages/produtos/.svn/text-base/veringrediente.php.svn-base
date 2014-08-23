<?

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');

$id = $_GET["id"];

if($id==null){
	$isowner=true;
  $_SESSION["s_errors"]["generic"][] = 'O ID do Ingrediente é nulo!'; 
  header("Location: veringredientes.php");
  die;
}

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
/*if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O login é obrigatório!'; 
  header("Location: vercasas.php");
  die;
}*/

$ingrediente = Ingredientes::getById($id);

$smarty->assign("ingrediente", $ingrediente);

$smarty->display('produtos/veringrediente.tpl');

?>