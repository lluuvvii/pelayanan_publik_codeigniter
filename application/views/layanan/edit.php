<h1>Edit Data Layanan Publik</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('layanan/edit/'.$layanan['id']); ?>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $layanan['nama']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $layanan['email']; ?>">
    </div>
    <div class="form-group">
        <label for="nomor_telepon">Nomor Telepon</label>
        <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" value="<?php echo $layanan['nomor_telepon']; ?>">
    </div>
    <div class="form-group">
        <label for="layanan">Layanan</label>
        <input type="text" class="form-control" name="layanan" id="layanan" value="<?php echo $layanan['layanan']; ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo $layanan['deskripsi']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary my-2">Update</button>
<?php echo form_close(); ?>
