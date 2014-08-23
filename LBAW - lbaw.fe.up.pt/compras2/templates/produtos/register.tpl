    {include file='header.tpl'}
	
	<!-- register form -->
	{if {$tipo}=="produto"}
      <h1 class="center">Inserir Produto</h1>
	  <form action="../produtos/register_action.php?type=produto" method="post">
	{else}
	  <h1 class="center">Inserir Ingrediente</h1>
	  <form action="../produtos/register_action.php?type=ingrediente" method="post">
	{/if}
        <div class="border">
			<p><a class="navtext">Nome:</a></p>
			<p class="marginbottom"><input type="text" size="18" maxlength="32" name="nome" id="nome" required="required"/>
		</div>
		<div class="border">
			<p><a class="navtext">Unidade de Medida:</a></p>
			<p class="marginbottom"><input type="unidade_medida" size="16" maxlength="16" name="unidade_medida" id="unidade_medida"/>
		</div>
		{if {$tipo}=="ingrediente"}
		<div class="border">
			<p><a class="navtext">Tipo:</a></p>
			<p class="marginbottom"><input type="tipo" size="36" maxlength="16" name="tipo" id="tipo"/>
		</div>
		{/if}
        <input type="submit"  class="options" value="Inserir" />
      </form>
	  
	  <p><a class="options" href="../main/index.php">Voltar para a Pagina Inicial<a/></p>
    </div>
	{include file='footer.tpl'}
	
	