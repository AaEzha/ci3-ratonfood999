<div class="container fluid">
    <h4>Belum Dibayar</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#ID</th>
            <th>Nama</th>
            <th>Tanggal Pesan</th>
            <th>Sub-Total</th>
            <th>Batas Pembayaran</th>
			<th>Detail</th>
        </tr>
        <?php
        $no = 1;
        foreach ($belum_bayar as $item) : ?>
            <tr>
				<td><?= $item->ID_invoice ;?></td>
				<td><?= $item->nama ;?></td>
				<td><?= $item->tgl_pesan ;?></td>
				<td align="right">Rp. <?php echo number_format($item->total_bayar, 0, ',',  '.') ?></td>
				<td><?= $item->batas_bayar ;?></td>
				<td><a href="<?= base_url('pesanan_saya/detail/'. $item->ID_invoice) ;?>" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>

        <?php endforeach; ?>
    </table>

    <h4>Diproses</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#ID</th>
            <th>Nama</th>
            <th>Tanggal Pesan</th>
            <th>Sub-Total</th>
			<th>Detail</th>
        </tr>
        <?php
        $no = 1;
        foreach ($diproses as $item) : ?>
            <tr>
				<td><?= $item->ID_invoice ;?></td>
				<td><?= $item->nama ;?></td>
				<td><?= $item->tgl_pesan ;?></td>
				<td align="right">Rp. <?php echo number_format($item->total_bayar, 0, ',',  '.') ?></td>
				<td><a href="#" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>

        <?php endforeach; ?>
    </table>

    <h4>Dikirim</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#ID</th>
            <th>Nama</th>
            <th>Tanggal Pesan</th>
            <th>Sub-Total</th>
			<th>Detail</th>
        </tr>
        <?php
        $no = 1;
        foreach ($dikirim as $item) : ?>
            <tr>
				<td><?= $item->ID_invoice ;?></td>
				<td><?= $item->nama ;?></td>
				<td><?= $item->tgl_pesan ;?></td>
				<td align="right">Rp. <?php echo number_format($item->total_bayar, 0, ',',  '.') ?></td>
				<td><a href="#" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>

        <?php endforeach; ?>
    </table>

    <h4>Selesai</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#ID</th>
            <th>Nama</th>
            <th>Tanggal Pesan</th>
            <th>Sub-Total</th>
			<th>Detail</th>
        </tr>
        <?php
        $no = 1;
        foreach ($selesai as $item) : ?>
            <tr>
				<td><?= $item->ID_invoice ;?></td>
				<td><?= $item->nama ;?></td>
				<td><?= $item->tgl_pesan ;?></td>
				<td align="right">Rp. <?php echo number_format($item->total_bayar, 0, ',',  '.') ?></td>
				<td><a href="#" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>
