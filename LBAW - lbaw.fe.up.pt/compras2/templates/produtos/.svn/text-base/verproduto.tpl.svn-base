{* get user template *}
{include file='header.tpl'}
 
  <a class="options" href="showhousesbyproduct.php?id={$produto.id}">Casas Associadas a este Produto</a> |
  <a class="options" href="showstoresbyproduct.php?id={$produto.id}">Lojas Associadas a este Produto</a> 
 
  <h1>{$produto.nome}</h1>
  
  <ul>
    <li><strong>Nome:</strong> {$produto.nome}</li>
	<li><strong>Unidade de Medida:</strong> {$produto.unidade_medida}</li>
  </ul> 
  <p></p>
{if $s_type == "admin" || $s_user != ""}
	<a class="options" href="edit.php?id={$produto.id}&type=produto&addhouse=true">Adicionar Produto a uma Casa</a> |
{/if}  
  
{if $s_type == "admin"}
  <a class="options" href="edit.php?id={$produto.id}&type=produto&addstore=true">Adicionar Produto a uma Loja</a> |
  <a class="options" href="edit.php?id={$produto.id}&type=produto">Editar Dados</a> |
  <a class="options" href="delete.php?id={$produto.id}&type=produto">Eliminar Produto</a>
{/if}

{include file='footer.tpl'}