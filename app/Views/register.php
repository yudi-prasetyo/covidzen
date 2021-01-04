<!DOCTYPE html>
<html lang="en">
<head>
    <title>Covidzen - Covid Care for Netizen</title>
    <link rel="icon" href="img/favicon.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap & css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">

    <!--script-->
    <!--<script type="text/javascript" language="javascript" src="login-register.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F23867;">
    <div class="login">
        <img src="img/Covidzen white 2.png">
        <h1><strong>Sign up to Covidzen</strong></h1>

        <?= session()->getFlashdata('msg');; ?>
    
        <form action="/user/save" method="POST">
            <?= csrf_field() ?>

            <label>Nama</label><br/>
            <input type="text" name="name" placeholder="Nama" required><br/>
            <label>Username</label><br/>
            <input type="text" name="username" placeholder="Username" required><br/>
            <label>Password</label><br/>
            <input type="password" name="password" placeholder="Password" required><br/>
            <label>Confirm Password</label><br/>
            <input type="password" name="password2" placeholder="Password2" required><br/>
            <label>Jenis Kelamin</label><br/>
            <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" required>
            <label for="laki-laki">Laki-laki</label>
            <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan">
            <label for="perempuan">Perempuan</label><br>
            <input type="submit" value="Register" name="register">
        </form>
        <p>Already have an account? <a href="/login">Login</a></p>
    </div>
</body>
</html>