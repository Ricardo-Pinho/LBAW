{* edit user template *}
{include file='header.tpl'}

{if {$produto.id}!=null}
  <h1>Editar Produto - {$produto.nome}</h1>

  <form action="edit_action.php?type=produto" method="post">
    <input type="hidden" name="id" value="{$produto.id}" />
    <div class="border">
	<p><a class="navtext">Nome:</a></p>
    <p class="marginbottom"><input type="text" size="36" maxlength="32" name="nome" id="nome" value="{$produto.nome}" required="required" /></p>
    <span class="error">{$s_errors.nome}</span>
	
	<p><a class="navtext">Unidade de Medida:</a></p>
    <p class="marginbottom"><input type="text" size="16" maxlength="16" name="unidade_medida" id="unidade_medida" value="{$produto.unidade_medida}" /></p>
    <span class="error">{$s_errors.unidade_medida}</span>
    </div>
    <p><input type="submit" class="options" value="Editar" /></p>
  </form>
    <a class="options" href="verproduto.php?id={$produto.id}">Voltar</a>

 {else}
  <h1>Editar Ingrediente - {$ingrediente.nome}</h1>

  <form action="edit_action.php?type=ingrediente" method="post">
    <input type="hidden" name="id" value="{$ingrediente.id}" />
    <div class="border">
	<p><a class="navtext">Nome:</a></p>
    <p class="marginbottom"><input type="text" size="36" maxlength="32" name="nome" id="nome" value="{$ingrediente.nome}" required="required" /></p>
    <span class="error">{$s_errors.nome}</span>
	
	<p><a class="navtext">Unidade de Medida:</a></p>
    <p class="marginbottom"><input type="text" size="16" maxlength="16" name="unidade_medida" id="unidade_medida" value="{$ingrediente.unidade_medida}" /></p>
    <span class="error">{$s_errors.unidade_medida}</span>
	
	<p><a class="navtext">Tipo:</a></p>
    <p class="marginbottom"><input type="text" size="36" maxlength="16" name="tipo" id="tipo" value="{$ingrediente.tipo}" /></p>
    <span class="error">{$s_errors.tipo}</span>
    </div>
    <p><input type="submit" class="options" value="Editar" /></p>
  </form>
    <a class="options" href="veringrediente.php?id={$ingrediente.id}">Voltar</a>
 {/if} 
  
{include file='footer.tpl'}
