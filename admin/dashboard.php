<?php
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
?>
<h2>Dashboard Admin</h2>
<a href="login.php">Logout</a>
