<?php
    session_start();
    session_destroy();
    header("Location:loginCopy.php");
?>