{* get user template *}
{include file='header.tpl'}
 
 
  <a class="options" href="showhouses.php?id={$utilizador.id}&mail={$utilizador.email}">Mostrar Casas</a>
 
  <h1>{$utilizador.nome}</h1>
  
  <ul>
    <li><strong>Email:</strong> {$utilizador.email}</li>
    <li><strong>Nome:</strong> {$utilizador.nome}</li>
	{if $utilizador.gestor==FALSE}
		<li><strong>Gestor:</strong> NAO</li>
	{else}
		<li><strong>Gestor:</strong> SIM</li>
		<li><strong>Horario</strong></li>
		{if $utilizador.semana_entrada==NULL}
			<li><strong>Semana:</strong> Nao Trabalha</li>
		{else}
			{if $utilizador.semana_entrada_min > 9 }
				<li><strong>Semana:</strong> {$utilizador.semana_entrada}:{$utilizador.semana_entrada_min} - 
					{if $utilizador.semana_saida_min > 9 }
						{$utilizador.semana_saida}:{$utilizador.semana_saida_min}</li>
					{elseif $utilizador.semana_saida_min== null}
						{$utilizador.semana_saida}:00</li>					
					{else}
						{$utilizador.semana_saida}:0{$utilizador.semana_saida_min}</li>
					{/if}
			{elseif $utilizador.semana_entrada_min == null}
				<li><strong>Semana:</strong> {$utilizador.semana_entrada}:00 - 
					{if $utilizador.semana_saida_min > 9 }
						{$utilizador.semana_saida}:{$utilizador.semana_saida_min}</li>
					{elseif $utilizador.semana_saida_min == null}
						{$utilizador.semana_saida}:00</li>					
					{else}
						{$utilizador.semana_saida}:0{$utilizador.semana_saida_min}</li>
					{/if}
			{else}
				<li><strong>Semana:</strong> {$utilizador.semana_entrada}:0{$utilizador.semana_entrada_min} - 
					{if $utilizador.semana_saida_min > 9 }
						{$utilizador.semana_saida}:{$utilizador.semana_saida_min}</li>
					{elseif $utilizador.semana_saida_min == null}
						{$utilizador.semana_saida}:00</li>					
					{else}
						{$utilizador.semana_saida}:0{$utilizador.semana_saida_min}</li>
					{/if}
			{/if}
		{/if}
		{if $utilizador.fsemana_entrada==NULL}
			<li><strong>Fim de Semana:</strong> Nao Trabalha</li>
		{else}
			{if $utilizador.fsemana_entrada_min > 9 }
				<li><strong>Fim de Semana:</strong> {$utilizador.fsemana_entrada}:{$utilizador.fsemana_entrada_min} - 
				{if $utilizador.fsemana_saida_min > 9 }
					{$utilizador.fsemana_saida}:{$utilizador.fsemana_saida_min}</li>
				{elseif $utilizador.fsemana_saida_min == null}
					{$utilizador.fsemana_saida}:00</li>				
				{else}
					{$utilizador.fsemana_saida}:0{$utilizador.fsemana_saida_min}</li>
				{/if}
			{elseif $utilizador.fsemana_entrada_min == null}
				<li><strong>Fim de Semana:</strong> {$utilizador.fsemana_entrada}:00 - 
				{if $utilizador.fsemana_saida_min > 9 }
					{$utilizador.fsemana_saida}:{$utilizador.fsemana_saida_min}</li>
				{elseif $utilizador.fsemana_saida_min == null}
					{$utilizador.fsemana_saida}:00</li>				
				{else}
					{$utilizador.fsemana_saida}:0{$utilizador.fsemana_saida_min}</li>
				{/if}
			{else}
				<li><strong>Fim de Semana:</strong> {$utilizador.fsemana_entrada}:0{$utilizador.fsemana_entrada_min} - 
				{if $utilizador.fsemana_saida_min > 9 }
					{$utilizador.fsemana_saida}:{$utilizador.fsemana_saida_min}</li>
				{elseif $utilizador.fsemana_saida_min == null}
					{$utilizador.fsemana_saida}:00</li>				
				{else}
					{$utilizador.fsemana_saida}:0{$utilizador.fsemana_saida_min}</li>
				{/if}
			{/if}
		{/if}
	{/if}
  </ul>
  <p></p>
{if $s_type == "admin" || $s_user == $utilizador.email}
  <a class="options" href="edit.php?id={$utilizador.email}">Editar Dados</a> |
  <a class="options" href="edit.php?id={$utilizador.email}&password=true">Mudar a Password</a> |
  <a class="options" href="delete.php?id={$utilizador.email}">Eliminar Utilizador</a>
{/if}

{include file='footer.tpl'}