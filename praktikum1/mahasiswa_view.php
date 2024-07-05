<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>Data Mahasiswa</title>
</head>

<body>
        <h1>Data Mahasiswa</h1>
        <form action="<?php echo base_url(''); ?>" method="get">
    <input type="text" required name="keyword" placeholder="Cari mahasiswa...">
    <select name="criteria">
        <option value="nama">Nama</option>
        <option value="npm">NPM</option>
        <option value="angkatan">Angkatan</option>
        <option value="kelas">Kelas</option>
        <option value="alamat">Alamat</option>
        <option value="mata_kuliah_favorit">Mata Kuliah Favorit</option>
    </select>
    <button type="submit">Cari</button>
    <button onclick="window.location.href='<?php echo base_url(''); ?>'" type="button">Reset</button>
</form>

        <table border="1">
                <thead>
                        <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Angkatan</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Mata Kuliah Favorit</th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($mahasiswa as $mhs): ?>
                                                <tr>
                                                        <td>
                                                                <?php echo $mhs['id']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $mhs['nama']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $mhs['npm']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $mhs['angkatan']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $mhs['kelas']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $mhs['alamat']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $mhs['mata_kuliah_favorit']; ?>
                                                        </td>
                                                </tr>
                        <?php endforeach; ?>
                </tbody>
        </table>
</body>

</html>