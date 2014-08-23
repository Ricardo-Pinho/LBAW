<?

require_once('../../includes/base.php');
require_once('../../database/Casas.php');
require_once('../../database/Utilizadores.php');
require_once('../../database/Casa_Utilizador.php');

$user = $s_id;
$house = $_GET["id"];

$casa_utilizador = Casa_Utilizador::getIdByUserAndHouse($user,$house);

$casa = Casas::getById($_GET["id"]);

$isowner=false;

if($casa_utilizador!=null){
	$isowner=true;
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

if ($casa == null) {
  $_SESSION["s_errors"]["generic"][] = 'A casa '.$_GET["id"].' não existe!';
  header("Location: vercasas.php");
}

$smarty->assign("casa", $casa);
$smarty->assign("isowner", $isowner);

$smarty->display('casa/vercasa.tpl');

?>