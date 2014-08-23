{include file='header.tpl'}
 
  <h1>Adicionar {$ingrediente.nome} a uma Loja</h1>
  {if {$nostores}==false}
	<div class="border">
	<form action="../produtos/edit_action.php?addatstore=true&type=ingrediente" method="post">
	<input type="hidden" name="id" value="{$ingrediente.id}" />
	<p><a class="navtext">Escolha a que loja deseja adicionar este produto:</a></p>
    <p class="marginbottom"><select name="loja" id="loja" size="1">
			{foreach from=$lojas item=loja}
				<option value={$loja.id}>{$loja.nome}</option>
			{/foreach}
		   </select></p>
    <span class="error">{$s_errors.loja}</span>
	  
	<p class="marginbottom"><a class="navtext">Corredor:</a><input type="text" size="4" name="corredor" id="corredor" required="required"/>
	<span class="error">{$s_errors.corredor}</span>
	<input type="submit"  class="options" value="Adicionar" />
	</form>
    </div> 
  
{if $s_type == "admin"}
  <p><a class="options" href="edit.php?id={$ingrediente.id}&type=ingrediente">Editar Dados</a></p>
  <p><a class="options" href="delete.php?id={$ingrediente.id}&type=ingrediente">Eliminar Produto</a></p>
{/if}

{else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Voce nao tem lojas!</p>
			<p><a class="options" href="../loja/register.php">Adicionar Loja</a></p>
{/if}

{include file='footer.tpl'}