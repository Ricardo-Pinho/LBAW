<?

require_once('../../includes/base.php');
require_once('../../database/NaoAlimenticio.php');

$id = $_GET["id"];

if($id==null){
	$isowner=true;
  $_SESSION["s_errors"]["generic"][] = 'O ID do Produto � nulo!'; 
  header("Location: verprodutos.php");
  die;
}

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'N�o tem permiss�es';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
/*if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O login � obrigat�rio!'; 
  header("Location: vercasas.php");
  die;
}*/

$produto = NaoAlimenticios::getById($id);

$smarty->assign("produto", $produto);

$smarty->display('produtos/verproduto.tpl');

?>