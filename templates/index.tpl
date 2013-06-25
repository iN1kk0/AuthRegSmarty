{include file="header.tpl" title={$title}}
<form method="post" action="register.php"> 
    <div>
        <div>Login: <input type="text" name="login" id="login"></div>
        <div>Email: <input type="text" name="email" id="email"></div>
        <div>Password: <input type="password" name="password" id="password"></div>
        <div><input type="submit" name="submit" value="Go!"></div>
    </div>
</form>
{include file="footer.tpl"}