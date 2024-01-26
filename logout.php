<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page (or any other page)
header("Location: login.php");
exit; // Ensure that no more code is executed after the redirection
?>
