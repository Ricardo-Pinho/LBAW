{* header template with the main logo and stuff *}
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8" />
  <title>Lista de Compras Inteligente</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../../css/print.css" media="print" />
  <script type="text/javascript" src="../../js/help.js"></script>
{* additional CSS for this page only *}
{if isset($css)}
  {$css}
{/if}
{* external JS for this page only *}
{*{if isset($js)}
  {$js}
{/if}*}
</head>

<body>
  <!-- header tag -->
    <noscript>
	<p>Javascript is not currently enabled on your browser. If you can enable it, your input will be checked as you enter it, aswell as receiving error messages (on most browsers, at least). You may find this helpful. </p>
  </noscript>
  <header>
  
{include file="messages.tpl"}
{include file="errors.tpl"}

{include file="login.tpl"}
  <div id="theader">
	  <div id="headpage">
		  <p id="titleheader" class="center"><a href="../../">Lista de Compras Inteligente</a></p>
		  <p id ="slogan" class="center">Uma lista a seu gosto para si</p>
	  </div>
	  {include file="searchbar.tpl"}
	  <a class="helpline" onclick="javascript:openpopup()">Ajuda</a>
  </div>
  </header>
  
<!-- nav tag -->
<div id="nav">
  
	{include file="produtos.tpl"}
	{include file="utilizadores.tpl"}
	{include file='casas.tpl'}
	{include file="lojas.tpl"}
	{include file='Tops.tpl'}
	{include file="receitas.tpl"}
</div> <!-- nav content -->
	

<!-- page content  -->
  <div id="content">
		{* uncomment to show the debug console *}
		{* {debug} *}
