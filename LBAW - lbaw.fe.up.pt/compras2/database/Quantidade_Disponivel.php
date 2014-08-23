<?php

class Quantidade_Disponivel {

  function addingredient($ingredienteid, $casaid,$qd) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.quantidade_disponivel (id_produto, id_casa, qdisponivel) VALUES (?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($ingredienteid, $casaid,$qd));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
	$errors["generic"][] = "ERRO[29]: ".$errmsg;
      return $errors;
    }
  }
  
  function updateingredient($ingredienteid, $casaid,$qd) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.quantidade_disponivel SET qdisponivel=? WHERE id_produto=? AND id_casa=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($qd, $ingredienteid, $casaid));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[26]: ".$errmsg;
      return $errors;
    }
  }
  
     // update ingrediente
  function qupdate($casa, $ingrediente, $quantidade) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.quantidade_disponivel SET qdisponivel= ? WHERE id_produto= ? AND id_casa = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($quantidade, $ingrediente, $casa));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[210]: ".$errmsg;
      return $errors;
    }
  }
  
       // update ingrediente
  function qdelete($casa, $ingrediente) {
    global $dbh, $schema;
    try {
      $sql = "DELETE FROM $schema.quantidade_disponivel WHERE id_produto= ? AND id_casa = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($ingrediente, $casa));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[211]: ".$errmsg;
      return $errors;
    }
  }


  function getIngredientsByHouse($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id, nome, unidade_medida, qdisponivel FROM $schema.ingrediente,$schema.quantidade_disponivel WHERE $schema.ingrediente.id=$schema.quantidade_disponivel.id_produto AND $schema.quantidade_disponivel.id_casa= :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[30]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
    function getIngredientByHouse($id, $casaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id, nome, unidade_medida, qdisponivel FROM $schema.ingrediente,$schema.quantidade_disponivel WHERE $schema.ingrediente.id=$schema.quantidade_disponivel.id_produto AND $schema.quantidade_disponivel.id_produto= :id AND $schema.quantidade_disponivel.id_casa= :casaid");
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
  
      function getConnection($id, $casaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.quantidade_disponivel WHERE id_produto = :id AND id_casa = :casaid");
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
  
    function getquantityinHouse($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id, nome, unidade_medida, tipo, qdisponivel FROM $schema.ingrediente,$schema.quantidade_disponivel WHERE $schema.ingrediente.id=$schema.quantidade_disponivel.id_produto AND $schema.quantidade_disponivel.id_casa= :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[31]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
  function getHousesByIngredient($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.casa.id, nome, morada, qdisponivel FROM $schema.casa,$schema.quantidade_disponivel WHERE $schema.casa.id=$schema.quantidade_disponivel.id_casa AND $schema.quantidade_disponivel.id_produto= :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[31]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
}

?>