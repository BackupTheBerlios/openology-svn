{$form.javascript}
<div id="mainbody">
<form {$form.attributes}>
    <table width="75%" border="1" class="datatable">
      <tr> 
        <th colspan="2">{$function_title}</th>
      </tr>
      <{section name=rows loop=$data start=1}>
      <tr> 
        <td width="5%"><{$data[rows].form_label}></td>
        <td width="14%" align="left">{$data.<{$data[rows].name}>}</td>
      </tr>
      <{/section}>      
      <tr> 
        <td colspan="2"> 
          <div align="right">&nbsp;{$form.backbutton.html}</div>
        </td>
      </tr>
    </table>	
</form>
<div class="clear"></div>
</div>  