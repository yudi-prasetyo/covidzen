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
                    <a href="/profile<?= $user['id'] ?>">Profile</a>
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
                <?= \Config\Services::validation()->listErrors(); ?>
                <form action="/user/update" method="POST">
                    <?= csrf_field() ?>
        
                    <label>Nama</label><br/>
                    <input type="text" name="name" value="<?= $user['name'] ?>"><br/>
                    <label>Username</label><br/>
                    <input type="text" name="username" value="<?= $user['username'] ?>"><br/>
                    <label>Asal Provinsi</label><br/>
                    <input type="text" name="asal_provinsi" value="<?= $user['asal_provinsi'] ?>"><br/>
                    <label>Jenis Kelamin</label><br/>
                    <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki"
                    <?php if ($user['jenis_kelamin'] === 'laki-laki'): ?>
                        <?= " checked" ?>
                    <?php endif; ?>>
                    <label for="laki-laki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan"
                    <?php if ($user['jenis_kelamin'] === 'perempuan'): ?>
                        <?= " checked" ?>
                    <?php endif; ?>>
                    <label for="perempuan">Perempuan</label><br>
                    <input type="submit" value="Update" name="edit_profil">
                </form>
            </div>
        </div>
        <footer class="footer">
            <a href="/"><img src="<?= base_url() ?>/img/home.png"></a>
            <a href="/status"><img src="<?= base_url() ?>/img/location.png"></a>
            <a href="/profile<?= $user['id'] ?>"><img src="<?= base_url() ?>/img/profile.png"></a>
        </footer>
    </div>
</body>
</html>