﻿  <!-- search bar -->
  <div id="searchbar">
	<form method="get" action="../pesquisa/search.php">
		   <input type="hidden" name="dff_view" value="grid">
		   Pesquisar:<input type="text" name="pesquisa" size="20" maxlength="50" id="pesquisa" required="required"> Tipo: 
		   <select name="tipo" id="tipo" size="1">
			 <option value="101">Casas
			 <option value="102">Ingredientes
			 <option value="103">Nao Alimenticios
			 <option value="104">Utilizadores
			 <option value="105">Receitas
			 <option value="106">Lojas
		   </select>
		   <input type="submit"  class="options" value="Ok">
	</form>
</div>