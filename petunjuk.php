<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<?php include_once 'template/head.php' ?>

<body class="index-page bg-gray-200">

  <div class="card card-body blur shadow-blur mx-3 mx-md-4 my-sm-2 py-4 px-5" id="ds-app">
    <h2>Selamat Datang di Aplikasi Dapodik Puller</h2>
    <strong><?php for($i=0;$i<140;$i++) { echo '-'; } ?></strong>
    
    <?php include_once 'template/intro.php' ?>
    <?php include_once 'template/how-to-run.php' ?>
    <?php include_once 'template/about-data.php' ?>

  </div>

  <?php include_once 'template/script.php' ?>

</body>