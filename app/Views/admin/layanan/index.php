<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>
<?php if (session()->has('success')) : ?>
    <div class="alert alert-success"><?= session()->success ?></div>
<?php endif ?>
<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->errors as $e) : ?>
                <li><?= $e ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-4">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="h5 font-weight-bold text-primary">Tambah Layanan</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('/layanan/tambah') ?>">
                    <div class="form-group">
                        <input name="nama" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Layanan">
                    </div>
                    <div class="form-group">
                        <input name="harga" type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Harga">
                        <small class="form-text">harga per kg atau satuan; contoh: 12000 per kg</small>
                    </div>
                    <div class="form-group">
                        <textarea name="keterangan" class="form-control form-control-user" id="exampleInputPassword" placeholder="Keterangan"></textarea>
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
    <div class="col-8">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="h5 font-weight-bold text-primary">Data Layanan</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th width="25%">Keterangan</th>
                                <th width="25%" class="text-center" colspan="2">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($layanan as $l) : ?>
                                <tr>
                                    <td><?= $l['nama'] ?></td>
                                    <td><?= $l['harga'] ?></td>
                                    <td><?= $l['keterangan'] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url('/layanan/edit/' . $l['id']) ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a class=" btn btn-danger" href="<?= base_url('/layanan/hapus/' . $l['id']) ?>"><i class="fas fa-trash"></i></a>
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