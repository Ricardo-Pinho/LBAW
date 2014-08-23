<?php

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');

$username = $_POST["email"];
$password = $_POST["password"];

if (Users::existsUsernamePassword($username, $password)) {
  $_SESSION["s_messages"][] = 'Autenticação com sucesso';
  if (Users::isAdmin($username))
    $_SESSION["s_type"] = 'admin';
  else
    $_SESSION["s_type"] = 'user';
}
else {
  // store user input values
  $_SESSION["s_values"] = $_POST;
  $_SESSION["s_errors"]["generic"][] = 'Username ou password errados!';
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>