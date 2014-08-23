<?php

class Corredores {

  function addingredient($ingredienteid, $lojaid,$cr,$isproduct) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.corredor (id_loja, numero, id_ingrediente, isproduct) VALUES (?, ?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($lojaid,$cr, $ingredienteid, $isproduct));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
	$errors["generic"][] = "ERRO[51]: ".$errmsg;
      return $errors;
    }
  }
  
    function addproduct($produtoid, $lojaid,$cr,$isproduct) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.corredor (id_produto, id_loja, numero, isproduct) VALUES (?, ?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($produtoid, $lojaid,$cr,$isproduct));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
	$errors["generic"][] = "ERRO[52]: ".$errmsg;
      return $errors;
    }
  }
  
    function getProductsByStore($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id, nome, unidade_medida, isproduct, numero FROM $schema.ingrediente, $schema.corredor WHERE $schema.ingrediente.id=$schema.corredor.id_ingrediente AND $schema.ingrediente.id IN (SELECT id_ingrediente FROM $schema.corredor WHERE id_loja = :id) 
							UNION SELECT $schema.naoalimenticio.id, nome, unidade_medida, isproduct, numero FROM $schema.naoalimenticio, $schema.corredor WHERE $schema.naoalimenticio.id=$schema.corredor.id_produto AND $schema.naoalimenticio.id IN (SELECT id_produto FROM $schema.corredor WHERE id_loja = :id)");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[53]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
   function getProductByStore($id,$lojaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.naoalimenticio.id, nome, numero FROM $schema.naoalimenticio,$schema.corredor WHERE $schema.naoalimenticio.id=$schema.corredor.id_produto AND $schema.corredor.id_produto = :id AND $schema.corredor.id_loja = :lojaid");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':lojaid', $lojaid);
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
  
   function getIngredientByStore($id,$lojaid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id, nome, numero FROM $schema.ingrediente,$schema.corredor WHERE $schema.ingrediente.id=$schema.corredor.id_ingrediente AND $schema.corredor.id_ingrediente = :id AND $schema.corredor.id_loja = :lojaid");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':lojaid', $lojaid);
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
  
  
  function getStoresByProduct($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.loja.id, nome, contacto, numero FROM $schema.loja,$schema.corredor WHERE $schema.loja.id=$schema.corredor.id_loja AND $schema.corredor.id_produto= :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[54]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
    function getStoreByProduct($id,$produtoid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.corredor WHERE id_loja = :id AND id_produto = :idproduto");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':idproduto', $produtoid);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[54]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }

  function getStoresByIngredient($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.loja.id, nome, contacto, numero FROM $schema.loja,$schema.corredor WHERE $schema.loja.id=$schema.corredor.id_loja AND $schema.corredor.id_ingrediente= :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[55]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
    function getStoreByIngredient($id,$ingredienteid) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.corredor WHERE id_loja = :id AND id_ingrediente = :idingrediente");
      $stmt->bindParam(':id', $id);
	  $stmt->bindParam(':idingrediente', $ingredienteid);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[55]: ".$e->getMessage();
        header("Location: ../../index.php");
      die;
    }
  }
  
    function deleteproduto($loja, $produto) {
    global $dbh, $schema;
    try {
      $sql = "DELETE FROM $schema.corredor WHERE id_produto= ? AND id_loja = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($produto, $loja));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[211]: ".$errmsg;
      return $errors;
    }
  }
  
   function deleteingrediente($loja, $produto) {
    global $dbh, $schema;
    try {
      $sql = "DELETE FROM $schema.corredor WHERE id_ingrediente= ? AND id_loja = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($produto, $loja));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[211]: ".$errmsg;
      return $errors;
    }
  }
  
    function updateproduct($produtoid, $lojaid,$cr) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.corredor SET numero=? WHERE id_produto=? AND id_loja=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($cr, $produtoid, $lojaid));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[26]: ".$errmsg;
      return $errors;
    }
  }
  
    function updateingredient($produtoid, $lojaid,$cr) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.corredor SET numero=? WHERE id_ingrediente=? AND id_loja=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($cr, $produtoid, $lojaid));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[26]: ".$errmsg;
      return $errors;
    }
  }
  

} /*** end of class ***/

?>