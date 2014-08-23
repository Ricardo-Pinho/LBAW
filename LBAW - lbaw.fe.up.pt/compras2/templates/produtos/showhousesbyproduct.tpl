{* get user template *}
{include file='header.tpl'}
 
  <h1>Listas de Casas de {$produto.nome}</h1>
  
{if {$nohouses}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Morada</th>
		  <th class="center" rowspan="1">Q. Disponivel</th>
		  <th class="center" rowspan="1">Q. Minima</th>
		  <th class="center" rowspan="1">Q. Maxima</th>
      </tr>
{foreach from=$casas item=casa}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../casa/vercasa.php?id={$casa.id}">
		  {$casa.nome}</a></td>
		  <td class="center">{$casa.morada}</td>
		  <td class="center">{$casa.qdisponivel}</td>
		  <td class="center">{$casa.qminima}</td>
		  <td class="center">{$casa.qmaxima}</td>
    </tr>
{/foreach}
  </table>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Este produto nao existe em nenhuma casa</p>
 {/if}
 <a class="options" href="verproduto.php?id={$produto.id}">Voltar</a>

{include file='footer.tpl'}