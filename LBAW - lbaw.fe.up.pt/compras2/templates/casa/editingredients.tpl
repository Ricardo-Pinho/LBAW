{include file='header.tpl'}

	<script type="text/javascript" src="../../js/validations.js"></script>
 
  <h1>Adicionar {$ingrediente.nome} a {$casa.nome}</h1>
  {if {$isowner}==true || $s_type == "admin"}
	<div class="border">
	<form action="../casa/editingredients_action.php" onsubmit="return validateQuantidade(this);" method="post">
	<input type="hidden" name="id" value="{$ingrediente.id}" />
	<input type="hidden" name="casaid" value="{$casa.id}" />
	  
	<p class="marginbottom"><a class="navtext">Quantidade Disponivel:</a><input type="text" size="4" name="qdisponivel" id="qdisponivel" value="{$ingrediente.qdisponivel}" required="required"/><a class="reginfo">{$ingrediente.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	<input type="submit"  class="options" value="Editar" />
	</form>
    </div> 

{else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Voce nao e dono da casa!</p>
{/if}

{include file='footer.tpl'}