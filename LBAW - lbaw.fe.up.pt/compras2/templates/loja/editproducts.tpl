{include file='header.tpl'}
 
  <h1>Adicionar {$produto.nome} a {$loja.nome}</h1>
	<div class="border">
	<form action="../loja/editproducts_action.php" method="post">
	<input type="hidden" name="id" value="{$produto.id}" />
	<input type="hidden" name="lojaid" value="{$loja.id}" />
	
	<p class="marginbottom"><a class="navtext">Corredor:</a><input type="text" size="4" name="corredor" id="corredor" value="{$produto.numero}" required="required"/>
	<span class="error">{$s_errors.corredor}</span>
	
	<input type="submit"  class="options" value="Editar" />
      </form>
    </div> 
  
{include file='footer.tpl'}