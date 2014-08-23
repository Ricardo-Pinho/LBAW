{* edit user template *}
{include file='header.tpl'}

	<script type="text/javascript" src="../../js/validations.js"></script>
  <h1>Editar Conta - {$user.nome}</h1>

  <form action="edit_action.php" onsubmit="return validateEditUser({$user.gestor}, this);" method="post">
    <input type="hidden" name="email" value="{$user.email}" />
    <div class="border">
	<p><a class="navtext">Name:</a></p>
    <p class="marginbottom"><input type="text" size="40" maxlength="32" name="nome" id="nome" value="{$user.nome}" required="required" /></p>
    <span class="error">{$s_errors.nome}</span>
    </div>
	{if $s_type == "admin"}	
	<div class="border">
	<p><a class="navtext">Gestor:</a></p>
    <p class="marginbottom"><select name="gestor" size="1">
			{if $user.gestor==TRUE}
			<option value="1" selected="selected">Sim</option>
			<option value="2">Nao</option>
			{else}
			<option value="1">Sim</option>
			<option value="2" selected="selected">Nao</option>
			{/if}
		   </select></p>
    <span class="error">{$s_errors.gestor}</span>
    </div>
	<div class="border">
	<p><a class="navtext">Hora de Entrada na Semana:</a></p>
    <p class="marginbottom"><input type="text" size="2" maxlength="2" name="semana_entrada" id="semana_entrada" value="{$user.semana_entrada}"/>:
		<span class="error">{$s_errors.semana_entrada}</span>
	<input type="text" size="2" maxlength="2" name="semana_entrada_min" id="semana_entrada_min" value="{$user.semana_entrada_min}"/></p>
		<span class="error">{$s_errors.semana_entrada_min}</span>
    </div>
	<div class="border">
	<p><a class="navtext">Hora de Saida na Semana:</a></p>
    <p class="marginbottom"><input type="text" size="2" maxlength="2" name="semana_saida" id="semana_saida" value="{$user.semana_saida}"/>:
		<span class="error">{$s_errors.semana_saida}</span>
	<input type="text" size="2" maxlength="2" name="semana_saida_min" id="semana_saida_min" value="{$user.semana_saida_min}"/></p>
		<span class="error">{$s_errors.semana_saida_min}</span>
    </div>
	<div class="border">
	<p><a class="navtext">Hora de Entrada no Fim de Semana:</a></p>
    <p class="marginbottom"><input type="text" size="2" maxlength="2" name="fsemana_entrada" id="fsemana_entrada" value="{$user.fsemana_entrada}"/>:
		<span class="error">{$s_errors.fsemana_entrada}</span>
	<input type="text" size="2" maxlength="2" name="fsemana_entrada_min" id="fsemana_entrada_min" value="{$user.fsemana_entrada_min}"/></p>
		<span class="error">{$s_errors.fsemana_entrada_min}</span>
    </div>
	<div class="border">
	<p><a class="navtext">Hora de Saida no Fim de Semana:</a></p>
    <p class="marginbottom"><input type="text" size="2" maxlength="2" name="fsemana_saida" id="fsemana_saida" value="{$user.fsemana_saida}"/>:
		<span class="error">{$s_errors.fsemana_saida}</span>
	<input type="text" size="2" maxlength="2" name="fsemana_saida_min" id="fsemana_saida_min" value="{$user.fsemana_saida_min}"/></p>
		<span class="error">{$s_errors.fsemana_saida_min}</span>
    </div>
		{/if}
    <p><input type="submit" class="options" value="Editar" /></p>
  </form>
	<a class="options" href="verconta.php?id={$user.email}">Voltar</a>

{include file='footer.tpl'}
