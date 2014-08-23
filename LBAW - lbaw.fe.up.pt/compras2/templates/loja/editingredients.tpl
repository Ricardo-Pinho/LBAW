{include file='header.tpl'}
 
  <h1>Editar {$ingrediente.nome} na Loja {$loja.nome}</h1>
  
	<div class="border">
	<form action="../loja/editingredients_action.php" method="post">
	<input type="hidden" name="id" value="{$ingrediente.id}" />
	<input type="hidden" name="lojaid" value="{$loja.id}" />
	  
	<p class="marginbottom"><a class="navtext">Corredor:</a><input type="text" size="4" name="corredor" id="corredor" value="{$ingrediente.numero}" required="required"/>
	<span class="error">{$s_errors.corredor}</span>
	<input type="submit"  class="options" value="Editar" />
	</form>
    </div> 


{include file='footer.tpl'}