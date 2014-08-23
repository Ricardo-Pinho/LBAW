  <!-- error messages -->
  <div id="errors">
{if $s_errors.generic}
{foreach from=$s_errors.generic item=error}
   <noscript>
		<span class="error">{$error}</span>
   </noscript>
	{*<span class="error">{$error}</span>*}
{literal}
<script language="Javascript" type="text/javascript">
        alert('{/literal}{$error}{literal}');
</script>
{/literal}
{/foreach}
{/if}
  </div>