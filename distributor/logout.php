<?php
session_start();

session_destroy();

echo '<script type="text/javascript">window.location="../index.php" </script>';
date_default_timezone_set('Asia/Kolkata');
exit;
?>