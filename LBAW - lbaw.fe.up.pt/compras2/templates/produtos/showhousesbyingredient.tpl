{* get user template *}
{include file='header.tpl'}
 
  <h1>Listas de Casas de {$ingrediente.nome}</h1>
  
{if {$nohouses}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Morada</th>
		  <th class="center" rowspan="1">Q.Disponivel</th>
      </tr>
{foreach from=$casas item=casa}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../casa/vercasa.php?id={$casa.id}">
		  {$casa.nome}</a></td>
		  <td class="center">{$casa.morada}</td>
		  <td class="center">{$casa.qdisponivel}</td>
    </tr>
{/foreach}
  </table>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Este ingrediente nao existe em nenhuma casa</p>
 {/if}
 <a class="options" href="veringrediente.php?id={$ingrediente.id}">Voltar</a>

{include file='footer.tpl'}