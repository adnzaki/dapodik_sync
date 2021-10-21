<section class="my-1 py-1">
      <div class="container">
        <div class="row">
          <div class="row justify-content-center text-center">
            <div class="col-lg-6">
              <span class="badge bg-primary mb-3">Actudent Utility Tool</span>
              <h2 class="text-dark mb-0">Dapodik Synchronizer v1.0</h2>
              <p class="lead">
                Silakan ikuti <strong>
                  <a :href="appHost + '/dapodik_sync/petunjuk.php'">
                    petunjuk penggunaan 
                  </a></strong>
                  Dapodik Synchronizer untuk menarik data
                dari Web Service lokal Dapodik anda
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container" style="margin-top: -10px;">
        <div class="row mt-3">
          <div class="col-sm-4 col-6 mx-auto">

            <!-- Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penarikan Data Selesai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <ul>
                      <li v-for="(item, index) in successText" :key="index">{{ item }}</li>
                    </ul>
                  </div>
                  <div class="modal-footer justify-content-right">
                    <!-- <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
            <!-- <h3 class="text-center">Form Koneksi Dapodik</h3> -->
            <form role="form" id="contact-form" autocomplete="off">
              <div class="card-body">
                <button type="button" style="color: white; margin-top: -20px;" class="btn bg-danger w-100 mb-4"
                  v-if="hasError">
                  {{ errorText }}
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
                    <input class="form-control" aria-label="Token Akses API Actudent" type="text"
                      v-model="actudentToken">
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label">Metode Penarikan</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="opsiPd" id="opsiPd1" value="pdBaru" checked>
                    <label class="form-check-label" for="opsiPd1">
                      Peserta Didik Baru
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="opsiPd" value="semua" id="opsiPd2">
                    <label class="form-check-label" for="opsiPd2">
                      Semua Peserta Didik
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="opsiPd" value="pindahan" id="opsiPd3">
                    <label class="form-check-label" for="opsiPd3">
                      Peserta Didik Pindahan
                    </label>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" style="color: white;" class="btn bg-gradient-info w-100" :disabled="disable"
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