{include file='header.tpl'}

	<script type="text/javascript" src="../../js/validations.js"></script>
	
  <h1>Adicionar {$produto.nome} a uma Casa</h1>
 {if {$nohouses}==false}
	<div class="border">
	<form action="../produtos/edit_action.php?addathouse=true&type=produto" onsubmit="return validateQuantidades(this);" method="post">
	<input type="hidden" name="id" value="{$produto.id}" />
	<p><a class="navtext">Escolha a que casa deseja adicionar este produto:</a></p>
    <p class="marginbottom"><select name="casa" id="casa" size="1">
			{foreach from=$casas item=casa}
				<option value={$casa.id}>{$casa.nome}</option>
			{/foreach}
		   </select></p>
    <span class="error">{$s_errors.casa}</span>
	<p class="marginbottom"><a class="navtext">Quantidade Minima:</a><input type="text" size="4" name="qminima" id="qminima" required="required"/><a class="reginfo">{$produto.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	
	<p class="marginbottom"><a class="navtext">Quantidade Maxima:</a><input type="text" size="4" name="qmaxima" id="qmaxima" required="required"/><a class="reginfo">{$produto.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	
	<p class="marginbottom"><a class="navtext">Quantidade Disponivel:</a><input type="text" size="4" name="qdisponivel" id="qdisponivel" required="required"/><a class="reginfo">{$produto.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	<input type="submit"  class="options" value="Adicionar" />
      </form>
    </div> 
  
{if $s_type == "admin"}
  <p><a class="options" href="edit.php?id={$produto.id}&type=produto">Editar Dados</a></p>
  <p><a class="options" href="delete.php?id={$produto.id}&type=produto">Eliminar Produto</a></p>
{/if}
{else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Voce nao tem casas!</p>
			<p><a class="options" href="../casa/register.php">Adicionar Casa</a></p>
{/if}
{include file='footer.tpl'}