{include file='header.tpl'}

  <h1>Gerar Lista de Compras</h1>
  <h1>Ao GERAR IRA GASTAR OS INGREDIENTES DA CASA</h1>

  <form action="../casa/shoplist_action.php" method="post">
	<input type="hidden" name="id" value="{$casa.id}" />
	<a class="navtext">Receitas:</a>
	</p>
	<div class="border">
		<table id="lista_receitas">
		{foreach from=$receitas item=receita}
			<tr>
				<td><input type="checkbox" name="chk{$receita.id}"/></td>
				<td><a class="navtext">Receita:</a>
					<a name="{$receita.id}" size="1">{$receita.nome} ({$receita.qpessoas} Pessoa(s))</a>
				</td>
				<td>
					<a class="navtext">Quantidade:</a>
					<a class="marginbottom"><input type="text" size="10" name="quant{$receita.id}" value="0" required="required"/></a>
				</td>
			</tr>
			{/foreach}
		</table>
		<p><input type="checkbox" name="naoalimenticios"/>
		<a class="navtext">Mostrar Produtos Nao Alimenticios</a></p>
	
	<p><input type="checkbox" name="chkstore"/>
	<a class="navtext">Loja:</a>
	<select name="loja" id="loja" size="1">
	{foreach from=$lojas item=loja}
		<option value={$loja.id}>{$loja.nome}</option>
	{/foreach}
	</select>(Filtra a lista de compras pelo que esta disponivel nesta loja)</p>
	
	<input type="submit" class="options" value="Gerar Lista" /> |
	<a class="options" href="vercasa.php?id={$casa.id}">Voltar</a>
  </form>

{include file='footer.tpl'}