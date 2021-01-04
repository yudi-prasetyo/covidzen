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
    <script type="text/javascript">
        var base_url = "<?= base_url() ?>";

        $(document).ready(function() { 
            $('#track').click(function() {
                getLocation();
            });
        });
        
        function ajaxRequest(position) {
            $.ajax({
                url:  base_url + '/trace/postData',
                method: 'post',
                data: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                },
                dataType: 'json',
                success: function(response) {
                    // var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=" + response.latlng + 
                    // "&zoom=14&size=400x300&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
                    // document.getElementById('container').innerHTML = "<img src='" + img_url + "'>"
                    alert(response.latlng)
                }
            });
        }

        function getLocation() {
            navigator.geolocation.getCurrentPosition(ajaxRequest);
        }
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
                    <a href="/">Home</a>
                </div>
                <div class="sidebar-menu-btn">
                    <img src="img/location.png">
                    <a href="#">Track</a>
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
            <div class="content">
                <br/><h2><strong>Rekam jejak perjalananmu</strong></h2>
                <button class="btn-pink" id="track">Track</button>
                <br/><h2><strong>Update data test covid</strong></h2>

                <?= \Config\Services::validation()->listErrors(); ?>
                <form action="/test/postData" method="POST">
                    <?= csrf_field() ?>

                    <label for="test_type">Test Type:</label>
                    <select name="test_type">
                        <option value="Rapid Test">Rapid Test</option>
                        <option value="PCR Test">PCR Test</option>
                    </select>

                    <label for="result">Test Result:</label>
                    <select name="result">
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                    
                    <button type="submit" class="btn btn-primary">Status</button>
                </form>
            </div>
        </div>
        <footer class="footer">
            <a href="/"><img src="img/home.png"></a>
            <a href="#"><img src="img/location.png"></a>
            <a href="/profile"><img src="img/profile.png"></a>
        </footer>
    </div>
</body>
</html>