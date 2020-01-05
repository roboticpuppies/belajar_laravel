
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('judul_halaman') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Favicons -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{ config('app.name', 'Laravel') }}</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Sign out') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/">
              <span data-feather="home"></span>
              Home
            </a>
          </li>
        @can('isAdmin')
          <li class="nav-item">
            <a class="nav-link" href="/admin/buku">
              <span data-feather="file"></span>
              <i class="fa fa-book" aria-hidden="true" style="padding-right:10px"></i> Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/vcd">
              <span data-feather="file"></span>
              <i class="fa fa-forward" aria-hidden="true" style="padding-right:10px"></i> VCD
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/kategori">
              <span data-feather="file"></span>
              <i class="fa fa-bookmark" aria-hidden="true" style="padding-right:10px"></i> Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/users">
              <span data-feather="file"></span>
              <i class="fa fa-plus" aria-hidden="true" style="padding-right:10px"></i> Users
            </a>
          </li>
        @elsecan('isSiswa')
          <li class="nav-item">
            <a class="nav-link" href="/siswa/pinjamanku">
              <span data-feather="file"></span>
              <i class="fa fa-folder" aria-hidden="true" style="padding-right:10px"></i> Pinjamanku
            </a>
          </li>
        @endcan
        </ul>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('judul_halaman')</h1>
      </div>
      @yield('content')
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/7b1b114b5c.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready( function () {
    $('.table').DataTable();
  });
</script>
</body>
</html>