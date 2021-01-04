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
            $(document).ready(function() {
                var base_url = "<?= base_url() ?>";
                var trace_data;
                var test_data;
                var covid_case = {};
                
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
                
                $.ajax({
                    url:  'https://covid19.mathdro.id/api/countries/indonesia',
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        covid_case.confirmed = response['confirmed']['value'].toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                        covid_case.recovered = response['recovered']['value'].toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                        covid_case.deaths = response['deaths']['value'].toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                        $('#positif').text(covid_case.confirmed);
                        $('#sembuh').text(covid_case.recovered);
                        $('#meninggal').text(covid_case.deaths);
                    }
                });
            });
        </script>
    </head>

    <body>
        <div class="container">
            <div class="sidebar">
                <div class="sidebar-profile">
                    <img class="img" src="<?= base_url() ?>/profile-pic/<?= session()->get('id') ?>.jpg" onerror="this.src='<?= base_url() ?>/profile-pic/def.png'">
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
                        <h1><strong id="positif"></strong></h1>
                    </div>
                    <div class="covid-case-box" style="background-color: #03C03C;">
                        <h5>Sembuh</h5>
                        <h1><strong id="sembuh"></strong></h1>
                    </div>
                    <div class="covid-case-box" style="background-color: gray;">
                        <h5>Meninggal</h5>
                        <h1><strong id="meninggal"></strong></h1></div>
                    </div>
                <!-- <div class="home-article">
                    </div> -->
                    <div class="bingwidget" data-type="covid19" data-market="en-us" data-language="en-us"></div>
                
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
        <script src="//www.bing.com/widget/bootstrap.answer.js" async=""></script>
    </body>
</html>