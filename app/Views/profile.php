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
    <link rel="stylesheet" href="<?= base_url() ?>/style.css" type="text/css">

    <!--script-->
    <!--<script type="text/javascript" language="javascript" src="login-register.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-profile">
                <img src="<?= base_url() ?>/img/def.png">
                <p><?= $user['name'] ?></p>
            </div>
            <div class="sidebar-menu">
                <div class="sidebar-menu-btn">
                    <img src="<?= base_url() ?>/img/home.png">
                    <a href="/">Home</a>
                </div>
                <div class="sidebar-menu-btn">
                    <img src="<?= base_url() ?>/img/location.png">
                    <a href="/status">Track</a>
                </div>
                <div class="sidebar-menu-btn">
                    <img src="<?= base_url() ?>/img/profile.png">
                    <a href="#">Profile</a>
                </div>
                <div class="sidebar-menu-btn">
                    <img src="<?= base_url() ?>/img/logout.png">
                    <a href="/logout">Logout</a>
                </div>
            </div>
            <img src="<?= base_url() ?>/img/Covidzen white 2.png">
        </div>
        <div class="home">
            <img src="<?= base_url() ?>/img/Covidzen.png" style="margin: auto;"><br/><br/>
            <div class="content">
                <img class="img" src="<?= base_url() ?>/img/def.png">
                <h1><strong><?= $user['name'] ?></strong></h1>
                <h5>Username: <?= $user['username'] ?> - Asal Provinsi: <?= $user['asal_provinsi'] ?> - Jenis Kelamin: <?= $user['jenis_kelamin'] ?></h5>
                <a href="/edit/<?= $user['id'] ?>" class="btn-pink">Edit Profil</a>
                
            </div>
        </div>
        <footer class="footer">
            <a href="/"><img src="<?= base_url() ?>/img/home.png"></a>
            <a href="/status"><img src="<?= base_url() ?>/img/location.png"></a>
            <a href="/profile"><img src="<?= base_url() ?>/img/profile.png"></a>
        </footer>
    </div>
</body>
</html>