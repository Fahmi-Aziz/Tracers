<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracer Study Alumni Politeknik Negeri Batam</title>
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="shortcut icon" type="image/png" href="gambar/loggooo.png">
</head>

<body>
    <main>
        <div class="big-wrapper light">
            <img src="./gambar/shape.png" alt class="shape" />

            <header>
                <div class="container">
                    <div class="logo">
                        <img src="./gambar/polbat logo.png" alt="Logo" />

                        <!--<h3>Tracer Study</h3> -->
                    </div>

                    <div class="links">
                        <ul>
                            <li><a href="login.php" class="btn">Login</a></li>
                        </ul>
                    </div>

                    <!--

              <ul>
                <li><a href="#">Features</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Testimonials</a></li>
                
              </ul>
            -->

                    <div class="overlay"></div>

                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </header>

            <div class="showcase-area">
                <div class="container">
                    <div class="left">
                        <div class="big-title">
                            <h1>Tracer Study Alumni</h1>
                            <h1>Politeknik Negeri batam</h1>
                        </div>
                        <p class="text">
                            Para alumni yang terhormat, saat ini kami sedang mengadakan
                            Tracer Study kepada alumni Polibatam. Studi ini dilakukan dalam
                            rangka mengindentifikasi keberadaan alumni setelah lulus kuliah.
                            Tujuan studi ini untuk mengevaluasi proses dan hasil
                            perkuliahan, penyempurnaan serta penjaminan kualitas
                            pembelajaran di Polibatam.
                        </p>
                        <div class="cta">
                            <a href="login.php" class="btn">Login</a>
                        </div>
                    </div>

                    <div class="right">
                        <!--  <img src="./img/person.png" alt="Person Image" class="person" /> -->
                    </div>
                </div>
            </div>

            <div class="bottom-area">
                <div class="container">
                    <button class="toggle-btn">
                        <i class="far fa-moon"></i>
                        <i class="far fa-sun"></i>
                    </button>
                </div>
                <div class="credits">
                    Made By
                    <a class="link" tabindex="0" rel="noopener" target="_blank">©Kelompok
                        4 IF 2D</a>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="./app.js"></script>
    <!-- Code injected by live-server -->
    <script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                        "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                            .valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
    </script>
</body>

</html>