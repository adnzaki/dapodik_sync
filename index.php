<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Dapodik Sync
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <script src="./assets/vue.prod.js"></script>

</head>

<body class="index-page bg-gray-200">

  <div class="card card-body blur shadow-blur mx-3 mx-md-4 my-sm-2" id="ds-app">
    <section class="my-1 py-1">
      <div class="container">
        <div class="row">
          <div class="row justify-content-center text-center">
            <div class="col-lg-6">
              <span class="badge bg-primary mb-3">Actudent Utility Tool</span>
              <h2 class="text-dark mb-0">Dapodik Synchronizer v1.0</h2>
              <p class="lead">
                Silakan ikuti petunjuk penggunaan Dapodik Synchronizer untuk menarik data
                dari Web Service lokal Dapodik anda
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container" style="margin-top: -10px;">
        <div class="row">
          <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
            <!-- <h3 class="text-center">Form Koneksi Dapodik</h3> -->
            <form role="form" id="contact-form" autocomplete="off">
              <div class="card-body">
                <button type="button" style="color: white; margin-top: -20px;" class="btn bg-danger w-100 mb-4" v-if="hasError">
                  {{ errorText }}
                </button>
                <button type="button" style="color: white; margin-top: -20px;" class="btn bg-success w-100 mb-4" v-if="syncSuccess">
                  Sinkronisasi dengan Dapodik berhasil. Anda bisa menutup halaman ini sekarang.
                </button>
                <div class="mb-4">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">NPSN</label>
                    <input class="form-control" aria-label="NPSN Sekolah" type="text" v-model="npsn">
                  </div>
                </div>
                <div class="mb-4">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Token Akses Dapodik</label>
                    <input class="form-control" aria-label="Token Akses API Dapodik" type="text" v-model="token">
                  </div>
                </div>
                <div class="mb-4">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">URL Actudent Sekolah Anda</label>
                    <input class="form-control" aria-label="Token Akses API Actudent" type="text" v-model="domain">
                  </div>
                </div>
                <div class="mb-4">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Token Akses Actudent</label>
                    <input class="form-control" aria-label="Token Akses API Actudent" type="text" v-model="actudentToken">
                  </div>
                </div>
                <div class="mb-4">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="opsiPd" id="opsiPd1" value="pdBaru" checked>
                        <label class="form-check-label" for="opsiPd1">
                          Peserta Didik Baru
                        </label>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="opsiPd" value="semua" id="opsiPd2">
                        <label class="form-check-label" for="opsiPd2">
                          Semua Peserta Didik
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" style="color: white;" class="btn bg-info w-100"
                      :disabled="disable" 
                      @click="getPesertaDidik">
                      {{ submitText }}
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


  </div>

  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>

  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="./assets/js/plugins/countup.min.js"></script>
  <script src="./assets/js/plugins/choices.min.js"></script>
  <script src="./assets/js/plugins/prism.min.js"></script>
  <script src="./assets/js/plugins/highlight.min.js"></script>

  <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
  <script src="./assets/js/plugins/rellax.min.js"></script>

  <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
  <script src="./assets/js/plugins/tilt.min.js"></script>

  <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
  <script src="./assets/js/plugins/choices.min.js"></script>

  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="./assets/js/plugins/parallax.min.js"></script>

  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="./assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
  <script src="./assets/main.js"></script>

  <script type="text/javascript">

    if (document.getElementById('state1')) {
      const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('state2')) {
      const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
      if (!countUp1.error) {
        countUp1.start();
      } else {
        console.error(countUp1.error);
      }
    }
    if (document.getElementById('state3')) {
      const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
      if (!countUp2.error) {
        countUp2.start();
      } else {
        console.error(countUp2.error);
      };
    }
  </script>

</body>