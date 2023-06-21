<?php
session_start();
session_destroy();
header('Location: /projects/oline_furm/index.php');
?>