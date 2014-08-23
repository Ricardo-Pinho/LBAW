{* edit user template *}
{include file='header.tpl'}

  <h1>Editar Casa - {$casa.nome}</h1>

  <form action="edit_action.php" method="post">
    <input type="hidden" name="id" value="{$casa.id}" />
    <div class="border">
	<p><a class="navtext">Nome:</a></p>
    <p class="marginbottom"><input type="text" size="36" maxlength="15" name="nome" id="nome" value="{$casa.nome}" required="required" /></p>
    <span class="error">{$s_errors.nome}</span>
	
	<p><a class="navtext">Morada:</a></p>
    <p class="marginbottom"><input type="text" size="36" name="morada" id="morada" value="{$casa.morada}" /></p>
    <span class="error">{$s_errors.morada}</span>
    </div>
    <p><input type="submit" class="options" value="Editar" /></p>
  </form>
    <a class="options" href="vercasa.php?id={$casa.id}">Voltar</a>

{include file='footer.tpl'}
