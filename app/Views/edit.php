<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container my-5">
        <h1>Edit</h2>
        <?= \Config\Services::validation()->listErrors(); ?>
    
        <form action="/user/update" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="exampleFormControlInput1">Foto Profil</label>
                <input type="file" name="profile-pic"/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Asal Provinsi</label>
                <input type="text" class="form-control" name="asal_provinsi"  value="<?= $user['asal_provinsi'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin"  value="<?= $user['jenis_kelamin'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <a href="login">Login</a>
</body>
</html>