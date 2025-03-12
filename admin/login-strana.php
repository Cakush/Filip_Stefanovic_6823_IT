<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>

<div class="container">
    <h1>Login stranica</h1>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="admin-modules/login.php" method="post">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Unesite username</label>
                <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-group">
                <label for="">Unesite password</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="dugme">
                <button class="btn btn-primary">Log in</button>
                <a href="../index.php">nazad na pocentu stranicu</a>
            </div>
        </div>
    </form>
</div>

<style>
    .dugme {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>