{* edit user template *}
{include file='header.tpl'}

<script type="text/javascript" src="../../js/validations.js"></script>

  <h1>Editar Receita - {$receita.nome}</h1>

<form action="edit_action.php" onsubmit="return validateReceita2(this);" method="post">
    <div class="border">
	<input type="hidden" name="id" id="id" value="{$receita.id}" />
	<p><a class="navtext">Nome:</a></p>
    <p class="marginbottom"><input type="text" size="50" maxlength="32" name="nome" id="nome" value="{$receita.nome}" required="required"/></p>
    </div>
	<div class="border">
	<p><a class="navtext">Tempo de preparo(min):</a></p>
    <p class="marginbottom"><input type="text" size="10" maxlength="3" name="tempo_preparo" id="tempo_preparo" value="{$receita.tempo_preparo}" required="required"/></p>
    </div>
	<div class="border">
	<p><a class="navtext">Quantidade de pessoas:</a></p>
    <p class="marginbottom"><input type="text" size="10" name="quant" id="qpessoas" value="{$receita.qpessoas}" required="required"/></p>
    </div>
	<div class="border">
	<p><a class="navtext">Modo de preparo:</a></p>
    <p class="marginbottom"><textarea rows="5" cols="40" maxlength="512" name="preparo" id="preparo" required="required">{$receita.preparo}</textarea></p>
    </div>
	<div class="border">
	<p><a class="navtext">Tipo:</a></p>
    <p class="marginbottom"><input type="text" size="30" maxlength="32" name="tipo" id="tipo" value="{$receita.tipo}" required="required"/></p>
    </div>
	<div class="border">
	<p><a class="navtext">Privado:</a> 
		<select name="privado" id="privado" size="1">
		{if {$receita.privado}==TRUE}
			<option value="TRUE" selected="selected">Sim</option>
			<option value="FALSE">Nao</option>
		{else}
			<option value="TRUE">Sim</option>
			<option value="FALSE" selected="selected">Nao</option>
		{/if}
		</select>
	</p>
	</div>
	
	<p><input type="submit" class="options" value="Editar" /></p>
  </form>
    <a class="options" href="verreceita.php?id={$receita.id}">Voltar</a>

  
{include file='footer.tpl'}
