{* get user template *}
{include file='header.tpl'}
 
 <a class="options" href="showhousesbyingredient.php?id={$ingrediente.id}">Casas Associadas</a> |
 <a class="options" href="showstoresbyingredient.php?id={$ingrediente.id}">Lojas Associadas</a> | 
 <a class="options" href="showrecipeesbyingredient.php?id={$ingrediente.id}">Receitas Associadas</a>
 
  <h1>{$ingrediente.nome}</h1>
  
  <ul>
    <li><strong>Nome:</strong> {$ingrediente.nome}</li>
	<li><strong>Unidade de Medida:</strong> {$ingrediente.unidade_medida}</li>
	{if $ingrediente.tipo==null}
	<li><strong>Tipo:</strong>Outro</li>
	{else}
	<li><strong>Tipo:</strong> {$ingrediente.tipo}</li>
	{/if}
  </ul>
  <p></p>
{if $s_type == "admin" || $s_user != ""}
<a class="options" href="edit.php?id={$ingrediente.id}&type=ingrediente&addhouse=true">Adicionar a uma Casa</a> |
{/if} 
  
{if $s_type == "admin"}
  <a class="options" href="edit.php?id={$ingrediente.id}&type=ingrediente&addstore=true">Adicionar a uma Loja</a> |
  <a class="options" href="edit.php?id={$ingrediente.id}&type=ingrediente">Editar Dados</a> |
  <a class="options" href="delete.php?id={$ingrediente.id}&type=ingrediente">Eliminar Ingrediente</a>
{/if}

{include file='footer.tpl'}