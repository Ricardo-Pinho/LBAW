{* list users template *}
{include file='header.tpl'}

{if {$norecipees}==false}
  <h1>Receitas</h1>

  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Tempo</th>
		  <th class="center" rowspan="1">Doses</th>
      </tr>

{foreach from=$receitas item=receita}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../receita/verreceita.php?id={$receita.id}">{$receita.nome}</a></td>
		  <td class="center">{$receita.tempo_preparo}</td>
		  <td class="center">{$receita.qpessoas}</td>
	</tr>
{/foreach}
  </table>
{else}
   			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Nenhuma Receita usa este Ingrediente!</p>
{/if}

 <a class="options" href="veringrediente.php?id={$ingrediente.id}">Voltar</a>

{include file='footer.tpl'}