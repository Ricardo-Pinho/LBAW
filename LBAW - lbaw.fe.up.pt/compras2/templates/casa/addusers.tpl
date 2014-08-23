{* edit user template *}
{include file='header.tpl'}

  <h1>Utilizadores da Casa - {$casa.nome}</h1>

<div class="border">
	<p class="navtext">Utilizadores Desta Casa:<p>
	<ul class="listul">
		{foreach from=$users item=user}
		<li class="listli"><strong>{$user.nome}</strong> <a class="options" href="edit_action.php?id={$casa.id}&userid={$user.id}&remuser=true">Remover</a></li>
		{/foreach}
	</ul>
</div>
  
  <form action="edit_action.php?adduser=true" method="post">
    <input type="hidden" name="id" value="{$casa.id}" />
    <div class="border">
	<p><a class="navtext">Adicionar Utilizador(Escreva o email):</a></p>
    <p class="marginbottom"><input type="text" size="36" name="mail" id="mail" required="required" /></p>
    <span class="error">{$s_errors.mail}</span>
    </div>
    <p><input type="submit" class="options" value="Adicionar" /></p>
  </form>
    <a class="options" href="vercasa.php?id={$casa.id}">Voltar</a>

{include file='footer.tpl'}