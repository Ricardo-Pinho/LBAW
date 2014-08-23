<?php

require_once('../../includes/base.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/NaoAlimenticio.php');
require_once('../../database/Quantidade_Disponivel.php');
require_once('../../database/Stock.php');
require_once('../../database/Corredor.php');

// store user input values
$_SESSION["s_values"] = $_POST;

if ($_SESSION["s_errors"]) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die;
}

$id = $_POST["id"];
$nome = $_POST["nome"];
$unidade_medida =  $_POST["unidade_medida"];
if($_GET["type"]=="ingrediente")
$tipo =  $_POST["tipo"];

if($_GET["type"]=="ingrediente")
{
	if($_GET["addathouse"]!="true" && $_GET["addatstore"]!="true"){
		// check parameters
		if ($_POST["nome"] == "") 
		  $_SESSION["s_errors"]["generic"][] = 'O nome não pode ser vazio';

		if ($_POST["unidade_medida"] == "") 
		  $_SESSION["s_errors"]["generic"][] = 'A unidade de medida não pode ser vazia';
		$errors = Ingredientes::update($id, $nome, $unidade_medida,$tipo);
	}
	else if ($_GET["addathouse"]=="true"){
		$ingredienteid=$_POST["id"];
		$casaid=$_POST["casa"];
		$qd=$_POST["qdisponivel"];
		$var = Quantidade_Disponivel::getConnection($ingredienteid,$casaid);
		if($var==null)
			$errors = Quantidade_Disponivel::addingredient($ingredienteid, $casaid,$qd);		
		else
		{
			$_SESSION["s_errors"]["generic"][] = "Este ingrediente ja existe nesta casa";
			header("Location: ../../index.php");
			die;
		}
	}
	else{
		$ingredienteid=$_POST["id"];
		$lojaid=$_POST["loja"];
		$cr=$_POST["corredor"];
		$isproduct="FALSE";
		$var = Corredores::getStorebyIngredient($lojaid,$ingredienteid); 
		if($var ==null)
			$errors = Corredores::addingredient($ingredienteid, $lojaid,$cr,$isproduct);
		else
		{
			$_SESSION["s_errors"]["generic"][] = "Este ingrediente ja existe nesta loja";
			header("Location: ../../index.php");
			die;
		}
		}
}
else if($_GET["type"]=="produto")
{
	if($_GET["addathouse"]!="true" && $_GET["addatstore"]!="true"){
		// check parameters
		if ($_POST["nome"] == "") 
		  $_SESSION["s_errors"]["generic"][] = 'O nome não pode ser vazio';

		if ($_POST["unidade_medida"] == "") 
		  $_SESSION["s_errors"]["generic"][] = 'A unidade de medida não pode ser vazia';
		$errors = NaoAlimenticios::update($id, $nome, $unidade_medida);
	}
	else if ($_GET["addathouse"]=="true"){
		$produtoid=$_POST["id"];
		$casaid=$_POST["casa"];
		$qmin=$_POST["qminima"];
		$qmax=$_POST["qmaxima"];
		$qd=$_POST["qdisponivel"];
		$var = Stock::getConnection($produtoid,$casaid);
		if($var==null)
			$errors = Stock::addproduct($produtoid, $casaid,$qmin,$qmax,$qd);
		else{
		     $_SESSION["s_errors"]["generic"][] = "Este produto ja existe nesta casa";
			header("Location: ../../index.php");
			die;
		}
	}
	else{
		$produtoid=$_POST["id"];
		$lojaid=$_POST["loja"];
		$cr=$_POST["corredor"];
		$isproduct="TRUE";
		$var = Corredores::getStorebyProduct($lojaid,$produtoid);
		if($var==null)
			$errors = Corredores::addproduct($produtoid, $lojaid, $cr,$isproduct);
		else{
			$_SESSION["s_errors"]["generic"][] = "Este produto ja existe nesta loja";
			header("Location: ../../index.php");
			die;
			}
		}
}
else{
	$_SESSION["s_errors"]["generic"][] = 'O Tipo tem que ser ou produto ou ingrediente!'; 
	header("Location: ../../index.php");
	die;
}

if ($errors) {
	$_SESSION["s_errors"] = $errors;
	header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else {
	if($_GET["type"]=="ingrediente"){
		if($_GET["addathouse"]!="true" && $_GET["addatstore"]!="true")
		  $_SESSION["s_messages"][] = 'Ingrediente alterado com sucesso';
		else
		  $_SESSION["s_messages"][] = 'O Ingrediente foi inserido com sucesso';
		  header("Location: veringrediente.php?id=" . $id);
	}
	else if($_GET["type"]=="produto")
	{
		if($_GET["addathouse"]!="true" && $_GET["addatstore"]!="true")
		  $_SESSION["s_messages"][] = 'Produto alterado com sucesso';
		else
		  $_SESSION["s_messages"][] = 'O Produto foi inserido com sucesso';
		  header("Location: verproduto.php?id=" . $id);
	}
}

?>