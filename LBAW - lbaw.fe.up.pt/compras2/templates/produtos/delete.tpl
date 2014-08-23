{* delete user template *}
{include file='header.tpl'}

{if {$produto.id}!=null}

  <h1>Remover - {$produto.nome}</h1>

   <ul>
    <li><strong>Nome:</strong> {$produto.nome}</li>
    <li><strong>Unidade de Medida:</strong> {$produto.unidade_medida}</li>
  </ul>


  <p>Tem a certeza? 
    <a class="options" href="delete_action.php?id={$produto.id}&type=produto">Sim</a>
    <a class="options" href="verproduto.php?id={$produto.id}">Não</a>
  </p>
  
{else}
  <h1>Remover - {$ingrediente.nome}</h1>

   <ul>
    <li><strong>Nome:</strong> {$ingrediente.nome}</li>
    <li><strong>Unidade de Medida:</strong> {$ingrediente.unidade_medida}</li>
	<li><strong>Tipo:</strong> {$ingrediente.tipo}</li>
  </ul>


  <p>Tem a certeza? 
    <a class="options" href="delete_action.php?id={$ingrediente.id}&type=ingrediente">Sim</a>
    <a class="options" href="veringrediente.php?id={$ingrediente.id}">Não</a>
  </p>
{/if}


{include file='footer.tpl'}
