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
        <script type="text/javascript">
            var base_url = "<?= base_url() ?>";
            var trace_data;
            var test_data;

            $.ajax({
                url:  base_url + '/trace/showTraceHistory',
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    trace_data = response;
                    console.log(JSON.stringify(trace_data));
                }
            });

            $.ajax({
                url:  base_url + '/test/showTestHistory',
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    test_data = response;
                    console.log(JSON.stringify(test_data));
                }
            });

            $(document).ready(function() { 
                $('button').click(function() {
                    getLocation();
                });
            });
        </script>
    </head>

    <body>
        <div class="container">
            <div class="sidebar">
                <div class="sidebar-profile">
                    <img src="img/def.png">
                    <p><?= session()->get('name') ?></p>
                </div>
                <div class="sidebar-menu">
                    <div class="sidebar-menu-btn">
                        <img src="img/home.png">
                        <a href="#">Home</a>
                    </div>
                    <div class="sidebar-menu-btn">
                        <img src="img/location.png">
                        <a href="/status">Track</a>
                    </div>
                    <div class="sidebar-menu-btn">
                        <img src="img/profile.png">
                        <a href="/profile/<?= session()->get('id') ?>">Profile</a>
                    </div>
                    <div class="sidebar-menu-btn">
                        <img src="img/logout.png">
                        <a href="/logout">Logout</a>
                    </div>
                </div>
                <img src="img/Covidzen white 2.png">
            </div>
            <div class="home">
                <img src="img/Covidzen.png" style="margin: auto;"><br/>
                <br/><h2>Selamat Datang <strong><?= session()->get('name') ?></strong></h2>
                <div class="covid-case">
                    <div class="covid-case-box" style="background-color: #D30000;">
                        <h5>Positif</h5>
                        <h1><strong>758.000</strong></h1>
                    </div>
                    <div class="covid-case-box" style="background-color: #03C03C;">
                        <h5>Sembuh</h5>
                        <h1><strong>626.000</strong></h1>
                    </div>
                    <div class="covid-case-box" style="background-color: gray;">
                        <h5>Meninggal</h5>
                        <h1><strong>22.555</strong></h1></div>
                    </div>
                <h3><strong>Peta Penyebaran Covid Provinsi Jawa Barat</strong></h3>
                <div class="home-article">
                    <div class="home-article-img">
                        <img src="img/maps 2.jpeg">
                    </div>
                </div>
                <div class="track-history">
                    <button class="collapsible"><strong>Track History</strong></button>
                    <div class="collapse-content">
                        <div class="track-history-box">
                            <h3><strong>Aththar Astaghfiranza</strong></h3>
                            <img src="img/maps.jpg">
                            <p>1 JANUARI 2021</p>
                            <p>17.00</p>
                        </div>
                        <div class="track-history-box">
                            <h2><strong>Aththar Astaghfiranza</strong></h2>
                            <img src="img/maps.jpg">
                            <p>3 JANUARI 2021</p>
                            <p>18.32</p>
                        </div>
                        <div class="track-history-box">
                            <h3><strong>Aththar Astaghfiranza</strong></h3>
                            <img src="img/maps.jpg">
                            <p>4 JANUARI 2021</p>
                            <p>07.37</p>
                        </div>
                    </div>
                </div>
                <div class="track-history">
                    <button class="collapsible"><strong>Test History</strong></button>
                    <div class="collapse-content">
                        <div class="track-history-box">
                            <h2><strong>Aththar Astaghfiranza</strong></h2>
                            <h3>Jenis tes: PCR</h3>
                            <h3>Status: Negatif</h3>
                            <p>1 JANUARI 2021</p>
                            <p>17.00</p>
                        </div>
                        <div class="track-history-box">
                            <h2><strong>Nama Nama</strong></h2>
                            <h3>Jenis tes: PCR</h3>
                            <h3>Status: Negatif</h3>
                            <p>1 JANUARI 2021</p>
                            <p>17.00</p>
                        </div>
                        <div class="track-history-box">
                            <h2><strong>Nama Nama</strong></h2>
                            <h3>Jenis tes: PCR</h3>
                            <h3>Status: Negatif</h3>
                            <p>1 JANUARI 2021</p>
                            <p>17.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <a href="home.html"><img src="img/home.png"></a>
                <a href="track.html"><img src="img/location.png"></a>
                <a href="profile.html"><img src="img/profile.png"></a>
            </footer>
            <script>
                var coll = document.getElementsByClassName("collapsible");
                var i;
                
                for (i = 0; i < coll.length; i++) {
                  coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.maxHeight){
                      content.style.maxHeight = null;
                    } else {
                      content.style.maxHeight = content.scrollHeight + "px";
                    } 
                  });
                }
            </script>
        </div>

    
        <!-- <nav class="navbar">
            <div class="navbar-logo"><a href="#" style="border-bottom: 0px solid black;"><img src="img/covidzen-white-2.png" alt="logo"></a></div>
            <nav class="navbar-left">
                
            </nav>

            <nav class="navbar-right">
                <a href="/">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="/status">Status</a>
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
        </footer> -->
    </body>
</html>