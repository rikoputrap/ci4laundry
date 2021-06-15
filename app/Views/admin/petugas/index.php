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
    <div class="col-6">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="h5 font-weight-bold text-primary">Tambah Petugas</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('/petugas/tambah') ?>">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Password">
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
    <div class="col-6">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="h5 font-weight-bold text-primary">Data Petugas</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th width="25%" class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($petugas as $p) : ?>
                                <tr>
                                    <td><?= $p['username'] ?></td>
                                    <td class="text-center">
                                        <a class=" btn btn-danger" href="<?= base_url('/petugas/hapus/' . $p['id']) ?>"><i class="fas fa-trash"></i></a>
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