<div class="container fluid">
    <h4>Detail Belanja</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub-Total</th>
        </tr>
        <?php
        $no = 1;
		$total = 0;
        foreach ($data as $item) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?= $item->nama_produk ;?></td>
				<td>Rp<?= number_format($item->harga, 0, ',',  '.') ;?></td>
				<td><?= number_format($item->jumlah, 0, ',',  '.') ;?></td>
				<td>Rp<?= number_format($item->jumlah * $item->harga, 0, ',',  '.') ;?></td>
            </tr>

        <?php $total += $item->jumlah * $item->harga; endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td align="right">Rp<?php echo number_format($total, 0, ',',  '.') ?></td>
        </tr>
    </table>
	<h4>Detail Invoice</h4>
	<div class="card">
		<div class="card-header">
			ID Invoice # <?= $invoice->ID_invoice ;?>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">Nama</div>
				<div class="col-md-9">: <?= $invoice->nama ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Alamat</div>
				<div class="col-md-9">: <?= $invoice->alamat ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Tanggal Pesan</div>
				<div class="col-md-9">: <?= $invoice->tgl_pesan ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Batas Bayar</div>
				<div class="col-md-9">: <?= $invoice->batas_bayar ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Total Bayar</div>
				<div class="col-md-9">: Rp<?= number_format($invoice->total_bayar, 0, ',',  '.') ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Status Bayar</div>
				<div class="col-md-9">: <?= $invoice->status_bayar ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Bukti Bayar</div>
				<div class="col-md-9">: <?= $invoice->bukti_bayar ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Atas Nama</div>
				<div class="col-md-9">: <?= $invoice->atas_nama ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Nama Bank</div>
				<div class="col-md-9">: <?= $invoice->nama_bank ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">No Rekening</div>
				<div class="col-md-9">: <?= $invoice->no_rek ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Status Order</div>
				<div class="col-md-9">: <?= $invoice->status_order ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">No Resi</div>
				<div class="col-md-9">: <?= $invoice->no_resi ;?></div>
			</div>
			<div class="row">
				<div class="col-md-3">Ekspedisi</div>
				<div class="col-md-9">: <?= $invoice->ekspedisi ;?></div>
			</div>
		</div>
	</div>
</div>
