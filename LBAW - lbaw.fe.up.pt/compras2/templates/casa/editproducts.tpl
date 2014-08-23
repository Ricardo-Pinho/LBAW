{include file='header.tpl'}
 
	<script type="text/javascript" src="../../js/validations.js"></script>
	
  <h1>Editar {$produto.nome} de {$casa.nome}</h1>
 {if {$isowner}==true || $s_type == "admin"}
	<div class="border">
	<form action="../casa/editproducts_action.php" onsubmit="return validateQuantidades(this);" method="post">
	<input type="hidden" name="id" value="{$produto.id}" />
	<input type="hidden" name="casaid" value="{$casa.id}" />
	
	<p class="marginbottom"><a class="navtext">Quantidade Minima:</a><input type="text" size="4" name="qminima" id="qminima" value="{$produto.qminima}" required="required"/><a class="reginfo">{$produto.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	
	<p class="marginbottom"><a class="navtext">Quantidade Maxima:</a><input type="text" size="4" name="qmaxima" id="qmaxima" value="{$produto.qmaxima}" required="required"/><a class="reginfo">{$produto.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	
	<p class="marginbottom"><a class="navtext">Quantidade Disponivel:</a><input type="text" size="4" name="qdisponivel" id="qdisponivel" value="{$produto.qdisponivel}" required="required"/><a class="reginfo">{$produto.unidade_medida}</a></p>
	<span class="error">{$s_errors.uname}</span>
	<input type="submit"  class="options" value="Editar" />
      </form>
    </div> 
  
{else}
 			<img class="center" src="../../img/sadface.gif" alt="Sadface" width="300" height="300"/>
  			<p class="center">Voce nao e o dono da casa!</p>
{/if}
{include file='footer.tpl'}