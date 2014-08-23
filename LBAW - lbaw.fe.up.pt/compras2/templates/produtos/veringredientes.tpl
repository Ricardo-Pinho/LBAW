{* list users template *}
{include file='header.tpl'}

  <h1>Ver Ingredientes</h1>
  
 {if {$noingredients}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Unidade de Medida</th>
		  <th class="center" rowspan="1">Tipo</th>
      </tr>
{foreach from=$ingredientes item=ingrediente}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../produtos/veringrediente.php?id={$ingrediente.id}">
		  {$ingrediente.nome}</a></td>
		  <td class="center">{$ingrediente.unidade_medida}</td>
		  {if {$ingrediente.tipo}==null}
		  <td class="center">Outro</td>
		  {else}
		  <td class="center">{$ingrediente.tipo}</td>
		  {/if}
    </tr>
{/foreach}
  </table>

  {else}
  			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Nao existem Ingredientes</p>
			{if $s_type == "admin"}
			<p><a class="options" href="register.php?type=ingrediente">Adicionar Ingrediente</a></p>
			{/if}
  {/if}

{include file='footer.tpl'}