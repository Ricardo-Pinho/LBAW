{* get user template *}
{include file='header.tpl'}
 
  <h1>Listas de Produtos de {$loja.nome}</h1>
  
{if {$noproducts}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Unidade de Medida</th>
		  <th class="center" rowspan="1">Corredor</th>
		{if $s_type=="admin"}
		  <th class="center" rowspan="1">Editar</th>
		  <th class="center" rowspan="1">Eliminar</th>
		{/if}
      </tr>
{foreach from=$produtos item=produto}
    <tr class="check">
	{if {$produto.isproduct}==true}
		  <td class="centerblue"><a class="underline" href="../produtos/verproduto.php?id={$produto.id}">
	{else}
		  <td class="centerblue"><a class="underline" href="../produtos/veringrediente.php?id={$produto.id}">
	{/if}
		  {$produto.nome}</a></td>
		  <td class="center">{$produto.unidade_medida}</td>
		  <td class="center">{$produto.numero}</td>
		{if $s_type == "admin"}
			{if {$produto.isproduct}==true}
			  <td class="center" rowspan="1"><a href="../loja/editproducts.php?id={$produto.id}&lojaid={$loja.id}"><img class="middle" src="../../img/editar.png" alt="Editar" width="16" height="16"/></a></td>
			  <td class="center" rowspan="1"><a href="../loja/deleteproducts.php?id={$produto.id}&lojaid={$loja.id}"><img class="middle" src="../../img/apagar.png" alt="Editar" width="16" height="16"/></a></td>
			{else}
			  <td class="center" rowspan="1"><a href="../loja/editingredients.php?id={$produto.id}&lojaid={$loja.id}"><img class="middle" src="../../img/editar.png" alt="Editar" width="16" height="16"/></a></td>
			  <td class="center" rowspan="1"><a href="../loja/deleteingredients.php?id={$produto.id}&lojaid={$loja.id}"><img class="middle" src="../../img/apagar.png" alt="Editar" width="16" height="16"/></a></td>
			 {/if}
		{/if}
    </tr>
{/foreach}
  </table>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Esta loja nao possui produtos</p>
 {/if}
 <a class="options" href="verloja.php?id={$loja.id}">Voltar</a>

{include file='footer.tpl'}