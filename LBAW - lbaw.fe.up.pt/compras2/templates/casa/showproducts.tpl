{* get user template *}
{include file='header.tpl'}
 
  <h1>Listas de Produtos de {$casa.nome}</h1>
  
{if {$noproducts}==false}
    <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Quantidade Disponivel</th>
		  <th class="center" rowspan="1">Quantidade Minima</th>
		  <th class="center" rowspan="1">Quantidade Maxima</th>
		  <th class="center" rowspan="1">Unidade de Medida</th>
		 {if {$isowner}==true || $s_type == "admin"}
		  <th class="center" rowspan="1">Editar</th>
		  <th class="center" rowspan="1">Eliminar</th>
		 {/if}
      </tr>
{foreach from=$produtos item=produto}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../produtos/verproduto.php?id={$produto.id}">
		  {$produto.nome}</a></td>
		  <td class="center">{$produto.qdisponivel}</td>
		  <td class="center">{$produto.qminima}</td>
		  <td class="center">{$produto.qmaxima}</td>
		  <td class="center">{$produto.unidade_medida}</td>
		  {if {$isowner}==true || $s_type == "admin"}
		  <td class="center" rowspan="1"><a href="../casa/editproducts.php?id={$produto.id}&casaid={$casa.id}"><img class="middle" src="../../img/editar.png" alt="Editar" width="16" height="16"/></a></td>
		  <td class="center" rowspan="1"><a href="../casa/deleteproducts.php?id={$produto.id}&casaid={$casa.id}"><img class="middle" src="../../img/apagar.png" alt="Editar" width="16" height="16"/></a></td>
		 {/if}
    </tr>
{/foreach}
  </table>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Esta Casa nao possui Produtos</p>
 {/if}
 <a class="options" href="vercasa.php?id={$casa.id}">Voltar</a>

{include file='footer.tpl'}