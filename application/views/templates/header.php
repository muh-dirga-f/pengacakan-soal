<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= ucwords((isset($judul)) ? $judul : $navbar) ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= asset_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= asset_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript-->
  <script src="<?= asset_url() ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= asset_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

  <!-- Firebase -->
  <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
  <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
  <script defer src="<?= asset_url() ?>/js/init-firebase.js"></script>

</head>

<body id="page-top">