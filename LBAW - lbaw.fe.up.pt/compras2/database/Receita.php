<?php

class Receitas {

  // get todas as receitas
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE privado = FALSE");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[31]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
    function getAlladmin() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[31]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
 
   function getAllbyName($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE nome ~ :name AND privado = FALSE");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[11]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
     function getAllbyNameadmin($name) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE nome ~ :name");
	  $stmt->bindParam(':name', $name);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[11]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }

  // get top receitas
  function getTop() {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE id IN
		(SELECT id_receita FROM
		(SELECT count(*) as top, id_receita
		FROM $schema.casa_receita
		GROUP BY id_receita
		ORDER BY top DESC LIMIT 10) AS topreceitas) AND privado = FALSE");
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

  // get receita por id
  function getById($id) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.receita WHERE id = :id");
      $stmt->bindParam(':id', $id);
	  $stmt->execute();
	  $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[33]: ".$errmsg;
      return $errors;
    }
  }
  
function getIngredientesByIdReceita($id) {
	global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT id_produto, q_necessaria, nome, unidade_medida
								FROM $schema.quantidade_necessaria, $schema.ingrediente
								WHERE id_receita = :id AND $schema.quantidade_necessaria.id_produto = $schema.ingrediente.id");
      $stmt->bindParam(':id', $id);
	  $stmt->execute();
	  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[33]: ".$errmsg;
      return $errors;
    }
}

  function update($id,$name,$preparo,$privado,$qpessoas,$tempo_preparo,$tipo) {
    global $dbh, $schema;
    try {
      $sql = "UPDATE $schema.receita SET nome=?, preparo=?, privado=?, qpessoas=?, tempo_preparo=?, tipo=?  WHERE id=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($name,$preparo,$privado,$qpessoas,$tempo_preparo,$tipo,$id));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[313]: ".$errmsg;
      return $errors;
    }
  }
  
  
    function delete($id) {
    global $dbh, $schema;
    try { 
	  
	  $sql = "DELETE FROM $schema.quantidade_necessaria WHERE id_receita = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
	  
	  $sql = "DELETE FROM $schema.casa_receita WHERE id_receita = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();  
	  
	  $sql = "DELETE FROM $schema.receita WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[315]: ".$e->getMessage();
      header("Location: ../../index.php");
      die;
    }
  }
  
function addReceita($nome, $preparo, $privado, $qpessoas, $tempo, $tipo) {
	global $dbh, $schema;
    try {
		$sql = "INSERT INTO $schema.receita (id,nome, preparo, privado, qpessoas, tempo_preparo, tipo) VALUES (DEFAULT,?, ?, ?, ?, ?, ?)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array($nome, $preparo, $privado, $qpessoas, $tempo, $tipo));	
	}
	catch(PDOException $e) {
		$errmsg = $e->getMessage();
		// parse errmsg
		$errors["generic"][] = "ERRO[33]: ".$errmsg;
		return $errors;
	}
}

function getLastReceita() {
	global $dbh, $schema;
    try {  
	  $stmt = $dbh->prepare("SELECT * FROM $schema.receita ORDER BY id DESC LIMIT 1");
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
	  return $result["id"];
	  }
	  	catch(PDOException $e) {
		$errmsg = $e->getMessage();
		// parse errmsg
		$errors["generic"][] = "ERRO[323]: ".$errmsg;
		return $errors;
	}
}
  
  /*function getByCasa($id_casa {
	global $dbh, $schema;
	try {
	  $sql = $dbh->("SELECT * FROM $schema.receita WHERE id IN
		(SELECT id_receita FROM $schema.casa_receita WHERE id_casa = :id_casa");
      $stmt->bindParam(':id_casa', $id_casa);
	  $stmt->execute();
	  $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      $errors["generic"][] = "ERRO[33]: ".$errmsg;
      return $errors;
    }*/

} /*** end of class ***/

?>