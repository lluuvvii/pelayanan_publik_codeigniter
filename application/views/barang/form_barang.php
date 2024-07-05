<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
    <form action="<?= isset($barang) ? base_url('barang/edit_barang/' . $barang['id_barang']) : base_url('barang/create_barang'); ?>" method="post">
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" name="kode_barang" value="<?= set_value('kode_barang', isset($barang) ? $barang['kode_barang'] : ''); ?>">
                <?= form_error('kode_barang'); ?>
            </div>
            
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?= set_value('nama_barang', isset($barang) ? $barang['nama_barang'] : ''); ?>">
                <?= form_error('nama_barang'); ?>
            </div>
            
            <div class="form-group">
                <label for="kategori_barang">Kategori Barang</label>
                <input type="text" class="form-control" name="kategori_barang" value="<?= set_value('kategori_barang', isset($barang) ? $barang['kategori_barang'] : ''); ?>">
                <?= form_error('kategori_barang'); ?>
            </div>
            
            <div class="form-group">
                <label for="deskripsi_barang">Deskripsi Barang</label>
                <textarea class="form-control" name="deskripsi_barang"><?= set_value('deskripsi_barang', isset($barang) ? $barang['deskripsi_barang'] : ''); ?></textarea>
                <?= form_error('deskripsi_barang'); ?>
            </div>
            
            <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="text" class="form-control" name="harga_beli" value="<?= set_value('harga_beli', isset($barang) ? $barang['harga_beli'] : ''); ?>">
                <?= form_error('harga_beli'); ?>
            </div>
            
            <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" name="harga_jual" value="<?= set_value('harga_jual', isset($barang) ? $barang['harga_jual'] : ''); ?>">
                <?= form_error('harga_jual'); ?>
            </div>
            
            <div class="form-group">
                <label for="stok_barang">Stok Barang</label>
                <input type="text" class="form-control" name="stok_barang" value="<?= set_value('stok_barang', isset($barang) ? $barang['stok_barang'] : ''); ?>">
                <?= form_error('stok_barang'); ?>
            </div>
            
            <div class="form-group">
                <label for="supplier_barang">Supplier Barang</label>
                <input type="text" class="form-control" name="supplier_barang" value="<?= set_value('supplier_barang', isset($barang) ? $barang['supplier_barang'] : ''); ?>">
                <?= form_error('supplier_barang'); ?>
            </div>
            
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control" name="tanggal_masuk" value="<?= set_value('tanggal_masuk', isset($barang) ? $barang['tanggal_masuk'] : ''); ?>">
                <?= form_error('tanggal_masuk'); ?>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
