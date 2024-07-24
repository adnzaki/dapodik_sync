<h3 id="penarikan-data">3. Penarikan Data</h3>
<div class="pl-25">
  <h4>a. Peserta Didik Baru</h4>
  <p>
    Dengan metode ini, sistem akan mengimpor peserta didik baru di tingkat awal (tingkat I untuk SD, VII untuk SMP dan X untuk SMK). 
    Sistem akan secara otomatis menambahkan peserta didik baru tersebut ke rombelnya masing-masing 
    sesuai dengan yang ada di Dapodik. 
  </p>
  <h4>b. Semua Peserta Didik</h4>
  <p>
    Metode ini ditujukan untuk sekolah yang <strong>baru pertama kali menggunakan Actudent. </strong>
    Dengan metode ini, sistem akan mengimpor seluruh data peserta didik dari tingkat awal sampai akhir 
    serta memasukkan mereka ke rombelnya masing-masing secara otomatis sesuai 
    dengan data yang ada pada Dapodik. <br>
    Perlu dicatat bahwa jika sekolah telah memiliki data siswa pada aplikasi Actudent, 
    Dapodik Puller tidak akan mengimpor siswa yang memiliki nama dan nomor induk sekolah (NIS) yang sama, 
    serta <strong>tidak akan memetakan rombel siswa yang telah ada di Actudent</strong>.
    Untuk memetakan rombel siswa yang telah ada di Actudent, sekolah harus menginputnya secara manual di Actudent.
  </p>
  <h4>c. Pindahan</h4>
  <p>
    Metode ini ditujukan untuk menarik peserta didik pindahan dari Dapodik yang belum masuk ke database Actudent. 
    Metode ini tidak akan mengimpor data rombel serta tidak akan memasukkan peserta didik pindahan tersebut secara otomatis ke dalam rombel. 
    Pengguna harus memasukkan peserta didik tersebut secara manual dari dalam aplikasi Actudent.
  </p>
  <p>
    Dapodik Puller dapat mendeteksi adanya duplikasi data, sehingga setiap data peserta didik, orang tua, PTK dan rombel 
    yang masuk ke Actudent bisa dipastikan sama dengan yang ada di Dapodik. 
  </p>
</div>

<h3>4. Penjelasan Tentang Data PTK</h3>
<div class="pl-25">
  <h4>a. Nomor Induk Pegawai</h4>
  <p>
    Sistem mengklasifikasikan nomor induk pegawai berdasarkan masing-masing jenis pegawai.
    Untuk PNS/PPPK akan diambil dari NIP-nya dan Non-PNS akan diambil dari NIK.
    Jika NIK pegawai tersebut belum diisi di Dapodik, maka sistem akan mengosongkannya.
  </p>
  <h4>b. Jabatan</h4>
  <p>
    Jabatan pegawai diambil dari jenis PTK di Dapodik, 
    seperti Guru Kelas, Guru Mapel, Tenaga Administrasi Sekolah, Kepala Sekolah dan sebagainya.
  </p>
  <h4>c. Jenis Pegawai</h4>
  <p>
    Jenis pegawai akan diambil dari klasifikasi jenis PTK yang ada di Dapodik. 
    Misalnya Guru Kelas dan Guru Mapel akan dimasukkan jenis pegawai sebagai Guru di Actudent.
  </p>
  
</div>

<h3>5. Tentang Penarikan Data Rombel</h3>
<div class="pl-25">
  <p>
    Dapodik Puller memiliki keterbatasan dalam penarikan data rombel. 
    Berikut beberapa kondisi yang dapat menyebabkan keterbatasan saat penarikan data:
    <ol>
      <li>
        <h6>Data Pegawai Sudah Ada</h6>
        <p>Jika data pegawai sudah terinput di Actudent, maka Dapodik Puller akan memilih salah satu guru
        untuk dijadikan wali kelas pada semua rombel yang baru ditarik.
        Sekolah dapat mengganti wali kelas bawaan tersebut sesuai dengan kondisi sekolah melalui aplikasi Actudent.</p>
      </li>
      <li>
        <h6>Data Siswa Sudah Ada</h6>
        <p>Dapodik Puller tidak dapat memasukkan siswa yang sudah ada di Actudent ke dalam rombel yang baru ditarik dari Dapodik,
          maka itu sekolah harus menginput siswa tersebut secara manual dari Actudent.</p>
      </li>
    </ol>
    
  </p>
  <h6>Apa yang menyebabkan keterbatasan tersebut?</h6>
  <p>
    Keterbatasan saat penarikan data (selain karena beberapa kondisi yang disebutkan sebelumnya) secara teknis
    dikarenakan adanya perbedaan sistem ID unik pada aplikasi Actudent dan Dapodik, karena pada dasarnya 
    Actudent adalah sistem tersendiri yang tidak bergantung pada Dapodik dalam penginputan data. <br>
    Inilah yang menyebabkan Actudent tidak dapat mengimpor data secara lengkap seperti halnya aplikasi E-Rapor
    yang memang bergantung sepenuhnya pada Dapodik untuk penginputan datanya.
  </p>
  
</div>

<h3>6. Keterbatasan Aplikasi</h3>
<div class="pl-25">
  <ol>
    <li>
      Aplikasi ini hanya dapat digunakan untuk menambahkan data dari Dapodik, 
      <strong>BUKAN</strong> untuk memperbarui perubahan data, baik itu data peserta didik, orang tua, PTK maupun rombel.
    </li>
    <li>
      Dikarenakan Dapodik tidak memberi akses untuk data nomor KK, 
      maka sistem akan menggantinya dengan NIK peserta didik untuk data orang tua. 
      Anda bisa mengganti data ini pada aplikasi Actudent nantinya.
    </li>
  </ol>
  <div class="row text-center py-3 mt-3">
    <div class="col-12 mx-auto">
      <a href="#perkenalan" type="button" class="btn bg-gradient-primary w-auto me-2">Kembali ke Awal</a>
      <a :href="appHost + '/dapodik_sync'" type="button" class="btn bg-gradient-info w-auto me-2">Masuk Aplikasi</a>
    </div>
  </div>
</div>