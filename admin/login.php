<?php
session_start();
if ($_POST) {
  if ($_POST['user']=="admin" && $_POST['pass']=="admin") {
    $_SESSION['admin']=true;
    header("Location: dashboard.php");
  }
}
?>
<form method="post">
<input name="user" placeholder="Username">
<input name="pass" type="password" placeholder="Password">
<button>Login</button>
</form>
