<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Stock.php');
require_once('../../database/Casa_Utilizador.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

$produtoid=$_POST["id"];
$casaid=$_POST["casaid"];
$qmin=$_POST["qminima"];
$qmax=$_POST["qmaxima"];
$qd=$_POST["qdisponivel"];

$errors = Stock::updateproduct($produtoid, $casaid,$qmin,$qmax,$qd);

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: vercasa.php?id=".$_POST["casaid"]);
}

$casa = Casas::getbyId($_POST["casaid"]);

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($s_id,$_POST["casaid"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
}

$produtos = Stock::getProductsbyHouse($_POST["casaid"]);

$noproducts=false;
	if($produtos==null)
$noproducts=true;

$smarty->assign("noproducts", $noproducts);

$smarty->assign("casa", $casa);

$smarty->assign("produtos", $produtos);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/showproducts.tpl');

?>