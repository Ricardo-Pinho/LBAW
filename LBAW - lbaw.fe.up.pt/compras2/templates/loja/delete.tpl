{* delete user template *}
{include file='header.tpl'}


  <h1>Remover - {$loja.nome}</h1>

   <ul>
    <li><strong>Nome:</strong> {$loja.nome}</li>
    <li><strong>Contacto:</strong> {$loja.contacto}</li>
  </ul>


  <p>Tem a certeza? 
    <a class="options" href="delete_action.php?id={$loja.id}">Sim</a>
    <a class="options" href="verloja.php?id={$loja.id}">Não</a>
  </p>


{include file='footer.tpl'}
