<?php
require_once('../../includes/base.php');
require_once('../../database/Receita.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/Quantidade_Necessaria.php');
require_once('../../database/Casas.php');
require_once('../../database/Casa_Receita.php');


$nome = $_POST["nome"];
$tempo = $_POST["tempo"];
$quant = $_POST["quant"];
$preparo = $_POST["preparo"];
$tipo = $_POST["tipo"];
$privado = $_POST["privado_opt"];

if ($privado == "101")
{
	$p = "TRUE";
}
else if($privado == "102")
{
	$p = "FALSE";
}

$quantidade = $_POST['txt'];
$ingredientes = $_POST['ingredientes'];

$errors = Receitas::addReceita($nome, $preparo, $p, $quant, $tempo, $tipo);
if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
} 

$newid = Receitas::getLastReceita();

if($newid==null)
{
  $_SESSION["s_errors"][] = "Não foi possível criar Receita.";
  header("Location: ../main/index.php");
}
foreach($quantidade as $a => $b){
 $errors = Quantidade_Necessaria::insert($ingredientes[$a], $newid, $quantidade[$a]);
if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
} 
  }

  
if($s_id!=$_POST["s_id"])
		{
			$_SESSION["s_errors"]["generic"][] = 'Tem que Efectuar o login!';
			header("Location: ../../index.php");
			die;
		}
	
		$receitaid=$newid;
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
	  header("Location: verreceita.php?id=" . $newid);
	}

?>