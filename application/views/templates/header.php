<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Pelayanan Publik</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap.min.css'); ?>">
    <!-- jQuery diperlukan oleh Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-primary bg-primary" data-bs-theme="dark">
  <div class="mx-2">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Sistem Informasi Pelayanan Publik</a>
  </div>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('layanan'); ?>">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('layanan/create'); ?>">Tambah Data</a>
          </li>
      </ul>
      <div data-bs-theme="light">
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('layanan'); ?>" method="get">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Cari..." aria-label="Search">
          </li>
          <li class="nav-item">
            <button class="btn btn-success my-2 my-sm-0 mx-2" type="submit">Cari</button>
          </li>
        </ul>
        </form>
      </div>
  </div>
</nav>
<div class="container">
  