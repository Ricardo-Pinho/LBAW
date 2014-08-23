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

$email = $_GET["id"];

$errors = Users::delete($email);	

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: get.php?id=".$email);
}
else {
  if($email==$s_user)
	session_destroy();
$_SESSION["s_messages"][] = 'Utilizador '.$email.' removido com sucesso';
header("Location: ../../index.php");
}
?>