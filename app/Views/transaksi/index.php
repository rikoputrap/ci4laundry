<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Tanggal</th>
                                <th>Nama Layanan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Pelanggan</th>
                                <th>Petugas</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi as $t) : ?>
                                <tr>
                                    <td><?= $t['invoice'] ?></td>
                                    <td><?= $t['tanggal'] ?></td>
                                    <td><?= $t['layanan'] ?></td>
                                    <td><?= $t['jumlah'] ?></td>
                                    <td><?= $t['total'] ?></td>
                                    <td><?= $t['pelanggan'] ?></td>
                                    <td><?= $t['petugas'] ?></td>
                                    <td>
                                        <div class="btn <?= !$t['status'] ? 'btn-warning' : 'btn-success' ?>"><?= !$t['status'] ? 'Proses' : 'Selesai' ?></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="<?= base_url('/transaksi/detail/' . $t['id']) ?>"><i class="fas fa-info"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>