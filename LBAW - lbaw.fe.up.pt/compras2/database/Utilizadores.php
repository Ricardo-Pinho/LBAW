<?php

class Users {

  // get all tuples of users
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[35]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getAllbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE nome ~ :name");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[36]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getAllByOwnedHouse() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE id IN (SELECT id_utilizador FROM $schema.casa_utilizador)");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[37]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // get user's data
  function getById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE email = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[38]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getByHouse($casa) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE id IN (SELECT id_utilizador FROM $schema.casa_utilizador WHERE id_casa= :id)");
      $stmt->bindParam(':id', $casa, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[39]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getIdByEmail($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE email = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result["id"];
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[40]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  // update user's password
  function updatepassword($newpassword, $email, $oldpassword) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE email = :user");
      $stmt->bindParam(':user', $email);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result["password"] != md5($oldpassword))
		{
		   $errors["generic"][] = "A password antiga esta errada";
		   return $errors;
	   }
      $sql = "UPDATE $schema.utilizador SET password = ? WHERE email = ? AND password = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($newpassword, $email, md5($oldpassword)));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[41]: ".$errmsg;
      return $errors;
    }
  }  

  // update user
  function update($email, $name) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.utilizador SET nome = ? WHERE email = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $email));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[42]: ".$errmsg;
      return $errors;
    }
  }
  
    // update user by admin
    function adminrevoke($email,$name) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.utilizador SET nome = ?, gestor = FALSE WHERE email = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $email));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[43]: ".$errmsg;
      return $errors;
    }
  }
  
      function adminupdate($name, $gestor, $fsemana_entrada, $fsemana_entrada_min, $fsemana_saida, $fsemana_saida_min, $semana_entrada, $semana_entrada_min, $semana_saida, $semana_saida_min, $email) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.utilizador SET nome = ?, gestor = ?, fsemana_entrada = ?, fsemana_entrada_min = ?, fsemana_saida = ?, fsemana_saida_min = ?, semana_entrada = ?, semana_entrada_min = ?, semana_saida = ?, semana_saida_min = ? WHERE email = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $gestor, $fsemana_entrada, $fsemana_entrada_min, $fsemana_saida, $fsemana_saida_min, $semana_entrada, $semana_entrada_min, $semana_saida, $semana_saida_min, $email));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[44]: ".$errmsg;
      return $errors;
    }
  }

  // insert user
  function insert($name, $email, $pass) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.utilizador (nome, email, gestor, password) VALUES (?, ?, FALSE, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $email, $pass));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      if (strpos($errmsg, 'utilizador_email_restr')) 
	$errors["generic"][] = "Email Repetido! Ja existe na base de dados";
      else
	$errors["generic"][] = "ERRO[45]: ".$errmsg;
      return $errors;
    }
  }

    // insert user by admin
  function insertadmin($name, $gestor, $fsemana_entrada, $fsemana_entrada_min, $fsemana_saida, $fsemana_saida_min, $semana_entrada, $semana_entrada_min, $semana_saida, $semana_saida_min, $password , $email) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.utilizador (nome, email, gestor, fsemana_entrada, fsemana_entrada_min, fsemana_saida, fsemana_saida_min, semana_entrada, semana_entrada_min, semana_saida, semana_saida_min, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $email, $gestor, $fsemana_entrada, $fsemana_entrada_min, $fsemana_saida, $fsemana_saida_min, $semana_entrada, $semana_entrada_min, $semana_saida, $semana_saida_min, $password));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      if (strpos($errmsg, 'utilizador_email_restr')) 
	$errors["generic"][] = "Email Repetido! Ja existe na base de dados";
      else
	$errors["generic"][] = "ERRO[46]: ".$errmsg;
      return $errors;
    }
  }
  
  // delete user
  function delete($id) {
    global $dbh, $schema;
    try {
	  $sql = "DELETE FROM $schema.casa_utilizador WHERE id_utilizador IN (SELECT id from $schema.utilizador where email = :id)";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	
      $sql = "DELETE FROM $schema.utilizador WHERE email = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[47]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // authenticate user
  function existsUsernamePassword($username, $password) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE email = :user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result["password"] == md5($password))
{	
	$_SESSION["s_user"] = $result["email"];
	$_SESSION["s_name"] = $result["nome"];
	$_SESSION["s_id"] = $result["id"];
	return true;
}
      else 
	return false;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[48]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // decide user groups (aka user types) Gestor
  function isAdmin($username) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE email = :user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result["gestor"] == TRUE) 
	return true;
      else 
	return false;
	}
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[49]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

} /*** end of class ***/

?>