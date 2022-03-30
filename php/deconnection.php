<?php 
session_start();
include('config.php');  
    session_destroy();

    

    header("Location:index.php?disc_err=deconnecté")
