{$form.javascript}
<script src="{$OOO_APP_WEB_JS}/jsfunction.js">
</script>
<div id="mainbody">
<form {$form.attributes}>
    <table width="75%" border="1" class="datatable">
        <tr> 
            <th colspan="4"><{$class_name}> List</th>
        </tr>
        <tr> 
            <th width="5%">{$form.allcheckbox.html}</td>
            <{section name=rows loop=$data}>
            <th width=""><{$data[rows].form_label}></td>
            <{/section}>            
        </tr>
        {section name=rows loop=$data } 
        <tr class="{cycle values="r1,r1,r2,r2"}" onmouseover="this.className='rhover'" onmouseout="this.className='{cycle}'" onclick=""> 
            <td>{$form.delete.html[$smarty.section.rows.index]}</td>
            <td><a href="index.php?op=edit<{$table_name}>&<{$table_name}>_id={$data[rows].id}">{$data[rows].<{$data[0].name}>}</a></td>
            <{section name=rows loop=$data start=1}>
            <td>{$data[rows].<{$data[rows].name}>}</td>
            <{/section}>            
        </tr>
        {/section} 
        <tr> 
            <td colspan="4"><div align="right">{$form.newbutton.html}&nbsp;{$form.deletebutton.html}&nbsp;{$form.backbutton.html}</div></td>
        </tr>
    </table>
	{$form.op.html}
</form>
<div class="clear"></div>
</div>   
