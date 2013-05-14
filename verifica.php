<?php


 session_start();
 

if (empty($_SESSION['nome']) || empty($_SESSION['login']))
{
    header("Location:login.php");
}
?>