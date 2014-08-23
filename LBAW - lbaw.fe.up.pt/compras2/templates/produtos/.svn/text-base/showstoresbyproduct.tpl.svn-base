{* get user template *}
{include file='header.tpl'}
 
  <h1>Listas de Lojas de {$produto.nome}</h1>
  
{if {$nostores}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Contacto</th>
		  <th class="center" rowspan="1">Corredor</th>
      </tr>
{foreach from=$lojas item=loja}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../loja/verloja.php?id={$loja.id}">
		  {$loja.nome}</a></td>
		  <td class="center">{$loja.contacto}</td>
		  <td class="center">{$loja.numero}</td>
    </tr>
{/foreach}
  </table>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Este produto nao existe em nenhuma loja</p>
 {/if}
 <a class="options" href="verproduto.php?id={$produto.id}">Voltar</a>

{include file='footer.tpl'}