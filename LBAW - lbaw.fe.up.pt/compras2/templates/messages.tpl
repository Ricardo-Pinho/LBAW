  <!-- warning messages -->
  <div id="messages">
{foreach from=$s_messages item=message}
   <noscript>
		<span class="message">{$message}</span>
   </noscript>
    {*<span class="message">{$message}</span>*}
{literal}
<script language="Javascript" type="text/javascript">
        alert('{/literal}{$message}{literal}');
</script>
{/literal}
{/foreach}
  </div>
