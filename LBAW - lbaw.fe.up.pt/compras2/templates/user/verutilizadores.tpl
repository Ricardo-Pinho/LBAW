{* list users template *}
{include file='header.tpl'}

  <h1>Ver Utilizadores</h1> 
{if {$nousers}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="3">Nome</th>
		  <th class="center" rowspan="3">Email</th>
		  <th class="center" rowspan="3">Gestor</th>
		  <th class="center" colspan="4">Horario</th>
      </tr>
	  <tr>
		  <th class="center" colspan="2">Semana</th>
		  <th class="center" colspan="2">Fim de Semana</th>
      </tr>
	  <tr>
		  <th class="center">Entrada</th>
		  <th class="center">Saida</th>
		  <th class="center">Entrada</th>
		  <th class="center">Saida</th>
      </tr>
{foreach from=$users item=user}
    <tr class="check">
		  <td class="center">{$user.nome}</td>
		  <td class="centerblue"><a class="underline" href="../user/verconta.php?id={$user.email}">
		  {$user.email}</a></td>
		  
		  {if $user.gestor==TRUE}
			  <td class="center">SIM</td>
			  {if $user.semana_entrada==NULL}
				  <td class="centerred">*</td>
				  <td class="centerred">*</td>
			  {else}
				  {if $user.semana_entrada_min > 9}
					<td class="center">{$user.semana_entrada}:{$user.semana_entrada_min}</td>
				  {elseif $user.semana_entrada_min == null}
					<td class="center">{$user.semana_entrada}:00</td>
				  {else}
					<td class="center">{$user.semana_entrada}:0{$user.semana_entrada_min}</td>
				  {/if}
				  {if $user.semana_saida_min > 9}
					<td class="center">{$user.semana_saida}:{$user.semana_saida_min}</td>
				  {elseif $user.semana_saida_min ==null}
					<td class="center">{$user.semana_saida}:00</td>
				  {else}
					<td class="center">{$user.semana_saida}:0{$user.semana_saida_min}</td>
				  {/if}
			 {/if}
		  {if $user.fsemana_entrada==NULL}
		  <td class="centerred">*</td>
		  <td class="centerred">*</td>
		  {else}
			  {if $user.fsemana_entrada_min > 9}
				<td class="center">{$user.fsemana_entrada}:{$user.fsemana_entrada_min}</td>
			  {elseif $user.fsemana_entrada_min == null}
				<td class="center">{$user.fsemana_entrada}:00</td>		  
			  {else}
				<td class="center">{$user.fsemana_entrada}:0{$user.fsemana_entrada_min}</td>
			  {/if}
			  {if $user.fsemana_saida_min > 9}
				<td class="center">{$user.fsemana_saida}:{$user.fsemana_saida_min}</td>
			  {elseif $user.fsemana_saida_min == null}
				<td class="center">{$user.fsemana_saida}:00</td>		  
			  {else}
				<td class="center">{$user.fsemana_saida}:0{$user.fsemana_saida_min}</td>
			  {/if}
		  {/if}
		  {else}
		  <td class="center">NAO</td>
		  <td class="center">--</td>
		  <td class="center">--</td>
		  <td class="center">--</td>
		  <td class="center">--</td>
		  {/if}		  
    </tr>
{/foreach}
  </table>

 <p class="left"><a class="red">*</a> - O gestor nao trabalha nesse periodo.</p>
 
 {else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Nao existem utilizadores</p>
			<p><a class="options" href="register.php">Adicionar Utilizador</a></p>
 {/if}

{include file='footer.tpl'}