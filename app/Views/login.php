<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container my-5">
        <h1>Form Tambah Dosen</h2>
        <?= \Config\Services::validation()->listErrors(); ?>
    
        <form action="/user/login_verify" method="POST">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <a href="register">register</a>
</body>
</html>