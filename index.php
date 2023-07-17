<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<?php include_once 'template/head.php' ?>

<body class="index-page bg-gray-200" id="ds-app">

  <div class="card card-body blur shadow-blur mx-3 mx-md-4 my-sm-2">
    
    <?php include_once 'template/main-app.php' ?>

    
    <div class="ds-modal-backdrop" v-if="showBackdrop"></div>
  </div>

  <?php include_once 'template/script.php' ?>

</body>