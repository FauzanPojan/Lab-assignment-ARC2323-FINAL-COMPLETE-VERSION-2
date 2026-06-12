<?php
// Simple XSS protection
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
session_start();
session_destroy();
header("Location: index.php");
exit();
?>