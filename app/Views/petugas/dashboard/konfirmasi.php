<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Transaksi</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('/transaksi/tambah') ?>">
                    <input type="hidden" name="id_layanan" value="<?= $layanan['id'] ?>">
                    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id'] ?>">
                    <input type="hidden" name="id_user" value="<?= session()->user_id ?>">
                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label for="">INVOICE :</label>
                            <input name="invoice" class="form-control" type="text" value="<?= $invoice ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal :</label>
                            <input class="form-control" type="text" value="<?= $tanggal ?>" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-group w-50">
                            <div class="form-group">
                                <label for="">Nama Layanan :</label>
                                <input class="form-control" type="text" value="<?= $layanan['nama'] ?>" readonly>
                                <small class="form-text">Keterangan : <?= $layanan['keterangan'] ?></small>
                            </div>
                        </div>
                        <div class="form-group" style="width: 15%;">
                            <label for="">Jumlah :</label>
                            <input name="jumlah" id='jumlah' class="form-control" value="<?= $jumlah ?>" type="text" readonly>
                        </div>
                        <div class="form-group" style="width: 25%;">
                            <label for="">Total Bayar :</label>
                            <input name="total" class="form-control" value="<?= $layanan['harga'] * $jumlah ?>" type="text" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label for="">Nama Pelanggan :</label>
                            <input class="form-control" type="text" value="<?= $pelanggan['nama'] ?>" readonly>
                            <small class="form-text">Telepon : <?= $pelanggan['telepon'] ?></small>
                            <small class="form-text">Alamat : <?= $pelanggan['alamat'] ?></small>
                        </div>
                        <div class="form-group">
                            <label for="">Dilayani Oleh :</label>
                            <input class="form-control" type="text" placeholder="<?= session()->username ?>" readonly>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">
                    Buat Transaksi
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>