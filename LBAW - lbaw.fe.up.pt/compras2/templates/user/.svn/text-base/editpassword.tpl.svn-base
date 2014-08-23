{* edit user password template *}
{include file='header.tpl'}
	<script type="text/javascript" src="../../js/validations.js"></script>
  <h1>Editar Password - {$user.nome}</h1>

  <form action="edit_action.php?password=true" onsubmit="return validateEditPassword(this);" method="post">
    <input type="hidden" name="email" value="{$user.email}" />
    <div class="border">
	<p><a class="navtext">Password Antiga:</a></p>
    <p class="marginbottom"><input type="password" size="10" maxlength="32" name="oldpassword" id="oldpassword" required="required"/></p>
    <span class="error">{$s_errors.password}</span>
    </div>
	<div class="border">
	<p><a class="navtext">Password Nova:</a></p>
    <p class="marginbottom"><input type="password" size="10" maxlength="32" name="newpassword1" id="newpassword1" required="required"/></p>
    </div>
	<div class="border">
	<p><a class="navtext">Confirmar Password Nova:</a></p>
    <p class="marginbottom"><input type="password" size="10" maxlength="32" name="newpassword2" id="newpassword2" required="required"/></p>
    </div>
    <p><input type="submit" class="options" value="Editar" /></p>
  </form>
  
	<a class="options" href="verconta.php?id={$user.email}">Voltar</a>

{include file='footer.tpl'}