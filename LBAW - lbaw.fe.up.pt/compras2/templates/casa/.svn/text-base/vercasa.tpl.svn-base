{* get user template *}
{include file='header.tpl'}
 
  <a class="options" href="showingredients.php?id={$casa.id}">Ver Ingredientes da casa</a> |
  <a class="options" href="showproducts.php?id={$casa.id}">Ver Produtos da casa</a> |
  <a class="options" href="showrecipees.php?id={$casa.id}">Ver Receitas da casa</a> |
  <a class="options" href="showusers.php?id={$casa.id}">Ver Utilizadores da casa</a>
 
  <h1>{$casa.nome}</h1>
  
  <ul>
    <li><strong>Nome:</strong> {$casa.nome}</li>
	<li><strong>Morada:</strong> {$casa.morada}</li>
  </ul>
  <p></p>
{if $s_type == "admin" || {$isowner}==true}
  <a class="options" href="shoplist.php?id={$casa.id}">Gerar Lista de Compras</a> |
  <a class="options" href="edit.php?id={$casa.id}">Editar Dados</a> |
  <a class="options" href="edit.php?id={$casa.id}&adduser=true">Adicionar ou Remover Utilizadores da Casa</a> |
  <a class="options" href="delete.php?id={$casa.id}">Eliminar Casa</a>
{/if}

{include file='footer.tpl'}