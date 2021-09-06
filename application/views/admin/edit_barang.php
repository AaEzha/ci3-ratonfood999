<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>
    <?php foreach ($produk as $prdk) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/data_barang/update' ?>">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_produk" class="form-control" value="<?php echo $prdk->nama_produk ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="hidden" name="ID_produk" class="form-control" value="<?php echo $prdk->ID_produk ?>">
                <input type="text" name="keterangan" class="form-control" value="<?php echo $prdk->keterangan ?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $prdk->harga ?>">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $prdk->stok ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>