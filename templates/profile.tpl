{include file="header.tpl" title={$title}}
{literal}
    <script>
        jQuery(function(){
           $('#edit').click(function(){
               $('#form').toggle();
           });
        });
    </script>
{/literal}
<a id="edit" href="#">Edit login</a><br/>
<div id="form" style="display:none;">
    <form method="post" action="profile.php"> 
        <div>
            <div>Login: <input type="text" name="login" id="login"></div>
            <div><input type="submit" name="submit" value="Go!"></div>
        </div>
    </form>
</div>
<a href="/logout.php">Exit</a>
{include file="footer.tpl"}