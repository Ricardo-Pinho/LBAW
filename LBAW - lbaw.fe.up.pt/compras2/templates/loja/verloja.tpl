{* get user template *}
{include file='header.tpl'}
 
  <a class="options" href="showproducts.php?id={$loja.id}">Ver Todos os Produtos da loja</a>
 
  <h1>{$loja.nome}</h1>
  
  <ul>
    <li><strong>Nome:</strong> {$loja.nome}</li>
	<li><strong>Contacto:</strong> {$loja.contacto}</li>
  </ul>
  <p></p>
{if $s_type == "admin"}
  <a class="options" href="edit.php?id={$loja.id}">Editar Dados</a> |
  <a class="options" href="delete.php?id={$loja.id}">Eliminar Loja</a>
{/if}

{include file='footer.tpl'}