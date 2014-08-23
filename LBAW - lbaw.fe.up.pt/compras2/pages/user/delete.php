<?php

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

// check privileges
if ($s_type != "admin" && $s_user !=$_GET["id"]) {
  $_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
  header("Location: ../../index.php");
  die;
}

// check parameters
if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O login é obrigatório!'; 
  header("Location: ../../index.php");
  die;
}

$user = Users::getById($_GET["id"]);

if ($user == null) {
  $_SESSION["s_errors"]["generic"][] = 'O utilizador '.$_GET["id"].' não existe!';
  header("Location: ../../index.php");
}

$smarty->assign("user", $user);

$smarty->display('user/delete.tpl');

?>
