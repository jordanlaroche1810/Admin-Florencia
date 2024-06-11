<?php
    ob_start();
    if($_SESSION['access'] = "granted"){
        header('Location: ../../florencia/index');
        ob_end_flush(); 
    }
?>