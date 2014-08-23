{* list users template *}
{include file='header.tpl'}

  <h1>Ver Casas</h1>
{if {$nohouses}==false }
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Morada</th>
		  <th class="center" rowspan="1">Donos</th>
      </tr>
{foreach from=$casas item=casa}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../casa/vercasa.php?id={$casa.id}">
		  {$casa.nome}</a></td>
		  <td class="center">{$casa.morada}</td>
		  <td class="center">
		  {foreach from=$connections item=connection}
			  {if {$connection.id_casa}=={$casa.id}}
				  {foreach from=$users item=user}
					  {if {$user.id}=={$connection.id_utilizador}}
						<a class="options" href="../user/verconta.php?id={$user.email}">{$user.email}</a>
					  {/if}
				  {/foreach}
			  {/if}
		  {/foreach}
		  </td>
    </tr>
{/foreach}
  </table>
  {else}
			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Nao possui nenhuma Casa</p>
			<p><a class="options" href="register.php">Adicionar Casa</a></p>
  {/if}

{include file='footer.tpl'}