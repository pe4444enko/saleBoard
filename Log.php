<h1>Login</h1>
<form method="post">
    <input type="email" name="login"/>
    <input type="password" name="password"/>    
    <input type="submit" name="submit"/>
</form>

<?php
if ($_SERVER["REQUSET_METHOD"]=="POST" )
    {
        if($_POST ["login"]=="test@gmail.com"&& $_POST["password"]==12345679)
        {
            
        }
    }
?>