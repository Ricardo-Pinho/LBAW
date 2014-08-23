<?

require_once('../../includes/base.php');
require_once('../../database/NaoAlimenticio.php');

$id = $_GET["id"];

if($id==null){
	$isowner=true;
  $_SESSION["s_errors"]["generic"][] = 'O ID do Produto é nulo!'; 
  header("Location: verprodutos.php");
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

$produto = NaoAlimenticios::getById($id);

$smarty->assign("produto", $produto);

$smarty->display('produtos/verproduto.tpl');

?>