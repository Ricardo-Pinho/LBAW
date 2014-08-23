{* delete user template *}
{include file='header.tpl'}

  <h1>Remover Casa - {$casa.nome}</h1>

   <ul>
    <li><strong>Nome:</strong> {$casa.nome}</li>
    <li><strong>Morada:</strong> {$casa.morada}</li>
  </ul>


  <p>Tem a certeza? 
    <a class="options" href="delete_action.php?id={$casa.id}">Sim</a>
    <a class="options" href="vercasa.php?id={$casa.id}">Não</a>
  </p>


{include file='footer.tpl'}
