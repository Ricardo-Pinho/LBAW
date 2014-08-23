<?php

require_once('../../includes/base.php');
require_once('../../database/Loja.php');

if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

$errors = Lojas::delete($_GET["id"]);	

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: verloja.php?id=".$_GET["id"]);
}

else {
$_SESSION["s_messages"][] = 'Loja removida com sucesso';
header("Location: ../../index.php");
}
