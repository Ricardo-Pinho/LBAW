    {include file='header.tpl'}
	
	<script type="text/javascript" src="../../js/validations.js"></script>
	<!-- register form -->

      <h1 class="center">Registar</h1>
	  
      <form action="../user/register_action.php" onsubmit="return validateUserData(this);" method="post">
        <div class="border">
			<p><a class="navtext">Email:</a></p>
			<p class="marginbottom"><input type="text" size="18" maxlength="64" name="email" id="email" required="required"/>
			<a class="reginfo">(64 caracteres ou menos) Este Email Sera Usado para o Login</a></p>
			<span class="error">{$s_errors.uemail}</span>
		</div>
		<div class="border">
			<p><a class="navtext">Password:</a></p>
			<p class="marginbottom"><input type="password" size="18" maxlength="32" name="password" id="password" required="required"/>
			<a class="reginfo">(32 caracteres ou menos)</a></p>
			<span class="error">{$s_errors.upass}</span>
		</div>
		<div class="border">
			<p><a class="navtext">Nome:</a></p>
			<p class="marginbottom"><input type="text" size="18" maxlength="32" name="nome" id="nome" required="required"/>
			<a class="reginfo">(32 caracteres ou menos)</a></p>
			<span class="error">{$s_errors.uname}</span>
		</div>
			{if $s_type == "admin"}	
	<div class="border">
	<p><a class="navtext">Gestor:</a></p>
    <p class="marginbottom"><select name="gestor" id="gestor" size="1">
			<option value="1">Sim</option>
			<option value="2" selected="selected">Nao</option>
		   </select></p>
    <span class="error">{$s_errors.gestor}</span>
    </div>
	<div class="border">
	<p><a class="navtext">Hora de Entrada na Semana:</a></p>
    <p class="marginbottom"><input type="text" size="2" maxlength="2" name="semana_entrada" id="semana_entrada" value="{$user.semana_entrada}"/>:
		    <span class="error">{$s_errors.semana_entrada}</span>
	<input type="text" size="2" maxlength="2" name="semana_entrada_min" id="semana_entrada_min" value="{$user.semana_entrada_min}"/>
		    <span class="error">{$s_errors.semana_entrada_min}</span>
	</p>
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
		<span class="error">{$s_errors.fsemana_saida}</span>
    </div>
		{/if}
        <input type="submit"  class="options" value="Registar" />
      </form>
	  
	  <p><a class="options" href="../main/index.php">Voltar para a Pagina Inicial<a/></p>
    </div>
	
	{include file='footer.tpl'}
	
	