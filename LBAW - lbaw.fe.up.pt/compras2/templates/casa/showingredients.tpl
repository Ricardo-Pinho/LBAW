{* get user template *}
{include file='header.tpl'}
 
  <h1>Listas de Ingredientes de {$casa.nome}</h1>
  
{if {$noingredients}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Tipo</th>
		  <th class="center" rowspan="1">Quantidade Disponivel</th>
		  <th class="center" rowspan="1">Unidade de Medida</th>
		 {if {$isowner}==true || $s_type == "admin"}
		  <th class="center" rowspan="1">Editar</th>
		  <th class="center" rowspan="1">Eliminar</th>
		 {/if}
      </tr>
{foreach from=$ingredientes item=ingrediente}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../produtos/veringrediente.php?id={$ingrediente.id}">
		  {$ingrediente.nome}</a></td>
		  {if {$ingrediente.tipo}==null}
		  <td class="center">Outro</td>
		  {else}
		  <td class="center">{$ingrediente.tipo}</td>
		  {/if}
		  <td class="center">{$ingrediente.qdisponivel}</td>
		  <td class="center">{$ingrediente.unidade_medida}</td>
		 {if {$isowner}==true || $s_type == "admin"}
		  <td class="center" rowspan="1"><a href="../casa/editingredients.php?id={$ingrediente.id}&casaid={$casa.id}"><img class="middle" src="../../img/editar.png" alt="Editar" width="16" height="16"/></a></td>
		  <td class="center" rowspan="1"><a href="../casa/deleteingredients.php?id={$ingrediente.id}&casaid={$casa.id}"><img class="middle" src="../../img/apagar.png" alt="Editar" width="16" height="16"/></a></td>
		 {/if}
    </tr>
{/foreach}
  </table>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Esta Casa nao possui Ingredientes</p>
 {/if}
 <a class="options" href="vercasa.php?id={$casa.id}">Voltar</a>

{include file='footer.tpl'}