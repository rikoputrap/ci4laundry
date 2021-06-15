<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseTambahTransaksi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTambahTransaksi">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseTambahTransaksi">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('/konfirmasi') ?>">
                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <label for="">INVOICE :</label>
                                <input class="form-control" type="text" value="<?= $invoice ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal :</label>
                                <input class="form-control" type="text" value="<?= $tanggal ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-50">
                                <label for="">Nama Layanan :</label>
                                <select name="layanan" id="layananSelect" class="form-control" id="exampleFormControlSelect1">
                                    <option selected></option>
                                    <?php foreach ($layanan as $l) : ?>
                                        <option value="<?= $l['id'] ?>"><?= $l['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text"></small>
                            </div>
                            <div class="form-group w-25">
                                <label for="">Jumlah :</label>
                                <input name="jumlah" id='jumlah' class="form-control" value="1" type="text" readonly>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="tambah" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="btn btn-sm btn-danger">
                                    <i id="kurang" class="fas fa-minus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-50">
                                <label for="">Nama Pelanggan</label>
                                <select name="pelanggan" class="form-control" id="exampleFormControlSelect1">
                                    <option selected></option>
                                    <?php foreach ($pelanggan as $p) : ?>
                                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text">Pilih umum jika tidak ingin menambahkan pelanggan baru</small>
                            </div>
                            <div class="form-group">
                                <label for="">Dilayani Oleh :</label>
                                <input class="form-control" type="text" placeholder="<?= session()->username ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transaksiModal">
                                Detail Layanan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="transaksiModalLabel">Detail Layanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Harga</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($layanan as $l) : ?>
                                                            <tr>
                                                                <td><?= $l['nama'] ?></td>
                                                                <td><?= $l['harga'] ?></td>
                                                                <td><?= $l['keterangan'] ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('/pelanggan') ?>" class="btn btn-success">Tambah Pelanggan</a>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-block">
                        Tambah
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseTransaksi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTransaksi">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseTransaksi">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                hari ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $pemasukan_hariini ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-left-warning shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                total</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $pemasukan_total ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card border-left-warning shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                dalam proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $selesai ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <a href="#transaksiSelesai" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="transaksiSelesai">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Selesai (Hari Ini)</h6>
            </a>
            <div class="collapse show" id="transaksiSelesai">
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
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi_selesai as $ts) : ?>
                                    <tr>
                                        <td><?= $ts['invoice'] ?></td>
                                        <td><?= $ts['tanggal'] ?></td>
                                        <td><?= $ts['layanan'] ?></td>
                                        <td><?= $ts['jumlah'] ?></td>
                                        <td><?= $ts['total'] ?></td>
                                        <td><?= $ts['pelanggan'] ?></td>
                                        <td><?= $ts['petugas'] ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="<?= base_url('/transaksi/detail/' . $ts['id']) ?>"><i class="fas fa-info"></i></a>
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
</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Belum Selesai (Hari Ini)</h6>
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
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi_proses as $tp) : ?>
                                <tr>
                                    <td><?= $tp['invoice'] ?></td>
                                    <td><?= $tp['tanggal'] ?></td>
                                    <td><?= $tp['layanan'] ?></td>
                                    <td><?= $tp['jumlah'] ?></td>
                                    <td><?= $tp['total'] ?></td>
                                    <td><?= $tp['pelanggan'] ?></td>
                                    <td><?= $tp['petugas'] ?></td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog fa-sm fa-fw"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Opsi</div>
                                                <a class="dropdown-item" href="<?= base_url('/transaksi/selesai/' . $tp['id']) ?>">Selesai</a>
                                                <a class="dropdown-item" href="<?= base_url('/transaksi/detail/' . $tp['id']) ?>">Detail</a>
                                                <a class="dropdown-item" href="<?= base_url('/transaksi/hapus/' . $tp['id']) ?>">Hapus</a>
                                            </div>
                                        </div>
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

<?= $this->section("scripts") ?>
<script type="text/javascript">
    $(window).ready(function() {
        $('div#transaksiSelesai').removeClass('show')
        $('#tambah').on('click', function() {
            var jumlah = $('#jumlah')
            var plus = jumlah.val()
            plus++
            jumlah.val(plus)
        })
        $('#kurang').on('click', function() {
            var jumlah = $('#jumlah')
            var min = jumlah.val()
            if (min <= 1) {
                $('#kurang').prop('disabled', true)
            } else {
                min--
                jumlah.val(min)
            }
        })
    })
</script>
<?= $this->endSection() ?>