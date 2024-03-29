<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Title Icon -->
  <link rel="icon" href="asset/img/icon-title.png">
  <title>Timbiebs</title>

  <!-- Poppin's Font -->
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;300;400;700;900&family=Poppins:wght@100;200;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="asset/css/style.css">

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- FancyBox -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
</head>

<body>
  <div class="shadow-sm bg-body rounded">
    <nav class="navbar navbar-expand-lg mt-1 ">
      <div class="container-fluid">
        <a class="mx-4" href="index.html">
          <img src="asset/img/logo.png" alt="logo" class="navbar-brand">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item me-4">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="models/page-event.php">All Event</a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="models/page-dashboard.php">Dashboard</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <section class="jumbotron">
    <div class="container">
      <div class="row" style="overflow: hidden;">
        <div class="col-lg-12" data-aos="fade-up" data-aos-duration="2000">
          <div class="jumbotron-content text-white">
            <h1 class="fw-bold">Timbiebs Let's Discover Your Event</h1>
            <p>Discover your live experience with independent music concerts, comedy, clubs, theater, festivals event at Timbiebs.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Jumbotron End -->

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <hr>
        <p>All Rights Reserved © 2022 (UAS Pemrograman Berbasis Website)</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true
    });
  </script>
  <script src="{{ url_for('static', filename='js/script.js') }}"></script>

</body>

</html>