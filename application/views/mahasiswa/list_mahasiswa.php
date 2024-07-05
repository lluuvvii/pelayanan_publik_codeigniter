<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Mahasiswa</title>
<style>
body {
font-family: Arial, sans-serif;
background-color: #f2f2f2;
}
h2 {
text-align: center;
margin-bottom: 20px;
color: #333;
}
table {
width: 100%;
border-collapse: collapse;
margin: 0 auto;
background-color: #fff;
}
th,
td {
border: 1px solid #ddd;
padding: 12px;
text-align: left;
}
th {
background-color: #f2f2f2;
}
tr:nth-child(even) {
background-color: #f9f9f9;
}
tr:hover {
background-color: #f2f2f2;
}
input[type="text"] {
padding: 10px;
margin-bottom: 10px;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
width: 250px;
}
button {
background-color: #4CAF50;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
margin-left: 10px;

}
button:hover {
background-color: #45a049;
}
.button-container {
text-align: center;
margin-bottom: 20px;
}
</style>
</head>
<body>
<h2>Data Mahasiswa</h2>
<div class="button-container">
<form action="<?php echo site_url('mahasiswa/search_mahasiswa'); ?>"
method="post">
<input type="text" name="keyword" placeholder="Cari Nama Mahasiswa">
<button type="submit">Cari</button>
<button onclick="window.location.href='<?php echo
  base_url('mahasiswa/data_mahasiswa'); ?>'" type="button">Reset</button>
</form>
</div>
<table>
<tr>
<th>ID</th>
<th>Nama</th>
<th>NPM</th>
<th>Angkatan</th>
<th>Kelas</th>
<th>Alamat</th>
<th>Mata Kuliah Favorit</th>
<th>Email</th>
<th>Jenis Kelamin</th>
<th>Tanggal Lahir</th>
</tr>
<?php foreach ($mahasiswa as $mhs) { ?>
  <tr>
  <td><?php echo $mhs['id']; ?></td>
  <td><?php echo $mhs['nama']; ?></td>
  <td><?php echo $mhs['npm']; ?></td>
  <td><?php echo $mhs['angkatan']; ?></td>
  <td><?php echo $mhs['kelas']; ?></td>
  <td><?php echo $mhs['alamat']; ?></td>
  <td><?php echo $mhs['mata_kuliah_favorit']; ?></td>
  <td><?php echo $mhs['email']; ?></td>
  <td><?php echo $mhs['jenis_kelamin']; ?></td>
  <td><?php echo $mhs['tanggal_lahir']; ?></td>
  </tr>
<?php } ?>
</table>
</body>
</html> -->

<div class="card border border-primary">
<div class="card-header bg-primary text-white">List Data
Mahasiswa</div>
<div class="card-body">
<div class="button-container">
<form action="<?php echo
  site_url('mahasiswa/search_mahasiswa'); ?>" method="post">
<div class="row">
<div class="col-md-10 col-sm-8">
<input class="form-control" type="text"
value="<?php echo isset($keyword) ? $keyword : ''; ?>" name="keyword"
placeholder="Cari Nama Mahasiswa">
</div>
<div class="col-md-1 col-sm-2">

<button class="btn btn-primary mt-2 btn-
block" type="submit">Cari</button>

</div>
<div class="col-md-1 col-sm-2">

<button class="btn btn-success mt-2 btn-
block"

onclick="window.location.href='<?php echo
  base_url('mahasiswa/data_mahasiswa'); ?>'"
type="button">Reset</button>
</div>
</div>
</form>
<button class="btn btn-primary mt-2"
onclick="window.location.href='<?php echo
  base_url('mahasiswa/create_mahasiswa'); ?>'">Tambah
Mahasiswa</button>
</div>
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success mt-3" role="alert">
  <?php echo $this->session->flashdata('success'); ?>
  </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger mt-3" role="alert">
  <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php endif; ?>
<div class="table-responsive">
<table class="table table-bordered table-hover mt-3">
<thead>
<tr class="table-primary">
<th class="text-center">ID</th>
<th class="text-center">Nama</th>
<th class="text-center">NPM</th>
<th class="text-center">Angkatan</th>
<th class="text-center">Kelas</th>
<th class="text-center">Alamat</th>
<th class="text-center">Mata Kuliah

Favorit</th>
<th class="text-center">Email</th>
<th class="text-center">Jenis Kelamin</th>
<th class="text-center">Tanggal Lahir</th>
<th class="text-center">Aksi</th>
</tr>
</thead>
<?php foreach ($mahasiswa as $mhs) { ?>
  <tbody>
  <tr>
  <td><?php echo $mhs['id']; ?></td>
  <td><?php echo $mhs['nama']; ?></td>
  <td><?php echo $mhs['npm']; ?></td>
  <td><?php echo $mhs['angkatan']; ?></td>
  <td><?php echo $mhs['kelas']; ?></td>
  <td><?php echo $mhs['alamat']; ?></td>
  <td><?php echo $mhs['mata_kuliah_favorit'];
  ?></td>
  <td><?php echo $mhs['email']; ?></td>
  <td><?php echo $mhs['jenis_kelamin']; ?></td>
  <td><?php echo $mhs['tanggal_lahir']; ?></td>
  <td>
  <a href="<?php echo
    site_url('mahasiswa/edit_mahasiswa/' . $mhs['id']); ?>" class="btn
btn-warning btn-sm">Edit</a>
  <a href="<?php echo
    site_url('mahasiswa/delete_mahasiswa/' . $mhs['id']); ?>" class="btn
btn-danger btn-sm"
  onclick="return confirm('Apakah Anda
yakin ingin menghapus data ini?')">Delete</a>
  </td>
  </tr>
  </tbody>
<?php } ?>
</table>
</div>
</div>
</div>