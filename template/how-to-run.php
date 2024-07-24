<h3>2. Menjalankan Aplikasi</h3>
<div class="pl-25">
  <h4>a. Aktivasi Web Service Dapodik</h4>
  <ol>
    <li>
      Pastikan komputer/laptop telah terinstal aplikasi Dapodik
    </li>
    <li>
      Masuk ke menu Pengaturan di Dapodik, kemudian klik menu "Web Service"<br />
      <div class="row py-3">
        <div class="col-lg-6 col-12">
          <div class="card move-on-hover">
            <img class="w-100"
              src="./assets/img/custom/web-service-menu.png"
              alt="aboutus">
          </div>
        </div>
      </div>
    </li>
    <li>
      Tambahkan aplikasi dengan mengisikan nama serta IP Address. 
      Untuk Dapodik Puller, isilah IP Address dengan "localhost"
      <div class="row py-3">
        <div class="col-lg-6 col-12">
          <div class="card move-on-hover">
            <img class="w-100"
              src="./assets/img/custom/add-web-service.png"
              alt="aboutus">
          </div>
        </div>
      </div>
    </li>
  </ol>
  <h4>b. Instalasi Dapodik Puller</h4>
  <p>
    Terdapat 2 jenis file instalasi Dapodik Puller, 
    yaitu "Standalone" yang hanya berisi aplikasi Dapodik Puller, 
    dan "Full Installer" yang dibundle dengan aplikasi Xampp.
  </p>
  <p>
    Jika komputer anda telah terinstal aplikasi Xampp, 
    maka anda hanya tinggal menginstal versi "Standalone" di folder "htdocs". 
    Namun jika anda belum memiliki aplikasi Xampp, maka anda harus memilih versi "Full Installer". 
    Jika anda memilih versi "Full Installer", 
    pastikan untuk tidak menginstalnya di drive "C:\" karena akan membatasi beberapa fitur dari Xampp.
  </p>
  <h4>c. Membuka Aplikasi Dapodik Puller</h4>
  <p>
    Karena Dapodik Puller adalah aplikasi berbasis web, 
    maka anda hanya perlu mengetik URL-nya di web browser. 
    Silakan buka halaman "localhost/dapodik_sync" untuk membuka aplikasi Dapodik Puller.
  </p>
  <p>
    Setelah aplikasi terbuka, 
    pastikan anda membaca penjelasan tentang proses penarikan data melalui Dapodik Puller 
    agar anda tidak salah dalam memilih <a href="#penarikan-data">metode penarikan data.</a> 
  </p>
  <h4>d. Pengisian Form Dapodik Puller</h4>
  <p>
    Terdapat 7 kolom isian yang harus anda isi untuk menarik data dari Dapodik 
    seperti pada gambar berikut:
  </p>
  <div class="row py-3">
    <div class="col-lg-6 col-12">
      <div class="card move-on-hover">
        <img class="w-100"
          src="./assets/img/custom/form-dapodik-sync.png"
          alt="aboutus">
      </div>
    </div>
  </div>
  <ol class="py-3">
    <li>
      NPSN
      <p>
        Digunakan untuk mencari data sekolah dari database Dapodik. 
        Hal ini karena Dapodik dapat diregistrasikan untuk lebih dari satu sekolah dalam satu komputer.
      </p>
    </li>
    <li>
      Token Akses Dapodik
      <p>
        Token ini digunakan untuk proses autentikasi pengguna Dapodik
        sehingga anda tidak perlu login terlebih dahulu untuk menarik data dari Dapodik.
        Token akses ini bisa anda dapatkan di halaman Pengaturan Web Service Dapodik.
      </p>
    </li>
    <li>
      URL Actudent Sekolah Anda
      <p>
        Ini adalah URL yang anda gunakan untuk membuka layanan Actudent sekolah anda, misalnya
        "smkn999kotabekasi.actudent.com". Anda tidak perlu menambahkan protokol "http"
        atau "https" untuk mengisi ini.
      </p>
    </li>
    <li>
      Token Akses Actudent
      <p>
        Token ini bisa anda dapatkan pada aplikasi Actudent di halaman pengaturan aplikasi.
        Token ini hanya diperuntukkan khusus untuk admin utama Actudent.
      </p>
    </li>
    <li>
      Tingkat Pendidikan
      <p>
        Opsi tingkat pendidikan digunakan untuk menentukan peserta didik baru, yakni tingkat 1 untuk SD/sederajat, 
        7 untuk SMP/sederajat dan 10 untuk SMA/sederajat. Salah memilih tingkat pendidikan dapat menyebabkan
        Sync API tidak dapat membaca peserta didik baru yang ada di Dapodik.
      </p>
    </li>
    <li>
      Metode Penarikan Data
      <p>
        Silakan baca di halaman <strong><a href="#penarikan-data">"Petunjuk Penarikan Data"</a></strong> untuk memahami metode ini.
      </p>
    </li>
    <li>
      Opsi Impor Data PTK
      <p>
        Anda dapat memilih apakah akan mengimpor data PTK atau tidak. Di versi terbaru, Dapodik Puller telah mendukung sepenuhnya pengecekan duplikasi data PTK. Maka dari itu PTK yang sudah ada di Actudent tidak akan diimpor kembali meskipun pengguna memilih opsi untuk impor data PTK.
      </p>
    </li>
  </ol>
</div>