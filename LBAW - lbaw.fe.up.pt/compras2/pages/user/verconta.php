<?

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O login é obrigatório!'; 
  header("Location: verutilizadores.php");
  die;
}

$utilizador = Users::getById($_GET["id"]);

if ($utilizador == null) {
  $_SESSION["s_errors"]["generic"][] = 'O utilizador '.$_GET["id"].' não existe!';
  header("Location: verutilizadores.php");
}

$smarty->assign("utilizador", $utilizador);

$smarty->display('user/verconta.tpl');

?>