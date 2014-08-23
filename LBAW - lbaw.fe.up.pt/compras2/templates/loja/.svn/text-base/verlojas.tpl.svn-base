{* list users template *}
{include file='header.tpl'}

  <h1>Ver Lojas</h1>
  
 {if {$nostores}==false}
  <table class="centertable">
    <tr>
		  <th class="center" rowspan="1">Nome</th>
		  <th class="center" rowspan="1">Contacto</th>
      </tr>
{foreach from=$stores item=loja}
    <tr class="check">
		  <td class="centerblue"><a class="underline" href="../loja/verloja.php?id={$loja.id}">
		  {$loja.nome}</a></td>
		  <td class="center">{$loja.contacto}</td>
    </tr>
{/foreach}
  </table>

  {else}
  			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Nao existem Lojas</p>
			{if $s_type == "admin"}
			<p><a class="options" href="register.php">Adicionar Loja</a></p>
			{/if}
  {/if}

{include file='footer.tpl'}