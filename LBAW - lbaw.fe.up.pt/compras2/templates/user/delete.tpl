{* delete user template *}
{include file='header.tpl'}

  <h1>Remover Utilizador - {$user.nome}</h1>

   <ul>
    <li><strong>Email:</strong> {$user.email}</li>
    <li><strong>Nome:</strong> {$user.nome}</li>
	{if $user.gestor==FALSE}
		<li><strong>Gestor:</strong> NAO</li>
	{else}
		<li><strong>Gestor:</strong> SIM</li>
		<li><strong>Horario</strong></li>
		{if $user.semana_entrada==NULL}
			<li><strong>Semana:</strong> Nao Trabalha</li>
		{else}
			{if $user.semana_entrada_min > 9 }
				<li><strong>Semana:</strong> {$user.semana_entrada}:{$user.semana_entrada_min} - 
					{if $user.semana_saida_min > 9 }
						{$user.semana_saida}:{$user.semana_saida_min}</li>
					{elseif $user.semana_saida_min== null}
						{$user.semana_saida}:00</li>					
					{else}
						{$user.semana_saida}:0{$user.semana_saida_min}</li>
					{/if}
			{elseif $user.semana_entrada_min == null}
				<li><strong>Semana:</strong> {$user.semana_entrada}:00 - 
					{if $user.semana_saida_min > 9 }
						{$user.semana_saida}:{$user.semana_saida_min}</li>
					{elseif $user.semana_saida_min == null}
						{$user.semana_saida}:00</li>					
					{else}
						{$user.semana_saida}:0{$user.semana_saida_min}</li>
					{/if}
			{else}
				<li><strong>Semana:</strong> {$user.semana_entrada}:0{$user.semana_entrada_min} - 
					{if $user.semana_saida_min > 9 }
						{$user.semana_saida}:{$user.semana_saida_min}</li>
					{elseif $user.semana_saida_min == null}
						{$user.semana_saida}:00</li>					
					{else}
						{$user.semana_saida}:0{$user.semana_saida_min}</li>
					{/if}
			{/if}
		{/if}
		{if $user.fsemana_entrada==NULL}
			<li><strong>Fim de Semana:</strong> Nao Trabalha</li>
		{else}
			{if $user.fsemana_entrada_min > 9 }
				<li><strong>Fim de Semana:</strong> {$user.fsemana_entrada}:{$user.fsemana_entrada_min} - 
				{if $user.fsemana_saida_min > 9 }
					{$user.fsemana_saida}:{$user.fsemana_saida_min}</li>
				{elseif $user.fsemana_saida_min == null}
					{$user.fsemana_saida}:00</li>				
				{else}
					{$user.fsemana_saida}:0{$user.fsemana_saida_min}</li>
				{/if}
			{elseif $user.fsemana_entrada_min == null}
				<li><strong>Fim de Semana:</strong> {$user.fsemana_entrada}:00 - 
				{if $user.fsemana_saida_min > 9 }
					{$user.fsemana_saida}:{$user.fsemana_saida_min}</li>
				{elseif $user.fsemana_saida_min == null}
					{$user.fsemana_saida}:00</li>				
				{else}
					{$user.fsemana_saida}:0{$user.fsemana_saida_min}</li>
				{/if}
			{else}
				<li><strong>Fim de Semana:</strong> {$user.fsemana_entrada}:0{$user.fsemana_entrada_min} - 
				{if $user.fsemana_saida_min > 9 }
					{$user.fsemana_saida}:{$user.fsemana_saida_min}</li>
				{elseif $user.fsemana_saida_min == null}
					{$user.fsemana_saida}:00</li>				
				{else}
					{$user.fsemana_saida}:0{$user.fsemana_saida_min}</li>
				{/if}
			{/if}
		{/if}
	{/if}
  </ul>

{if $s_type == "admin" || $s_user == $user.email}
  <p>Tem a certeza? 
    <a class="options" href="delete_action.php?id={$user.email}">Sim</a>
    <a class="options" href="verconta.php?id={$user.email}">Não</a>
  </p>
{/if}

{include file='footer.tpl'}
