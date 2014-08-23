<?php

class Quantidade_Necessaria {

  // get author's data
  function getIngredientsByRecipee($casa_id, $receita_id, $quantidade) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id,nome, unidade_medida, tipo, ((:quant * q_necessaria)-qdisponivel) as qcompra 
	  FROM $schema.ingrediente,$schema.quantidade_necessaria,$schema.quantidade_disponivel 
	  WHERE id_receita = :id_receita 
	  AND $schema.ingrediente.id=$schema.quantidade_necessaria.id_produto 
	  AND $schema.ingrediente.id=$schema.quantidade_disponivel.id_produto 
	  AND qdisponivel IN (SELECT qdisponivel FROM $schema.quantidade_disponivel WHERE id_casa = :id_casa)
	  Union
	  SELECT $schema.ingrediente.id,nome,unidade_medida, tipo, (:quant * q_necessaria) as qcompra 
	  FROM $schema.ingrediente,$schema.quantidade_necessaria, $schema.quantidade_disponivel
	  WHERE id_receita = :id_receita AND $schema.ingrediente.id=$schema.quantidade_necessaria.id_produto 
	  AND $schema.ingrediente.id NOT IN (SELECT id_produto FROM $schema.quantidade_disponivel WHERE id_casa = :id_casa)");
      $stmt->bindParam(':id_receita', $receita_id, PDO::PARAM_INT);
	  $stmt->bindParam(':id_casa', $casa_id, PDO::PARAM_INT);
	  $stmt->bindParam(':quant', $quantidade, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
  function insert($id_ingrediente, $id_receita, $quantidade) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.quantidade_necessaria (id, id_produto, id_receita, q_necessaria) VALUES (DEFAULT, ?, ?, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($id_ingrediente, $id_receita, $quantidade));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = $id_ingrediente."ERRO[35]".$id_receita.": ".$errmsg.$quantidade;
      return $errors;
    }
  }
  
    // get author's data
  function getIngredientsbyHouse($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT $schema.ingrediente.id, nome, unidade_medida, tipo, q_necessaria FROM $schema.ingrediente,$schema.quantidade_necessaria WHERE $schema.ingrediente.id = $schema.quantidade_necessaria.id AND $schema.quantidade_necessaria.id_receita IN (SELECT id_receita FROM $schema.casa_receita WHERE id_casa = :id)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
      // get author's data
  function getRecipeesbyIngredient($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE id IN (SELECT id_receita from $schema.quantidade_necessaria WHERE id_produto = :id)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return ($result);
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[33]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

} /*** end of class ***/

?>