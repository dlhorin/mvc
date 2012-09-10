<html>
<head><title>{$title}</title></head>
<body>

<form id='myform' action = '{$myform_action}' method='{$myform_method}'>
    <input type='text' name='mytext' 
        {if !isset($myform_notsent)} value='{$myform_form.mytext}'{/if}
    />
    <input type='submit' value="Submit" name='{$myform_submit}'/>
</form>
{if !isset($myform_notsent)}
    {$myform_form.mytext}
{/if}

</body>
</html>
