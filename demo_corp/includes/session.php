<?php
session_start();

    function logged_in()
    {
        return isset($_SESSION['id']);
        
    }

    function confirmar_logged_in()
    {
        if (!logged_in())
        {
            redireccionar("login.php");
        }
        
        
    }

?>
