<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Pelayanan Publik</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap.min.css'); ?>">
    <style>
  .title-font {
    font-family: 'Arial Black', sans-serif;
    font-size: 1.5rem;
    color: white;
  }
  .subtitle-font {
    font-family: 'Arial', sans-serif;
    font-size: 1rem;
    color: white;
  }
</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-primary bg-primary" data-bs-theme="dark">
  <div class="mx-2">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <span class="title-font">SIPP !!</span><br>
      <span class="subtitle-font">Sistem Informasi Pelayanan Publik</span>
    </a>
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
  </div>
</nav>
<div class="container">
  