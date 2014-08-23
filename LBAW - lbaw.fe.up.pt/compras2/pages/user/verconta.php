<?

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

// check privileges
/*if ($s_type != "admin") {
  $_SESSION["s_errors"]["generic"][] = 'N�o tem permiss�es';
  header("Location: ../../index.php");
  die;
}*/

// check parameters
if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O login � obrigat�rio!'; 
  header("Location: verutilizadores.php");
  die;
}

$utilizador = Users::getById($_GET["id"]);

if ($utilizador == null) {
  $_SESSION["s_errors"]["generic"][] = 'O utilizador '.$_GET["id"].' n�o existe!';
  header("Location: verutilizadores.php");
}

$smarty->assign("utilizador", $utilizador);

$smarty->display('user/verconta.tpl');

?>