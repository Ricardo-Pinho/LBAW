{* list users template *}
{include file='header.tpl'}

  <a class="options" href="showhouses.php?id={$receita.id}">Casas Associadas a esta Receita</a>

  <h1>{$receita.nome}</h1>

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
  <table class="centertable">
    <tr>
		  <th class="center">Ingrediente</th>
		  <th class="center">Medida</th>
		  <th class="center">Quantidade</th>
    </tr>
	{foreach from=$ingredientes item=ingrediente}
		<tr class="check">
			<td class="center">{$ingrediente.nome}</td>
			<td class="center">{$ingrediente.unidade_medida}</td>
			<td class="center">{$ingrediente.q_necessaria}</td>
		</tr>
		
	{/foreach}
  </table>
  
  <p>Modo de preparo:</p><br>
  <p>{$receita.preparo}</p>
  
  {if $s_type == "admin" || $s_user != ""}
	<a class="options" href="edit.php?id={$receita.id}&addhouse=true">Adicionar a uma Casa</a> |
  {/if} 

  {if $s_type == "admin"}
  <a class="options" href="edit.php?id={$receita.id}">Editar Dados</a> |
  <a class="options" href="delete.php?id={$receita.id}">Eliminar Receita</a>
{/if}
  
{include file='footer.tpl'}