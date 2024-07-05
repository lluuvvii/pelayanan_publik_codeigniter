<h1>Data Layanan Publik</h1>
<form action="<?php echo base_url('layanan/search'); ?>" method="post">
    <input type="text" name="keyword" placeholder="Cari berdasarkan nama atau layanan" class="form-control" style="width: 300px; display: inline;">
    <button type="submit" class="btn btn-primary">Cari</button>
</form>
<br>
<a href="<?php echo base_url('layanan/create'); ?>" class="btn btn-primary">Tambah Data</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Layanan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($layanan) > 0): ?>
            <?php foreach ($layanan as $l): ?>
            <tr>
                <td><?php echo $l['id']; ?></td>
                <td><?php echo $l['nama']; ?></td>
                <td><?php echo $l['email']; ?></td>
                <td><?php echo $l['nomor_telepon']; ?></td>
                <td><?php echo $l['layanan']; ?></td>
                <td><?php echo $l['deskripsi']; ?></td>
                <td>
                    <a href="<?php echo base_url('layanan/edit/'.$l['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo base_url('layanan/delete/'.$l['id']); ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Tidak ada data ditemukan</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
