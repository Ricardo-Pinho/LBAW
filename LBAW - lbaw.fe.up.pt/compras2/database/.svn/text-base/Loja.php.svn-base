<?php

class Lojas {

  // get all tuples of authors
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.loja");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[23]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  function getAllbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.loja WHERE nome ~ :name");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[24]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // get author's data
  function getById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.loja WHERE id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[25]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
 
 // update authors
  function update($id, $name, $phone) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.loja SET nome=?, contacto=? WHERE id=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $phone, $id));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[26]: ".$errmsg;
      return $errors;
    }
  }

  // insert author
  function insert($name, $phone) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.loja (id, nome, contacto) VALUES (DEFAULT, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $phone));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[27]: ".$errmsg;
      return $errors;
    }
  }

  // delete authors
  function delete($id) {
    global $dbh, $schema;
    try {
	
	  $sql = "DELETE FROM $schema.corredor WHERE id_loja = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	
      $sql = "DELETE FROM $schema.loja WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[28]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

} /*** end of class ***/

?>