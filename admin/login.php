<?php
session_start();

if ($_POST) {
  if ($_POST['user'] == 'admin' && $_POST['pass'] == 'admin') {
    $_SESSION['admin'] = true;
    header("Location: dashboard.php");
    exit;
  }
}
?>

<form method="post">
  <h2>Login Admin</h2>
  <input name="user" placeholder="Username">
  <input name="pass" type="password" placeholder="Password">
  <button>Login</button>
</form>
