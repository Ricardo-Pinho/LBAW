{* list users template *}
{include file='header.tpl'}

  <h1>Ver Produtos</h1>
  {if {$noproducts}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Unidade de Medida</th>
      </tr>
{foreach from=$produtos item=produto}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../produtos/verproduto.php?id={$produto.id}">
		  {$produto.nome}</a></td>
		  <td class="center">{$produto.unidade_medida}</td>
    </tr>
{/foreach}
  </table>
  
    {else}
  			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Nao existem Produtos</p>
			{if $s_type == "admin"}
			<p><a class="options" href="register.php?type=produto">Adicionar Produtos</a></p>
			{/if}
  {/if}

{include file='footer.tpl'}