
<?php
session_start();
include('../assets/include/bdd.php');




session_destroy();



header("Location:index.php?disc_err=deconnecté")

?>