<?php
class Casa_Utilizador {

  // get all tuples of authors
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[1]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  function getHousesbyUser($iduser) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa WHERE id IN (SELECT id_casa from $schema.casa_utilizador WHERE id_utilizador= :user)");
      $stmt->bindParam(':user', $iduser, PDO::PARAM_INT);
	  $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[2]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  function HouseandUser($idhouse,$iduser) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador WHERE id_casa = :home AND id_utilizador = :user");
	   $stmt->bindParam(':home', $idhouse, PDO::PARAM_INT);
      $stmt->bindParam(':user', $iduser, PDO::PARAM_INT);
	  $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[2]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getConnection($idhouse,$iduser) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador WHERE id_casa = :home AND id_utilizador = :user");
	   $stmt->bindParam(':home', $idhouse, PDO::PARAM_INT);
      $stmt->bindParam(':user', $iduser, PDO::PARAM_INT);
	  $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[2]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getUsersbyHouse($idcasa) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE id IN (SELECT id_utilizador from $schema.casa_utilizador WHERE id_casa= :casa)");
      $stmt->bindParam(':casa', $idcasa, PDO::PARAM_INT);
	  $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[3]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

function getIdByUserAndHouse($iduser,$idhouse) {
    global $dbh, $schema;
    try {
	  $stmt = $dbh->prepare("SELECT * FROM $schema.casa_utilizador WHERE id_utilizador = :user AND id_casa = :house");
	  $stmt->bindParam(':user', $iduser, PDO::PARAM_INT);
      $stmt->bindParam(':house', $idhouse, PDO::PARAM_INT);
	  $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[4]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

function AddUser($idhouse,$iduser) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.casa_utilizador (id_casa, id_utilizador) VALUES (?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($idhouse, $iduser));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
	$errors["generic"][] = "ERRO[5]: ".$errmsg;
      return $errors;
    }
}

function remuser($idhouse,$iduser) {
    global $dbh, $schema;
    try {
      $sql = "DELETE FROM $schema.casa_utilizador WHERE id_casa = :id_house AND id_utilizador = :id_user";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id_house', $idhouse);
	  $stmt->bindParam(':id_user', $iduser);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[6]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
}
}
?>