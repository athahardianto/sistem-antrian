<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Monitoring</title>
    <link rel="icon" href="image/logo_imigrasi.png" type="image/x-icon">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Favicon icon -->
    <!-- <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon"> -->
    <!-- Bootstrap Icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->
     <link rel="stylesheet" href="{{ asset('css/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
    <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <!-- <i class="bi-mic-fill text-success me-3 fs-3"></i> -->
           <div class="feature-icon-1 bg-success bg-gradient mb-0">
                <i class="bi-gear"></i>
              </div>
          <h1 class="h2 pt-2">Pengaturan Monitoring</h1>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Pengaturan Video Informasi</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Video Saat Ini:</label>
                            @if(isset($currentVideo->value) && $currentVideo->value)
                                <div class="ratio ratio-169 mb-2">
                                    <video controls class="w-100 rounded">
                                        <source src="{{ asset('storage/videos/' . $currentVideo->value) }}" type="video/mp4">
                                        Browser Anda tidak mendukung tag video.
                                    </video>
                                </div>
                                <small class="text-muted">File: {{ $currentVideo->value }}</small>
                            @else
                                <p class="text-danger">Belum ada video yang diunggah.</p>
                            @endif
                        </div>

                        <form action="{{ route('admin.video.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="video" class="form-label">Upload Video Baru (MP4, Max 100MB):</label>
                                <input type="file" name="video" id="video" class="form-control" accept="video/mp4,video/webm" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Simpan & Perbarui Video</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>