<?php

class Casa_Receita {

  // get all tuples
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.news ORDER BY ndate");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[21]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
     }
  }

  // get news tuple
  function getHousesbyRecipee($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa WHERE id IN (SELECT id_casa FROM $schema.casa_receita WHERE id_receita = :id)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[22]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getConnection($id,$casaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_receita WHERE id_receita = :id AND id_casa = :casaid");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	  $stmt->bindParam(':casaid', $casaid, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[22]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
   function getRecipeesbyHouseadmin($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE id IN (SELECT id_receita FROM $schema.casa_receita WHERE id_casa = :id)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[22]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
     function getRecipeesbyHouse($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE privado = FALSE AND id IN (SELECT id_receita FROM $schema.casa_receita WHERE id_casa = :id)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[22]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
   function GetrecipeeIds($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE id IN (SELECT id_receita FROM $schema.casa_receita WHERE id_casa = :id)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[22]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  function delete($casa, $receita) {
    global $dbh, $schema;
    try {
      $sql = "DELETE FROM $schema.casa_receita WHERE id_receita= ? AND id_casa = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($receita, $casa));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[211]: ".$errmsg;
      return $errors;
    }
  }

  // get last used id from sequence
  function addrecipee($receitaid, $casaid) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.casa_receita (id_receita,id_casa) VALUES ( ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($receitaid,$casaid));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
	$errors["generic"][] = "ERRO[24]: ".$errmsg;
      return $errors;
    }
  }

} /*** end of class ***/

?>