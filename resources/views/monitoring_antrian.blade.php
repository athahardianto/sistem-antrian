<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Antrian</title>
    <link rel="stylesheet" href="css/monitoring-antrian.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet"> -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="page">

        <!-- Navbar -->
        <header class="navbar">
            <div class="navbar-inner">
                <div class="navbar-left">
                    <div class="logo"><img src="image/logo_imigrasi.png" alt="logo-imigrasi" width="44" height="44"></div>
                    <div class="navbar-text">
                        <p class="instansi">Kantor Imigrasi Kelas II TPI Belu</p>
                        <p class="alamat">Jl. Marsda Adi Sucipto No.8, Manumutin, Kec. Kota Atambua, Kabupaten Belu, Nusa Tenggara Timur</p>
                    </div>
                </div>
                <div class="navbar-right">
                    <p class="tanggal" id="tanggal">&nbsp;</p>
                    <p class="jam" id="jam">--:--:--</p>
                </div>
            </div>
        </header>

        <!-- Isi utama -->
        <main class="konten">
            <div class="grid">

                <!-- Kiri: nomor antrian sekarang -->
                <section class="kartu-antrian">
                    <div class="kartu-antrian-bar">Nomor Antrian</div>
                    <div class="kartu-antrian-nomor">
                        <span class="nomor">C18</span>
                    </div>
                    <div class="kartu-antrian-bar"></div>
                </section>

                <!-- Kanan: pemutar YouTube -->
                <section class="kartu-video">
                    <div class="kartu-video-bar">Video Informasi</div>
                    <div class="kartu-video-player">
                        <!-- Ganti VIDEO_ID di bawah dengan ID video YouTube instansi Anda -->
                        <!-- <iframe
                            src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&mute=1&loop=1&playlist=M7lc1UVf-VE&rel=0"
                            title="Video informasi instansi"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe> -->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/PWYCSf0Kg2M?si=sRMvr_fAx3N7JeGZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </section>

            </div>
        </main>

        <!-- Footer nama instansi -->
        <footer class="footer">
            <p>Kantor Imigrasi Kelas II TPI Belu</p>
        </footer>

    </div>

    <script>
        function perbaruiJam() {
            var now = new Date();

            var tanggal = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                timeZone: 'Asia/Jakarta'
            });

            var jam = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false,
                timeZone: 'Asia/Makassar'
            }).replace(/\./g, ':');

            document.getElementById('tanggal').textContent = tanggal;
            document.getElementById('jam').textContent = jam;
        }

        perbaruiJam();
        setInterval(perbaruiJam, 1000);
    </script>
</body>
</html>
