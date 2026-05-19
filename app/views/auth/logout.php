<?php
session_start();
session_destroy();

header("Location: /student-management/app/views/auth/login.php");
exit;