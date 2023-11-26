<?php
session_start();
session_unset();
session_destroy();


setcookie(session_name(), '', time() - 3600, '/');
setcookie("PHPSESSID", "", time() - 3600, '/');

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Location: ../../");
?>
