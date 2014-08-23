<?php

class NaoAlimenticios {

  // get all tuples of naoalimenticio
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.naoalimenticio");
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
      $stmt = $dbh->prepare("SELECT * FROM $schema.naoalimenticio WHERE nome ~ :name");
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

  // get ingrediente's data
  function getById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.naoalimenticio WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[25]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }

  // update ingrediente
  function update($id, $name, $unidade_medida) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.naoalimenticio SET nome = ?, unidade_medida = ? WHERE id = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $unidade_medida, $id));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[26]: ".$errmsg;
      return $errors;
    }
  }

  // insert ingrediente
  function insert($nome, $unidade_medida) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.naoalimenticio (nome, unidade_medida) VALUES (?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($nome, $unidade_medida));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      if (strpos($errmsg, 'naoalimenticio_pkey')) 
	$errors["uingrediente"] = "Login Repetido!";
      else
	$errors["generic"][] = "ERRO[27]: ".$errmsg;
      return $errors;
    }
  }

  // delete ingrediente
  function delete($id) {
    global $dbh, $schema;
    try {
	
	  $sql = "DELETE FROM $schema.corredor WHERE id_produto = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	  
	  
	  $sql = "DELETE FROM $schema.stock WHERE id_produto = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
		
      $sql = "DELETE FROM $schema.naoalimenticio WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
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