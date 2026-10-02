<!-- Aplikasi Antrian Berbasis Web 
**********************************************
* Developer   : Indra Styawantoro
* Company     : Indra Studio
* Release     : Juni 2021
* Update      : -
* Website     : www.indrasatya.com
* E-mail      : indra.setyawantoro@gmail.com
* WhatsApp    : +62-821-8686-9898
-->

<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <!-- <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon"> -->

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <!-- Bootstrap Icons -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap-icons/bootstrap-icons.css') }}">

  <!-- Font -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet"> -->

  <!-- DataTables -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" /> -->
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

  <!-- Custom Style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="image/logo_imigrasi.png" type="image/x-icon">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-4">
      <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <!-- <i class="bi-mic-fill text-success me-3 fs-3"></i> -->
           <div class="feature-icon-1 bg-success bg-gradient mb-0">
                <i class="bi-people"></i>
              </div>
          <h1 class="h2 pt-2">Manajemen Antrian</h1>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi-house-fill text-success"></i></a></li>
              <li class="breadcrumb-item" aria-current="page">Dashboard</li>
              <li class="breadcrumb-item" aria-current="page">Antrian</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <!-- menampilkan informasi jumlah antrian -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-people text-warning"></i>
                </div>
                <div>
                  <p id="jumlah-antrian" class="fs-3 text-warning mb-1"></p>
                  <p class="mb-0">Jumlah Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-check text-success"></i>
                </div>
                <div>
                  <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p>
                  <p class="mb-0">Antrian Sekarang</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-plus text-info"></i>
                </div>
                <div>
                  <p id="antrian-selanjutnya" class="fs-3 text-info mb-1"></p>
                  <p class="mb-0">Antrian Selanjutnya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person text-danger"></i>
                </div>
                <div>
                  <p id="sisa-antrian" class="fs-3 text-danger mb-1"></p>
                  <p class="mb-0">Sisa Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button id="tambahAntrian" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2" type="button">Tambah Antrian</button>
      <button id="hapusAntrian" class="btn btn-danger btn-block rounded-pill fs-5 px-5 py-4 mb-2" type="button">Reset Antrian</button>

      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="table-responsive">
            <table id="tabel-antrian" class="table table-bordered table-striped table-hover" width="100%">
              <thead>
                <tr>
                  <th>Nomor Antrian</th>
                  <th>Status</th>
                  <th>Panggil</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <hr class="my-4">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        <div class="logo"><img src="image/logo_imigrasi.png" alt="logo-imigrasi" width="44" height="44">Kantor Imigrasi Kelas II TPI Belu</div>
      </div>
    </div>
  </footer>

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="audio/tingtung.mp3"></audio>

  <!-- jQuery Core -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <!-- Popper and Bootstrap JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->

  <!-- DataTables -->
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script> -->
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <!-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script> -->

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
  
  <script type="text/javascript">
  $(document).ready(function() {

    // Setup CSRF Token untuk seluruh request AJAX Laravel
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Fungsi untuk memperbarui kartu statistik info antrian
    function refreshInfoAntrian() {
      $.getJSON("{{ route('antrianJumlah') }}", function(res) {
        $('#jumlah-antrian').text(res.total);
      });
      $.getJSON("{{ route('antrianNow') }}", function(res) {
        $('#antrian-sekarang').text(res.no_antrian);
      });
      $.getJSON("{{ route('antrianSelanjutnya') }}", function(res) {
        $('#antrian-selanjutnya').text(res.no_antrian);
      });
      $.getJSON("{{ route('antrianSisa') }}", function(res) {
        $('#sisa-antrian').text(res.total);
      });
    }

    // Load pertama kali
    refreshInfoAntrian();

    // Inisialisasi DataTables
    var table = $('#tabel-antrian').DataTable({
      "lengthChange": false,
      "searching": false,
      "ajax": {
        "url": "{{ route('antrianToday') }}",
        "type": "GET"
      },
      "columns": [
        {
          "data": "no_antrian",
          "width": '250px',
          "className": 'text-center'
        },
        {
          "data": "status",
          "visible": false
        },
        {
          "data": null,
          "orderable": false,
          "searchable": false,
          "width": '100px',
          "className": 'text-center',
          "render": function(data, type, row) {
            var btn = "-";
            if (data.status === "0" || data.status === 0) {
              btn = "<button class=\"btn btn-success btn-sm rounded-circle btn-panggil\"><i class=\"bi-mic-fill\"></i></button>";
            } else if (data.status === "1" || data.status === 1) {
              btn = "<button class=\"btn btn-secondary btn-sm rounded-circle btn-panggil\"><i class=\"bi-mic-fill\"></i></button>";
            }
            return btn;
          }
        }
      ],
      "order": [
        [0, "desc"]
      ],
      "iDisplayLength": 10,
    });

    // Panggilan antrian dan update data saat tombol diklik
    $('#tabel-antrian tbody').on('click', 'button', function() {
      var data = table.row($(this).parents('tr')).data();
      var id = data.id;
      var bell = document.getElementById('tingtung');

      // Mainkan suara bell antrian
      if (bell) {
        bell.pause();
        bell.currentTime = 0;
        bell.play();
      }

      var durasi_bell = bell ? bell.duration * 770 : 1000;

      // Mainkan suara nomor antrian
      setTimeout(function() {
        responsiveVoice.speak("Nomor Antrian, " + data.no_antrian , "Indonesian Male", {
          rate: 0.9,
          pitch: 1,
          volume: 1
        });
      }, durasi_bell);

      // Proses update data antrian ke Laravel
      // Sesuaikan nama route dengan milik Anda, misal: 'antrianUpdate'
      var updateUrl = "{{ route('updateStatusAntrian', ':id') }}".replace(':id', id);

      $.ajax({
        type: "POST",
        url: updateUrl,
        data: { _method: 'PUT' }, // Gunakan spoofing method jika route bertipe PUT/PATCH
        success: function(response) {
          refreshInfoAntrian();
          table.ajax.reload(null, false);
        },
        error: function(xhr) {
          console.error("Gagal memperbarui status antrian.", xhr);
        }
      });
    });

    ///tambah data
    var inputAntrianUrl = "{{route('inputAntrian')}}";
    $('#tambahAntrian').on('click', function(){
      if (confirm("Yakin Tambah Antrian ?")) {
        $.ajax({
          type:"POST",
          url:inputAntrianUrl,
          data:{ _method: 'POST'},
           success: function(response) {
            location.reload();
            refreshInfoAntrian();
            table.ajax.reload(null, false);
          },
          error: function(xhr) {
            console.error("Gagal menambah antrian", xhr);
          }
        });
      }
    });

    $('#hapusAntrian').on('click', function() {
        if (confirm('Apakah Anda yakin ingin menghapus semua data antrian?')) {
            $.ajax({
                type: "POST",
                url: "{{ route('antrianReset') }}",
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.msg);
                        refreshInfoAntrian();
                        table.ajax.reload(null, false);
                    } else {
                        alert('Gagal: ' + response.msg);
                    }
                }
            });
        }
    });

    // Auto reload data antrian setiap 2 detik (1 detik terlalu cepat untuk I/O DB)
    setInterval(function() {
      refreshInfoAntrian();
      table.ajax.reload(null, false);
    }, 3000);

  });
</script>
</body>

</html>