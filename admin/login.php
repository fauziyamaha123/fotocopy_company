<?php
session_start();

if ($_POST) {
  // Username & Pass statis (Ganti sesuai kebutuhan)
  if ($_POST['user'] == 'admin' && $_POST['pass'] == 'admin') {
    $_SESSION['admin'] = true;
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username atau Password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | FotocopyCo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/admin.css">
</head>
<body class="login-page">

<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <div class="brand-logo">
                <i class="fa-solid fa-print"></i>
            </div>
            <h2>Admin Panel</h2>
            <p>Silakan masuk untuk mengelola toko</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i> <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="post" class="login-form">
            <div class="input-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-user"></i>
                    <input name="user" placeholder="Masukkan username" required autocomplete="off">
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input name="pass" type="password" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn-login">
                Masuk Sekarang <i class="fa-solid fa-right-to-bracket"></i>
            </button>
        </form>
        
        <div class="login-footer">
            &copy; 2026 FotocopyCo. All rights reserved.
        </div>
    </div>
</div>

</body>
</html>