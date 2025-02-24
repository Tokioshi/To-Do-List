<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php $validation = session('validation') ?? \Config\Services::validation(); ?>
<main class="mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4"><b>Tambah To Do List</b></h3>
                <form class="mt-3" action="<?= ($opsi == 'update') ? "update/" . $dataNote['id'] : 'tambah/save' ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?: ($opsi === 'update' && isset($dataNote['nama']) ? $dataNote['nama'] : ''); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul') ?: ($opsi === 'update' && isset($dataNote['judul']) ? $dataNote['judul'] : ''); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi"><?= old('deskripsi') ?: ($opsi === 'update' && isset($dataNote['deskripsi']) ? $dataNote['deskripsi'] : ''); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>