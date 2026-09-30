<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monitoring Antrian</title>
  <meta name="description" content="Layar monitoring nomor antrian poliklinik lengkap dengan video informasi dan identitas instansi.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Ganti href di bawah dengan {{ asset('css/style.css') }} saat dipakai di Laravel Blade -->
  <link rel="stylesheet" href="css/style-2.css">
  <link rel="icon" href="image/logo_imigrasi.png" type="image/x-icon">
</head>
<body>
  <!-- ===== Navbar: identitas instansi + jam ===== -->
  <header class="navbar">
    <div class="navbar-dalam">
      <div class="navbar-identitas">
        <div class="logo">
          <!-- <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg> -->
          <img src="image/logo_imigrasi.png" alt="logo-imigrasi" width="44" height="44">
        </div>
        <div class="identitas-teks">
          <p class="nama-instansi">Kantor Imigrasi Kelas II TPI Belu</p>
          <p class="alamat-instansi">Jl. Marsda Adi Sucipto No.8, Manumutin, Kec. Kota Atambua, Kabupaten Belu, Nusa Tenggara Timur</p>
        </div>
      </div>
      <div class="navbar-waktu">
        <p class="jam"><span id="jam">--:--:--</span> <span class="zona">WITA</span></p>
        <p class="tanggal" id="tanggal">&nbsp;</p>
      </div>
    </div>
  </header>

  <!-- ===== Isi utama ===== -->
  <main class="konten">
    <div class="kolom">

      <!-- Kiri: kartu nomor antrian -->
      <section class="kartu kartu-antrian">
        <div class="kartu-atas">
          <h2>Nomor Antrian</h2>
        </div>
        <div class="kartu-tengah">
          <span id="antrian-sekarang" class="nomor"></span>
          <div class="garis-teal"></div>
          <!-- <div class="pill-poliklinik">
            <p>Poliklinik Umum</p>
          </div> -->
        </div>
        <div class="kartu-bawah">
          <span class="titik-nadi"></span>
          <p>Sedang Dilayani</p>
        </div>
      </section>

      <!-- Kanan: kartu video YouTube -->
      <section class="kartu kartu-video">
        <div class="video-kepala">
          <div class="video-judul">
            <div class="ikon-video">
              <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
              </svg>
            </div>
            <h3>Video Informasi</h3>
          </div>
          <div class="video-status">
            <!-- <span class="titik-merah"></span>
            <span>Auto Mute Loop</span> -->
          </div>
        </div>
        <!-- <div class="video-bingkai"> -->
          <!--
            GANTI VIDEO:
            1. Ubah ID video YouTube di URL di bawah ini (bagian setelah /embed/).
            2. Parameter playlist juga harus diisi ID yang sama agar loop berfungsi.
          -->
          <!-- <iframe
            src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&mute=1&loop=1&playlist=M7lc1UVf-VE&rel=0"
            title="Video informasi instansi"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe> -->
          <!-- <video autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('video/video-imigrasi.mp4') }}" type="video/mp4">
            Browser Anda tidak mendukung pemutaran video.
          </video>
        </div> -->

        <div class="video-bingkai">
          <!--
            VIDEO LOKAL:
            1. Letakkan file video Anda di folder public/video/ (misal: public/video/informasi.mp4).
            2. File contoh "informasi.mp4" diputar otomatis (bisu, berulang). Ganti file itu
               dengan video instansi Anda dengan NAMA FILE YANG SAMA, atau ubah src di bawah ini.
            3. Format yang didukung: MP4 (H.264) — paling aman untuk semua peramban dan TV.
          -->
          @if($currentVideo)
          <video
            id ="videoImigrasi"
            src="{{ asset('storage/videos/' . $currentVideo) }}"
            title="Video informasi instansi"
            autoplay
            loop
            playsinline
            controls
          ></video>
          @else
            <p class="text-danger">Belum ada video yang diunggah.</p>
          @endif
          <!--
            No Laravel/Blade, troque a linha src= acima por:
            src="{{ asset('video/informasi.mp4') }}"
          -->
        </div>
      </section>

    </div>
  </main>

  <!-- ===== Footer nama instansi ===== -->
  <footer class="footer">
    <p>Kantor Imigrasi Kelas II TPI Belu</p>
  </footer>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- Jam & tanggal WIB, diperbarui setiap detik -->
  <script>
    function perbaruiJam() {
      const now = new Date();
      const opsiTanggal = {
        weekday: "long", day: "numeric", month: "long", year: "numeric",
        timeZone: "Asia/Makassar"
      };
      const opsiJam = {
        hour: "2-digit", minute: "2-digit", second: "2-digit",
        hour12: false, timeZone: "Asia/Makassar"
      };
      document.getElementById("tanggal").textContent =
        new Intl.DateTimeFormat("id-ID", opsiTanggal).format(now);
      document.getElementById("jam").textContent =
        new Intl.DateTimeFormat("id-ID", opsiJam).format(now).replace(/\./g, ":");
    }

    // function refreshInfoAntrian() {
    //   $.getJSON("{{ route('antrianNow') }}", function(res) {
    //     $('#antrian-sekarang').text(res.no_antrian);
    //   });
    // }
    function refreshInfoAntrian() {
      $.getJSON("{{ route('antrianNow') }}")
        .done(res => $('#antrian-sekarang').text(res.no_antrian))
        .always(() => setTimeout(refreshInfoAntrian, 2000));
    }
    refreshInfoAntrian();

    // perbaruiJam();
    setInterval(perbaruiJam, 1000);
    // setInterval(() => {
    //   refreshInfoAntrian();
    // }, 2000);
    // setInterval(function() {
    //   refreshInfoAntrian();
    //   perbaruiJam();
    // }, 1000);
  </script>
  <!-- Script opsional jika ingin membuat video auto-loop playlist atau refresh otomatis via AJAX jika video diganti secara real-time -->
</body>
</html>
