{$form.javascript}
<div id="mainbody">
<form {$form.attributes}>
    <table width="75%" border="1" class="datatable">
      <tr> 
        <th colspan="2">{$function_title}</th>
      </tr>
      <{section name=rows loop=$data start=1}>
      <tr> 
        <td width="5%">{$form.<{$data[rows].name}>.label}</td>
        <td width="14%" align="left">{$form.<{$data[rows].name}>.html}</td>
      </tr>
      <{/section}>      
      <tr> 
        <td colspan="2"> 
          <div align="right">{$form.submitbutton.html}&nbsp;{$form.resetbutton.html}&nbsp;{$form.backbutton.html}</div>
        </td>
      </tr>
    </table>
	{$form.op.html}
    {$form.<{$table_name}>_id.html}
</form>
<div class="clear"></div>
</div>   