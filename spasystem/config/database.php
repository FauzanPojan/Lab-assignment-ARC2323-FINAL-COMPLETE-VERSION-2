<?php

define('DB_HOST', 'mysql-f106dc5-fauzan9264-00d7.e.aivencloud.com');
define('DB_USER', 'avnadmin');
define('DB_PASS', 'AVNS_7jk_sfNS3fk-DBiH5ZY');
define('DB_NAME', 'defaultdb'); 
define('DB_PORT', 24075);

// Initialize mysqli for SSL connection
$conn = mysqli_init();

if (!$conn) {
    die("mysqli_init failed");
}

// Set the CA certificate location (pointing to the ca.pem in the same directory)
$conn->ssl_set(NULL, NULL, __DIR__ . '/ca.pem', NULL, NULL);

// Connect to the Aiven remote database
$real_connect = $conn->real_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT, NULL, MYSQLI_CLIENT_SSL);

if (!$real_connect) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function generateBookingNo() {
    return 'BK-' . date('Ymd') . '-' . rand(100, 999);
}
?>