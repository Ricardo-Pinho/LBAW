<?

require_once('../../includes/base.php');
require_once('../../database/Utilizadores.php');
require_once('../../database/Casas.php');
require_once('../../database/Ingrediente.php');
require_once('../../database/NaoAlimenticio.php');
require_once('../../database/Receita.php');
require_once('../../database/Loja.php');

$option = $_GET["tipo"];
$name = $_GET["pesquisa"];
$entered=false;
switch ($option) {
    case "101":{
			$casas = Casas::getAllbyName($name);
			$casas_users = Casas::getAllUsersbyName($name);
			$connections = Casas::getAllConnectionsbyName($name);
			$nohouses=false;
			if($casas==null)
				$nohouses=true;
			
			$smarty->assign("nohouses", $nohouses);
			$smarty->assign("casas", $casas);
			$smarty->assign("connections",$connections);
			$smarty->assign("users",$casas_users);
			$smarty->display('casa/vercasas.tpl');
			$entered=true;
			break;
		}
    case "102":{
			$ingredientes = Ingredientes::getAllbyName($name);
			$noingredients=false;
			if($ingredientes==null)
				$noingredients=true;
			
			$smarty->assign("noingredients", $noingredients);
			$smarty->assign("ingredientes", $ingredientes);
			$smarty->display('produtos/veringredientes.tpl');
			$entered=true;
			break;
		}
    case "103":{
			$produtos = NaoAlimenticios::getAllbyName($name);
			$noproducts=false;
			if($produtos==null)
				$noproducts=true;
			
			$smarty->assign("noproducts", $noproducts);
			$smarty->assign("produtos", $produtos);
			$smarty->display('produtos/verprodutos.tpl');
			$entered=true;
			break;
		}
    case "104":{
			$utilizadores = Users::getAllbyName($name);
			$nousers=false;
			if($utilizadores==null)
				$nousers=true;
			
			$smarty->assign("nousers", $nousers);
			$smarty->assign("users", $utilizadores);
			$smarty->display('user/verutilizadores.tpl');
			$entered=true;
			break;
		}
    case "105":{
			if($s_type=="admin")
				$receitas = Receitas::getAllbyNameadmin($name);
			else
				$receitas = Receitas::getAllbyName($name);
			$norecipees=false;
			if($receitas==null)
				$norecipees=true;
			
			$smarty->assign("norecipees", $norecipees);
			$smarty->assign("receitas", $receitas);
			$smarty->display('receita/listarreceitas.tpl');
			$entered=true;
			break;
		}
    case "106":{
			$lojas = Lojas::getAllbyName($name);
			$nostores=false;
			if($lojas==null)
				$nostores=true;
			
			$smarty->assign("nostores", $nostores);
			$smarty->assign("stores", $lojas);
			$smarty->display('loja/verlojas.tpl');
			$entered=true;
			break;
		}		
}

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
if($entered==false) {
  $_SESSION["s_messages"][] = 'Erro na Pesquisa';
  header("Location: ../../index.php");
  }

?>