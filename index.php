<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /student-management/app/views/dashboard/index.php");
    exit;
}

header("Location: /student-management/app/views/auth/login.php");
exit;