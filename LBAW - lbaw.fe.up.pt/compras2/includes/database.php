<?php

//database constants
$user = 'lbaw11609';	 //CHANGE ME
$pass = 'fM417sh';	 //CHANGE ME
$dbname = 'lbaw11609';	 //CHANGE ME
$host = 'vdbm.fe.up.pt';

$dsn = 'pgsql:host='.$host.';dbname='.$dbname;

$schema = "compras2";

// get a (not persistent) database connection
try {
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  $s_errors["generic"][] = "ERRO[00]: ".$e->getMessage();
  $smarty->assign("s_errors", $s_errors);
  $smarty->display('main.tpl');
}

?>
