<?php
 
require_once 'init.php';
 
if (!isLoggedIn())
{
    header('Location: ../login/login.php');
}
?>