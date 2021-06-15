<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>
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
                <h1 class="h5 font-weight-bold text-primary">Edit Layanan</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('/layanan/update') ?>">
                    <input type="hidden" name="id" value="<?= $layanan['id'] ?>">
                    <div class="form-group">
                        <input name="nama" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?= $layanan['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <input name="harga" type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="<?= $layanan['harga'] ?>">
                        <small class="form-text">contoh: 12ribu = 12000</small>
                    </div>
                    <div class="form-group">
                        <textarea name="keterangan" class="form-control form-control-user" id="exampleInputPassword" placeholder="<?= $layanan['keterangan'] ?>"></textarea>
                    </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="<?= base_url('/layanan') ?>" class="btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>