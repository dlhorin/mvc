<html>
<head><title>{$title}</title></head>
<body>

<form id='myform' action = '{$myform_action}' method='{$myform_method}'>
    Enter an email address:
    <input type='text' name='email' {if isset($myform_form)}{$myform_form.mytext}{/if} /><br/>
    {if isset($myform_errors)}{$myform_errors.email}{/if}<br/>
    <input type='submit' value="Submit" name='{$myform_submit}'/>
</form>
</body>
</html>
