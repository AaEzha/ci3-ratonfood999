<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <?php foreach ($produk as $prdk) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $prdk->gambar ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?php echo $prdk->nama_produk ?></strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?php echo $prdk->keterangan ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><strong><?php echo $prdk->stok ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?php echo number_format($prdk->harga, 0, ',',  '.') ?></div>
                                    </strong></td>
                            </tr>
                        </table>
                        <?php echo anchor('dashboard/tambah_ke_keranjang/' . $prdk->ID_produk, '<div class="btn btn-sm btn-primary"> Add to Cart </div>') ?>
                        <?php echo anchor('admin/dashboard_admin/', '<div class="btn btn-sm btn-danger"> Back </div>') ?>
                    </div>

                <?php endforeach; ?>
                </div>
        </div>
    </div>
</div>