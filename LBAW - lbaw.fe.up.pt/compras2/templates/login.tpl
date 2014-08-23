    <!-- login form -->
{if $s_user}
    <div id="login">
      <div class="paddingleft">
		  <div class="ltitle" >Nome: {$s_name} </div>
		  <div class="ltitle" >Tipo: {$s_type}</div>
		  
		  <p><a class="options" href="../user/verconta.php?id={$s_user}">Ver Conta</a></p>
		  <p><a class="options" href="../casa/vercasas.php?id={$s_id}">Ver Casas</a></p>
		  
		  <form action="../main/logout_action.php" method="post">
		  <input type="submit"  class="options" value="Logout" />
		  </form>
	  </div>
    </div>
{else}
    <div id="login">
      <div class="title">Login</div>
      <div class="paddingleft">
		  <form action="../main/login_action.php" method="post">
			<label for="email">Email:</label>
			<input type="text" size="18" name="email" id="email" required="required"/>
			<label for="password">Password:</label>
			<input type="password" size="18" name="password" id="password" required="required"/>
			<input type="submit" class="options" value="Login" />
		  </form>
		  <form action="../user/register.php" method="post">
		  <input type="submit" class="options" value="Registar" />
		  </form>
	  </div>
    </div>
{/if}
