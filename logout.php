<?php
session_start();
session_destroy(); //encerrar todas as sessões
header('Location: index.php');
exit();