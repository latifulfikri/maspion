<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->

  <link href="{{ url('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Maspion IT</title>
  <style>
    body {
      background-color: #f7f8f9;
    }

    #s1 {
      background-color: white;
      position: sticky;
      top: 0;
    }

    .a2 {
      color: black;
      border-radius: 10px;
      margin: 15px;
      padding: 5px;
      text-decoration-line: none;
      border: none;
      font-size: 14px;
    }

    #search-input,
    #search-btn {
      border: none;
      background-color: #f8f8f8;
    }

    @media only screen and (min-width: 726px) {
      .nav-item {
        margin-right: 20px;
      }

      .nav-item:last-child {
        margin-right: 0px;
      }
    }

    .pt-5 {
      padding-top: 3rem !important;
    }

    #search-input {
      border-radius: 10px 0 0 10px;
    }

    .card {
      border-radius: 0;
    }

    .card:hover {
      box-shadow: 0 0 50px rgba(0, 0, 0, .1) !important;
      transition: .2s;
    }

    #search-btn {
      border-radius: 0px 10px 10px 0;
    }

    .layout-nav {
      position: fixed;
      top: 1;
      width: 100%;
    }

    .carousel {
      height: 35vh;
    }

    .carousel-inner {
      height: 35vh;
    }

    .carousel-item {
      height: 35vh;
    }

    .card {
      overflow: hidden;
      border: none;
    }

    .card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    a {
      padding: 8px !important;
      border-radius: 10px !important;
      color: black;
    }

    .post-tumb:hover {
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      color: black;
    }

    .post-tumb {
      padding: 0px !important;
      color: black;
      text-decoration: none;
    }

    a:hover {
      background-color: #f3f4f5;
    }

    .bg-theme {
      background-color: rgb(249, 32, 37);
    }

    i.social {
      font-size: 24px;
    }

    #head .col-lg-8 .card {
      height: 100%;
    }

    #head .col-lg-8 .card .row {
      height: 100% !important;
    }

    #head .col-lg-8 .card .row .col-lg-8 .card-body {
      height: 100%;
    }

    .card img.rounded {
      border-radius: 10px !important;
    }
  </style>
</head>

<body>
  <section id="top" style="background-color: white;">
    <div class="container py-3">
      <div class="row">
        <div class="col-md-4 py-3 d-flex">
          <a href=""><i class="bx bxl-facebook social"></i></a>
          <a href=""><i class="bx bxl-instagram social"></i></a>
          <a href=""><i class="bx bxl-twitter social"></i></a>
        </div>
        <div class="col-md-4 text-center py-1">
          <a href="#" class="navbar-brand">
            <img src="{{ url('storage/img/maspion-it.png') }}" height="55" width="140" alt="AdminLTE Logo" class="brand-image white">
          </a>
        </div>
        <div class="col-md-4 py-3 d-flex">
          <a class="nav-link ms-auto" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="bx bx-pencil"></i>
            Tulis
          </a>
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="bx bx-user-plus"></i>
            Daftar
          </a>

          <a class="nav-link " data-widget="control-sidebar" data-slide="true" href="#">
            <i class="bx bx-log-in"></i>
            Masuk
          </a>
          </a>
        </div>
      </div>
    </div>
  </section>
  <div class="wrapper" id="app">
    <section id="s1" class="sticky-top">
      <div class="container py-2">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="#">Review</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Best Pick</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" aria-disabled="true">Apple M1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" aria-disabled="true">CPUs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" aria-disabled="true">GPUs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" aria-disabled="true">More</a>
                </li>
              </ul>
              <form class="d-flex">
                <div class="input-group">
                  <input id="search-input" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Search">
                  <span id="search-btn" class="input-group-text"><i class="bx bx-search"></i></span>
                </div>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </section>
    <section id="head" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3" id="card">
              <div class="row g-0">
                <div class="col-lg-4">
                  <img src="{{ url('$lates[0]->pict') }}" alt="Gak Ada Gambar" />
                </div>
                <div class="col-lg-8">
                  <div class="card-body p-5">
                    <span class="badge rounded-pill mt-2 bg-{{ $lates[0]->style }}">{{ $lates[0]->category_name }}</span>
                    <h5 class="card-title py-4" style="font-size: 42px; padding-right: 100px">
                      <b>{{ $lates[0]->title }}</b>
                    </h5>
                    <p class="card-text mb-auto pb-lg-5">{{ $lates[0]->desc }}</p>
                    <div class="d-flex pt-5" style="width: 100%">
                      <div class="">
                        <p>{{ $lates[0]->date }}</p>
                      </div>
                      <div class="ms-auto">
                        <a href=""><i class="bx bxs-like">{{ $lates[0]->like }}</i></a>
                        <a href=""><i class="bx bxs-message-rounded">123</i></a>
                        <a href=""><i class="bx bxs-share">{{ $lates[0]->share }}</i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h1 style="color: #DA251D;" class="mb-5"><b>Trending</b></h1>
            <div class="row">
              @foreach( $trending as $t )
              <div class="col-lg-12 col-md-6 mb-4">
                <div class="card">
                  <div class="row g-0">
                    <div class="col-lg-4">
                      <img src="{{$t->pict}}" alt="Gak ada foto" />
                    </div>
                    <div class="col-lg-8">
                      <div class="card-body">
                        <b class="mb-2">{{$t->title}}</b>
                        <br />
                        <span class="badge rounded-pill mt-2 bg-{{ $t->style }}">{{ $t->category_name }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="all">
      <div class="container">
        <div class="row">
          <div class="col-12 p-2">
            <div class="card mb-3">
              <img src="{{ $lates[0]->pict }}" class="card-img-top" alt="" style="height: 500px">
              <div class="card-body p-5">
                <h5 class="card-title" style="font-size: 42px; padding-right: 100px; font-weight: 700;">{{ $trending[0]->title }}</h5>
                <p></p>
                <span class="badge rounded-pill bg-{{ $trending[0]->style }}">{{ $trending[0]->category_name }}</span>
                <p class="card-text py-4">{{ $trending[0]->desc }}</p>
                <p></p>
                <div class="row">
                  <p></p>
                  <div class="col-md-6 text-start">
                    <p>{{ $trending[0]->date }}</p>
                  </div>
                  <div class="col-md-6 text-end">
                    <a href=""><i class="bx bxs-like">{{ $trending[0]->like }}</i></a>
                    <a href=""><i class='bx bxs-message-rounded'>123</i></a>
                    <a href=""><i class="bx bxs-share">{{ $trending[0]->share }}</i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container py-5">
        <div class="row">
          <div class="col-12">
            <h1 class="mb-5"><b>Last Week</b></h1>
          </div>
        </div>
        <div class="row">
          @foreach($lates as $l)
          <div class="col-md-4" style="height: 100% !important">
            <a href="" class="post-tumb" style="height: 100% !important">
              <div class="card mb-4" style="height: 100% !important">
                <img src="{{ $l->pict }}" style="height: 200px !important" class="card-img-top" alt="" />
                <div class="card-body">
                  <span class="'mb-3 badge rounded-pill my-2 bg-{{ $l->style }}">{{ $l->category_name }}</span>
                  <h5 class="card-title">{{ $l->title }}</h5>
                  <p class="card-text">
                    {{ $l->desc }}
                  </p>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <section class="bg-theme py-5" id="kontak">
      <div class="container text-white">
        <div class="row">
          <div class="col-md-6 pe-md-5 text-center text-md-end">
            <div class="title-section">
              <h1>Hubungi<br>Kami</h1>
              <a href="https://api.whatsapp.com/send?phone=6281217234115&amp;text=Selamat%20Siang,%20Bu%20Nurul%0AMau%20bertanya%20" class="btn btn-success" target="_blank"><i class="bx bxl-whatsapp"></i> Hubungi Whatsapp</a>
            </div>
          </div>
          <div class="col-md-6 ps-md-5 text-center text-md-start">
            <p class="py-md-4 m-0">Kunjungi akun media sosial kami</p>
            <div class="d-flex tengah">
              <a class="sosmed-link link-light" href="https://twitter.com/maspionsquare" target="_blank">
                <h1><i class="bx bxl-twitter"></i></h1>
              </a>
              <a class="sosmed-link link-light" href="https://www.facebook.com/Maspion-Square-349216336595" target="_blank">
                <h1><i class="bx bxl-facebook"></i></h1>
              </a>
              <a class="sosmed-link link-light" href="https://www.instagram.com/maspionsquare/" target="_blank">
                <h1><i class="bx bxl-instagram"></i></h1>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="footer" class="bg-dark text-light">
      <div class="container">
        <div class="row">
          <div class="col-md-3 p-5 text-center text-md-end">
            <div class="row">
              <img src="{{ url('storage//img/maspion-it.png') }}" alt="Logo Maspion Square" style="width: 100%">
            </div>
          </div>
          <div class="col-md-3 p-5">
            <h2><b>MASPION IT</b></h2>
            <p>Jl. A Yani 73 Surabaya<br>Jawa Timur<br>Indonesia</p>
          </div>
          <div class="col-md-6">
            <div class="mapouter">
              <div class="gmap_canvas">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3455866756326!2d112.73405591537862!3d-7.315019573958078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7fdf2efe39%3A0xcd78106814b4be1b!2sMaspion%20IT%20-%20Maspion%20Square!5e0!3m2!1sen!2sid!4v1617334370826!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="copyright">
      <div class="container pt-3">
        <div class="row">
          <div class="col-12 text-center">
            <p><b>Copyright © 2021 - MASPION IT</b></p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>