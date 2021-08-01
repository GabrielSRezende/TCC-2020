<?php
 
require_once 'init.php';
 
if (!isLoggedIn())
{
    header('Location: ../Login_v13/login.html');
}
?>