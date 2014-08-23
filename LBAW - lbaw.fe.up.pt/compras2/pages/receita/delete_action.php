<?php

require_once('../../includes/base.php');
require_once('../../database/Receita.php');

if($s_type != "admin"){
	$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
	header("Location: ../../index.php");
	die;
}

$errors = Receitas::delete($_GET["id"]);	

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: verreceita.php?id=".$_GET["id"]);
}

else {
$_SESSION["s_messages"][] = 'Receita removida com sucesso';
header("Location: ../../index.php");
}
