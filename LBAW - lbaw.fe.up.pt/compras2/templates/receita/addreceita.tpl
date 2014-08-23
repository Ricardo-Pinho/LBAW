{include file='header.tpl'}
 
  <h1>Adicionar {$receita.nome} a uma Casa</h1>
  {if {$nohouses}==false}
	<div class="border">
	<form action="../receita/edit_action.php?addathouse=true" method="post">
	<input type="hidden" name="id" value="{$receita.id}" />
	<input type="hidden" name="s_id" value="{$s_id}" />
	<p><a class="navtext">Escolha a que casa deseja adicionar esta receita:</a></p>
    <p class="marginbottom"><select name="casa" id="casa" size="1">
			{foreach from=$casas item=casa}
				<option value={$casa.id}>{$casa.nome}</option>
			{/foreach}
		   </select></p>
    <span class="error">{$s_errors.casa}</span>
	<input type="submit"  class="options" value="Adicionar" />
	</form>
    </div> 

{else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Voce nao tem casas!</p>
			<p><a class="options" href="../casa/register.php">Adicionar Casa</a></p>
{/if}

{if $s_type == "admin"}
  <a class="options" href="edit.php?id={$ingrediente.id}&type=ingrediente">Editar Dados</a> |
  <a class="options" href="delete.php?id={$ingrediente.id}&type=ingrediente">Eliminar Produto</a>
{/if}

{include file='footer.tpl'}