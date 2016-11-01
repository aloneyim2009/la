<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['iduser']);
unset($_SESSION['idsubdepart']);
unset($_SESSION['permiss']);
unset($_SESSION['idboss']);
session_destroy();

header('Location:index.html');
die();

 ?>
