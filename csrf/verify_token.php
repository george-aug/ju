<?php

if (! hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    header("Location: ../login.php?type=error&sms=csrf-mismatch");
    exit();
}