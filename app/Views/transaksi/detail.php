<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Invoice</td>
                                <td><?= $transaksi['invoice'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td><?= $transaksi['tanggal'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Layanan</td>
                                <td><?= $transaksi['layanan'] ?></td>
                            </tr>
                            <tr>
                                <td>Harga Layanan</td>
                                <td><?= $transaksi['harga_layanan'] ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan Layanan</td>
                                <td><?= $transaksi['keterangan_layanan'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td><?= $transaksi['jumlah'] ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><?= $transaksi['total'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td><?= $transaksi['pelanggan'] ?></td>
                            </tr>
                            <tr>
                                <td>Telepon Pelanggan</td>
                                <td><?= $transaksi['telepon_pelanggan'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Pelanggan</td>
                                <td><?= $transaksi['alamat_pelanggan'] ?></td>
                            </tr>
                            <tr>
                                <td>Dilayani Oleh</td>
                                <td><?= $transaksi['petugas'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>