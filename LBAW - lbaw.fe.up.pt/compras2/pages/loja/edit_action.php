<?php

require_once('../../includes/base.php');
require_once('../../database/Loja.php');

$name =  $_POST["nome"];
$contacto = $_POST["contacto"];
$id = $_POST["id"];

$errors = Lojas::update($id,$name,$contacto);	

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
  $_SESSION["s_messages"][] = 'Loja alterada com sucesso';
  header("Location: verloja.php?id=" . $id);
}

?>