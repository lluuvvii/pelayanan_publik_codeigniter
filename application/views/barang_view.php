
<a href="<?= base_url('barang/create_barang'); ?>" class="btn btn-primary mb-3">Tambah Data Barang</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Deskripsi Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok Barang</th>
            <th>Supplier Barang</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang as $item): ?>
                <tr>
                    <td><?php echo $item->id_barang ?></td>
                    <td><?php echo $item->kode_barang ?></td>
                    <td><?php echo $item->nama_barang ?></td>
                    <td><?php echo $item->kategori_barang ?></td>
                    <td><?php echo $item->deskripsi_barang ?></td>
                    <td><?php echo $item->harga_beli ?></td>
                    <td><?php echo $item->harga_jual ?></td>
                    <td><?php echo $item->stok_barang ?></td>
                    <td><?php echo $item->supplier_barang ?></td>
                    <td><?php echo $item->tanggal_masuk ?></td>
                    <td>
                        <a href="<?= base_url('barang/edit_barang/' . $item->id_barang) ?>" class="btn btn-warning mb-3">Edit</a>
                        <a href="<?= base_url('barang/delete_barang/' . $item->id_barang); ?>" class="btn btn-primary mb-3" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Delete</a>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>
