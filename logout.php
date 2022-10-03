<?php
session_start();
unset($_SESSION['usuario']);
//session_destroy(); //encerrar todas as sessões
header('Location: index.php');
exit();