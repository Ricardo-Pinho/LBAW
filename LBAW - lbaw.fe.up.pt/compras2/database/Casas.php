<?php

class Casas {

  // get all tuples of authors
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[7]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  function getAllbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa WHERE nome ~ :name");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[8]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
    function getAllUsersbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE id IN (SELECT id_utilizador from $schema.casa_utilizador WHERE id_casa IN (SELECT id from $schema.casa WHERE nome ~ :name))");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[9]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
      function getAllUsersbyHouse($id) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE id IN (SELECT id_utilizador from $schema.casa_utilizador WHERE id_casa IN (SELECT id_casa FROM $schema.casa_utilizador WHERE id_utilizador = :id))");
	  $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[9]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  function getAllConnectionsbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador WHERE id_casa IN (SELECT id from $schema.casa WHERE nome ~ :name)");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[10]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  function getAllConnectionsbyUser($id) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador WHERE id_casa IN (SELECT id_casa FROM $schema.casa_utilizador WHERE id_utilizador = :id)");
	  $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[10]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  

  // get casa's data
  function getById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa WHERE id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[11]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  
   function getHousesById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador WHERE id_utilizador = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[12]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
 
 // update casa
  function update($name, $morada,$id) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.casa SET nome=?, morada=? WHERE id=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $morada,$id));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[13]: ".$errmsg;
      return $errors;
    }
  }

  // insert casa
  function insert($name, $morada,$user_name) {
    global $dbh, $schema;
    try {
	  $sql = "INSERT INTO $schema.agenda DEFAULT VALUES";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
	  
	  $stmt = $dbh->prepare("SELECT * FROM $schema.agenda ORDER BY id DESC LIMIT 1");
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
	  
      $sql = "INSERT INTO $schema.casa (nome, morada,id_agenda) VALUES (?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $morada,$result["id"]));
      
	  $stmt = $dbh->prepare("SELECT * FROM $schema.casa WHERE nome= :name ORDER BY id DESC LIMIT 1");
      $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result1 = $stmt->fetch(PDO::FETCH_ASSOC);
	  
	  $sql = "INSERT INTO $schema.casa_utilizador (id_casa, id_utilizador) VALUES (?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($result1["id"], $user_name));
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[14]: ".$errmsg;
      return $errors;
    }
  }

  // delete authors
  function delete($id) {
    global $dbh, $schema;
    try {
      /*$stmt = $dbh->prepare("SELECT * FROM $schema.casa WHERE id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
	  
	  $sql = "DELETE FROM $schema.agenda WHERE id = :agency";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':agency', $result["id_agenda"]);
      $stmt->execute();*/	  
	  
	  $sql = "DELETE FROM $schema.casa_utilizador WHERE id_casa = :id_home";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_home', $id);
      $stmt->execute();
	  
	  $sql = "DELETE FROM $schema.stock WHERE id_casa = :id_home";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_home', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	  
	  $sql = "DELETE FROM $schema.stock WHERE id_casa = :id_home";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_home', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	  
	  $sql = "DELETE FROM $schema.quantidade_disponivel WHERE id_casa = :id_home";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_home', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	  
	  $sql = "DELETE FROM $schema.casa_receita WHERE id_casa = :id_home";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_home', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	  
	  $sql = "DELETE FROM $schema.casa WHERE id = :id_home";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_home', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[15]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // get last used id from sequence
  function getLastInsertedId() {
	global $dbh, $schema;
		try {
		  $stmt = $dbh->prepare("SELECT * FROM $schema.casa ORDER BY id LIMIT 10");
		  $stmt->execute();
		  // get next row as an array indexed by column name
		  $result = $stmt->fetch(PDO::FETCH_ASSOC);
		  return ($result);
		}
		catch(PDOException $e) {
		  $_SESSION["s_errors"]["generic"][] = "ERRO[15]: ".$e->getMessage();
		  header("Location: ../../index.php");
		  die;
		}
  }

} /*** end of class ***/

?>