<?php

class Ingredientes {

  // get all tuples of ingrediente
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.ingrediente");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[16]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getAllId() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT id FROM $schema.ingrediente");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[16]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getAllbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.ingrediente WHERE nome ~ :name");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[17]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getTop() {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.ingrediente WHERE id IN
		(SELECT id_produto FROM
		(SELECT count(*) as top, id_produto
		FROM $schema.quantidade_disponivel
		GROUP BY id_produto
		ORDER BY top DESC LIMIT 10) AS topingredientes)");
	  $stmt->execute();
	  // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      //$_SESSION["s_errors"]["generic"][] = "ERRO[32]: ".$e->getMessage();
      //header("Location: list.php");
      die;
    }
  }
  
  
    // get all tuples of ingrediente
  function getAllByType($tipo) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.ingrediente where tipo = :tipo");
      $stmt->bindParam(':tipo', $tipo);
	  $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[18]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // get author's data
  function getById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.ingrediente WHERE id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[19]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
 
 // update ingrediente
  function update($id, $name, $unidade_medida, $tipo) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.ingrediente SET nome=?, unidade_medida=?, tipo=? WHERE id=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $unidade_medida, $tipo, $id));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[20]: ".$errmsg;
      return $errors;
    }
  }
  
  // insert author
  function insert($name, $unidade_medida, $tipo) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.ingrediente (nome, unidade_medida, tipo) VALUES (?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name, $unidade_medida, $tipo));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[21]: ".$errmsg;
      return $errors;
    }
  }

  // delete ingrediente
  function delete($id) {
    global $dbh, $schema;
    try {
	
	  $sql = "DELETE FROM $schema.corredor WHERE id_ingrediente = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
	
	  $sql = "DELETE FROM $schema.quantidade_disponivel WHERE id_produto = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
	  
	  $sql = "DELETE FROM $schema.quantidade_necessaria WHERE id_produto = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
	  
      $sql = "DELETE FROM $schema.ingrediente WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[22]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }

} /*** end of class ***/

?>