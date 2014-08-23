<?php

class Stock {

  function addproduct($produtoid, $casaid,$qmin,$qmax,$qd) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.stock (id_produto, id_casa, qminima, qmaxima, qdisponivel) VALUES (?, ?, ?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($produtoid, $casaid,$qmin,$qmax,$qd));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
	$errors["generic"][] = "ERRO[32]: ".$errmsg;
      return $errors;
    }
  }
  
  function updateproduct($produtoid, $casaid,$qmin,$qmax,$qd) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.stock SET qminima=?, qmaxima=?, qdisponivel=? WHERE id_produto=? AND id_casa=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($qmin, $qmax, $qd, $produtoid, $casaid));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[26]: ".$errmsg;
      return $errors;
    }
  }


  function getProductsByHouse($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.naoalimenticio.id, nome, unidade_medida, qdisponivel, qminima, qmaxima FROM $schema.naoalimenticio,$schema.stock WHERE $schema.naoalimenticio.id=$schema.stock.id_produto AND $schema.stock.id_casa = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
    function getNeededProducts($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.naoalimenticio.id, nome, unidade_medida, (qmaxima-qdisponivel) as qcompra FROM $schema.naoalimenticio,$schema.stock WHERE $schema.naoalimenticio.id=$schema.stock.id_produto AND $schema.stock.id_casa = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
   function getNeededProductsInStore($id,$loja) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.naoalimenticio.id, nome, unidade_medida, (qmaxima-qdisponivel) as qcompra FROM $schema.naoalimenticio,$schema.stock WHERE qmaxima>qdisponivel AND $schema.naoalimenticio.id=$schema.stock.id_produto AND $schema.stock.id_casa = :id AND $schema.naoalimenticio.id IN (SELECT id_produto FROM $schema.corredor where id_loja = :loja)");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':loja', $loja);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
    function getProductByHouse($id,$casaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.naoalimenticio.id, nome, unidade_medida, qdisponivel, qminima, qmaxima FROM $schema.naoalimenticio,$schema.stock WHERE $schema.naoalimenticio.id=$schema.stock.id_produto AND $schema.stock.id_produto = :id AND $schema.stock.id_casa = :casaid");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':casaid', $casaid);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
   function getConnection($id, $casaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.stock WHERE id_produto = :id AND id_casa = :casaid");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':casaid', $casaid);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[30]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
  function getHousesByProduct($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.casa.id, nome,morada, qdisponivel, qminima, qmaxima FROM $schema.casa,$schema.stock WHERE $schema.casa.id=$schema.stock.id_casa AND $schema.stock.id_produto = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[34]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
  function delete($casa, $produto) {
    global $dbh, $schema;
    try {
      $sql = "DELETE FROM $schema.stock WHERE id_produto= ? AND id_casa = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($produto, $casa));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[211]: ".$errmsg;
      return $errors;
    }
  }
}
?>