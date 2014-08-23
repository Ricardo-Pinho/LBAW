<?php

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/NaoAlimenticio.php');

// check parameters
if (!isset($_GET["id"])) {
  $_SESSION["s_errors"]["generic"][] = 'O ID é obrigatório!'; 
  header("Location: ../../index.php");
  die;
}

$id = $_GET["id"];

if($_GET["type"]=="ingrediente")
$errors = Ingredientes::delete($id);
else if($_GET["type"]=="produto")	
$errors = NaoAlimenticios::delete($id);

else{
  $_SESSION["s_errors"]["generic"][] = 'O Tipo tem que ser ingrediente ou produto!'; 
  header("Location: ../../index.php");
  die;
}

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: ../../index.php");
}
else {
if($_GET["type"]=="ingrediente")
$_SESSION["s_messages"][] = 'Ingrediente removido com sucesso';
else if($_GET["type"]=="produto")
$_SESSION["s_messages"][] = 'Produto removido com sucesso';
header("Location: ../../index.php");
}
?>
