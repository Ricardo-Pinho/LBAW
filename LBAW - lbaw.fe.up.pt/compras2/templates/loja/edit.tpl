{* edit user template *}
{include file='header.tpl'}


  <h1>Editar Loja - {$loja.nome}</h1>

  <form action="edit_action.php" method="post">
    <input type="hidden" name="id" value="{$loja.id}" />
    <div class="border">
	<p><a class="navtext">Nome:</a></p>
    <p class="marginbottom"><input type="text" size="36" maxlength="32" name="nome" id="nome" value="{$loja.nome}" required="required" /></p>
    <span class="error">{$s_errors.nome}</span>
	
	<p><a class="navtext">Contacto:</a></p>
    <p class="marginbottom"><input type="text" size="16" maxlength="9" name="contacto" id="contacto" value="{$loja.contacto}" /></p>
    <span class="error">{$s_errors.contacto}</span>
    </div>
    <p><input type="submit" class="options" value="Editar" /></p>
  </form>
    <a class="options" href="verloja.php?id={$loja.id}">Voltar</a>

  
{include file='footer.tpl'}
