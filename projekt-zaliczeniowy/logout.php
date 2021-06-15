<?php
    session_start();

    session_unset();
     
    header('Location: starting-page.php');
?>