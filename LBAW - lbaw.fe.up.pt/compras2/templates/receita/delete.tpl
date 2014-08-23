{* delete user template *}
{include file='header.tpl'}


  <h1>Remover - {$receita.nome}</h1>

  <table class="centertable">
    <tr>
		  <th class="center">Tempo(min)</th>
		  <th class="center">Doses</th>
    </tr>
    <tr class="check">
		  <td class="center">{$receita.tempo_preparo}</td>
		  <td class="center">{$receita.qpessoas}</td>
	</tr>
  </table>
  <br>
  
  <p>Modo de preparo:</p><br>
  <p>{$receita.preparo}</p>


  <p>Tem a certeza? 
    <a class="options" href="delete_action.php?id={$receita.id}">Sim</a>
    <a class="options" href="verreceita.php?id={$receita.id}">Não</a>
  </p>


{include file='footer.tpl'}
