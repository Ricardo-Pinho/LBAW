    {include file='header.tpl'}
	
	<!-- register form -->

      <h1 class="center">Inserir Casa</h1>
	  
      <form action="../casa/register_action.php" method="post">
        <div class="border">
			<p><a class="navtext">Nome:</a></p>
			<p class="marginbottom"><input type="text" size="18" maxlength="15" name="nome" id="nome" required="required"/>
		</div>
		<div class="border">
			<p><a class="navtext">Morada:</a></p>
			<p class="marginbottom"><input type="morada" size="64" name="morada" id="morada"/>
		</div>
        <input type="submit"  class="options" value="Inserir" />
      </form>
	  
	  <p><a class="options" href="../main/index.php">Voltar para a Pagina Inicial<a/></p>
    </div>
	
	{include file='footer.tpl'}
	
	