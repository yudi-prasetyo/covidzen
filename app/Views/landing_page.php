<!DOCTYPE html>
<html>
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

    <body>
        <nav class="navbar">
            <div class="navbar-logo"><a href="#" style="border-bottom: 0px solid black;"><img src="img/covidzen-white-2.png" alt="logo"></a></div>
            <nav class="navbar-left">
                
            </nav>

            <nav class="navbar-right">
                <a href="/">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="/profile/<?= session()->get('id') ?>">Profile</a>
                <a href="logout">Logout</a>
            </nav>
        </nav>

        <div class="container">
            <div class="header">
                <div class="header-text">
                    <h5>SELAMAT DATANG DI COVIDZEN</h5>
                    <h5><?= strtoupper(session()->get('name')) ?></h5>
                    <h1><strong>Kenali Covid Terhadap Dirimu</strong></h1>
                    <h4>Kenali dampak-dampak COVID-19 terhadap tubuhmu agar kamu lebih
                        tahu dan waspada terhadap virus ini.</h4>
                    <a href="#">Learn More</a>
                </div>
                <img src="img/header-pink.png">
            </div>
            <div class="content">
                <div class="about">
                    <img src="img/about-2.png">
                    <div id="about" class="about-text">
                        <p>TENTANG KAMI</p>
                        <h1><strong>Tujuan Kami</strong></h1>
                        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet quam 
                            vitae tincidunt porttitor. Proin eget vulputate quam. In nec felis malesuada 
                            mi consectetur efficitur. In id faucibus nisi.
                        </h4>
                    </div>
                </div>
                <div id="services" class="services">
                    <h1><strong>Layanan Kami</strong></h1>
                    <p>Kami menawarkan pelayanan COVID-19 hanya dengan satu sentuhan.</p>
                    <div class="services-row">
                        <div class="services-box">
                            <img src="img/head-2.png">
                            <h3><strong>Cek Status Covid</strong></h3>
                            <p>Kami menawarkan pengecekan mandiri COVID-19 dengan memasukkan gejala-gejala
                                yang kamu alami.
                            </p>
                            <a href="#">Mulai</a>
                        </div>
                        <div class="services-box">
                            <img src="img/covid-2.png">
                            <h3><strong>Kenali Covid</strong></h3>
                            <p>Kenali dampak-dampak COVID-19 terhadap tubuhmu agar kamu lebih
                                tahu dan waspada terhadap virus ini.
                            </p>
                            <a href="#">Mulai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="copyright">
                <p>Covidzen is developed in 2020 by Yudi Prasetyo, Aththar Astaghfiranza, Zahra Elgysha</p>
                <p>Computer Science Universitas Pendidikan Indonesia</p>
                <img src="img/covidzen-white-2.png">
            </div>
        </footer>
    </body>
</html>