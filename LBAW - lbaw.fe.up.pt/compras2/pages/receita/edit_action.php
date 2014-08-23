<?php

require_once('../../includes/base.php');
require_once('../../database/Receita.php');
require_once('../../database/Casa_Receita.php');


if ($_GET["addathouse"]=="true"){
if($s_id!=$_POST["s_id"])
		{
			$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
			header("Location: ../../index.php");
			die;
		}
	
		$receitaid=$_POST["id"];
		$casaid=$_POST["casa"];
	$var = Casa_Receita::getConnection($receitaid, $casaid);
	if($var==null)
		$errors = Casa_Receita::addrecipee($receitaid, $casaid);
	else{
			$_SESSION["s_errors"]["generic"][] = 'Esta receita ja foi adicionada a esta casa';
			header("Location: ../../index.php");
			die;
		}
		
		
	if ($errors) {
	  $_SESSION["s_errors"] = $errors;
	  header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	else {
	  $_SESSION["s_messages"][] = 'Receita adicionada com sucesso';
	  header("Location: verreceita.php?id=" . $receitaid);
	}
	}
else{
	if($s_type != "admin"){
		$_SESSION["s_errors"]["generic"][] = 'Não tem permissões';
		header("Location: ../../index.php");
		die;
	}

	$name =  $_POST["nome"];
	$preparo = $_POST["preparo"];
	$privado = $_POST["privado"];
	$qpessoas = $_POST["qpessoas"];
	$tempo_preparo = $_POST["tempo_preparo"];
	$tipo = $_POST["tipo"];
	$id = $_POST["id"];

	$errors = Receitas::update($id,$name,$preparo,$privado,$qpessoas,$tempo_preparo,$tipo);	

	if ($errors) {
	  $_SESSION["s_errors"] = $errors;
	  header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	else {
	  $_SESSION["s_messages"][] = 'Receita alterada com sucesso';
	  header("Location: verreceita.php?id=" . $id);
	}
}

?>