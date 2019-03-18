<?php
session_start ();
if (!isset($_SERVER['isAuthenticated']))
    {
        header("Location:login.php");
    }
else
    {
        echo "Hello".$_SERVER["login"];
    }
?>