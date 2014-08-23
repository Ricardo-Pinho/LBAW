<?php
require_once('../../includes/base.php');
require_once('../../database/Quantidade_Disponivel.php');
require_once('../../database/Quantidade_Necessaria.php');
require_once('../../database/Casa_Receita.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/Stock.php');
require_once('../../database/Corredor.php');

$casa = $_POST["id"];

$quantidade = $_POST['txt'];
$receitas = $_POST['receitas'];

//$ingredientes = Quantidade_Disponivel::getquantityInHouse($casa);

$recipeesid = Casa_Receita::GetrecipeeIds($casa);

foreach($recipeesid as $recipee){
	$newvar ="chk".$recipee["id"];
	$quant ="quant".$recipee["id"];
	$rec=$recipee["id"];
	$res = $_POST[$newvar];
	$quantity = $_POST[$quant];
	if($res=="on")
		{
			$array[$rec] = Quantidade_Necessaria::getIngredientsByRecipee($casa,$rec,$quantity);
			foreach($array[$rec] as $ingredient){
				$ingrediente = Ingredientes::getById($ingredient["id"]);
				$value= $ingrediente["qdisponivel"] - $ingredient["qcompra"];
				if($value<=0)
				$errors = Quantidade_Disponivel::qdelete($casa,$ingredient["id"]);
				else
				$errors = Quantidade_Disponivel::qupdate($casa,$ingredient["id"],$value);
				if ($errors) {
				  $_SESSION["s_errors"] = $errors;
				  header("Location: " . $_SERVER["HTTP_REFERER"]);
				}
			}
		}
	else
		{
			$recon=null;
		}
	
}
$needingredients = null;
$exists=false;
$isempty=true;
foreach( $array as $recon)
{
	foreach($recon as $ingredient)
	{
		if($needingredients!=null){
			foreach ($needingredients as $ingrediente)
			{
				if($ingredient["id"]==$ingrediente["id"])
					{
						$needingredients[$ingrediente["id"]]["qcompra"] = $ingrediente["qcompra"]+$ingredient["qcompra"];
						$exists=true;
					}
			}
		}
		if($exists==false)
		{
			if($ingredient["qcompra"]>0)
				{
					if($_POST["chkstore"]=="on")
						{
							$instore = Corredores::getStoreByIngredient($_POST["loja"],$ingredient["id"]);
							if($instore!=null)
							{
								$needingredients[$ingredient["id"]] = $ingredient;
								$isempty=false;
							}
						}
					else
						$needingredients[$ingredient["id"]] = $ingredient;
						$isempty=false;
				}
		}
		$exists=false;
	}
}
if($_POST["naoalimenticios"]=="on")
{
	if($_POST["chkstore"]=="on")
		$getproducts = Stock::getNeededProductsInStore($casa,$_POST["loja"]);
	else
		$getproducts = Stock::getNeededProducts($casa);
}
	
if($getproducts!=null)
	$isempty=false;


$smarty->assign("getproducts", $getproducts);
$smarty->assign("recon", $needingredients);
$smarty->assign("casa", $casa);
$smarty->assign("isempty", $isempty);

$smarty->display('casa/showshopinglist.tpl');

?>