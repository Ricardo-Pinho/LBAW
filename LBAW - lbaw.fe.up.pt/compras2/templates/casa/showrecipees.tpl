{* list users template *}
{include file='header.tpl'}

{if {$norecipees}==false}
  <h1>Receitas</h1>

  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Tempo</th>
		  <th class="center" rowspan="1">Doses</th>
		 {if {$isowner}==true || $s_type == "admin"}
		  <th class="center" rowspan="1">Eliminar</th>
		 {/if}
      </tr>

{foreach from=$receitas item=receita}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../receita/verreceita.php?id={$receita.id}">{$receita.nome}</a></td>
		  <td class="center">{$receita.tempo_preparo}</td>
		  <td class="center">{$receita.qpessoas}</td>
		 {if {$isowner}==true|| $s_type == "admin"}
		  <td class="center" rowspan="1"><a href="../casa/deleterecipees.php?id={$receita.id}&casaid={$casa.id}"><img class="middle" src="../../img/apagar.png" alt="Editar" width="16" height="16"/></a></td>
		 {/if}
	</tr>
{/foreach}
  </table>
{else}
   			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Não existem Receitas nesta Casa!</p>
{/if}

 <a class="options" href="vercasa.php?id={$casa.id}">Voltar</a>

{include file='footer.tpl'}