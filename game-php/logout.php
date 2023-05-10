<?php
require_once('functions.php');

unset($_SESSION['user']); //supprimé un element du tableau
session_destroy();

header ('Location: index.php');

?> 