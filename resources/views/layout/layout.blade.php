<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Dern-Support
  </title>


  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href=" {{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href=" {{ url("assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="  {{ url("assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href=" {{ url("assets/css/soft-ui-dashboard.css?v=1.0.7") }}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<body>

  <div class="navbar navbar-expand-md bg-body-tertiary fixed-top bg-opacity-75" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand " href="/dashboard">Dern-Support</a>
      <!-- <a class="navbar-brand text-uppercase fw-bold" href="index.html"> <span class="text-warning">John</span> <span class="text-danger">Risk</span></a> -->
      <button class="navbar-toggler text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>      </button>
      <div class="navbar-collapse collapse hide" id="navbarSupportedContent" >
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/dashboard">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("service1") }}">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#Request">Your Request</a>
          </li>

          <li class="nav-item d-flex align-items-center">
            <a href="/logout" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Logout</span>
            </a>
          </li>


        </ul>

      </div>
    </div>
</div>
</body>
<script src=" {{ asset("js/bootstrap.min.js") }}"></script>
<script src=" {{ asset("js/core/bootstrap.bundle.min.js") }}"></script>

</html>