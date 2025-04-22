<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php $validation = session('validation') ?? \Config\Services::validation(); ?>
<main class="mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4"><b><?= ($opsi == 'update') ? "Edit"  : 'Tambah' ?> To Do List</b></h3>
                <form class="mt-3" action="<?= ($opsi == 'update') ? "update/" . $dataNote['id'] : 'tambah/save' ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?: ($opsi === 'update' && isset($dataNote['nama']) ? $dataNote['nama'] : ''); ?>" autofocus>
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
                        <label for="prioritas" class="form-label">Prioritas</label>
                        <select id="prioritas" name="prioritas" class="form-control <?= ($validation->hasError('prioritas')) ? 'is-invalid' : ''; ?>">
                            <option disabled selected <?= (old('prioritas') || ($opsi === 'update' && isset($dataNote['prioritas']))) ? '' : 'selected' ?>>--Pilih--</option>
                            <option value="Tinggi" <?= (old('prioritas') == 'Tinggi' || ($opsi === 'update' && isset($dataNote['prioritas']) && $dataNote['prioritas'] == 'Tinggi')) ? 'selected' : ''; ?>>Tinggi</option>
                            <option value="Sedang" <?= (old('prioritas') == 'Sedang' || ($opsi === 'update' && isset($dataNote['prioritas']) && $dataNote['prioritas'] == 'Sedang')) ? 'selected' : ''; ?>>Sedang</option>
                            <option value="Rendah" <?= (old('prioritas') == 'Rendah' || ($opsi === 'update' && isset($dataNote['prioritas']) && $dataNote['prioritas'] == 'Rendah')) ? 'selected' : ''; ?>>Rendah</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('prioritas'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tenggat_waktu" class="form-label">Tenggat Waktu</label>
                        <input type="date" id="tenggat_waktu" name="tenggat_waktu" class="form-control <?= ($validation->hasError('tenggat_waktu')) ? 'is-invalid' : ''; ?>" value="<?= old('tenggat_waktu') ?: ($opsi === 'update' && isset($dataNote['tenggat_waktu']) ? $dataNote['tenggat_waktu'] : ''); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tenggat_waktu'); ?>
                        </div>
                    </div>
                    <?php if ($opsi == 'update') : ?>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>">
                                <option disabled selected <?= (old('status') || ($opsi === 'update' && isset($dataNote['status']))) ? '' : 'selected' ?>>--Pilih--</option>
                                <option value="Selesai" <?= (old('status') == 'Selesai' || ($opsi === 'update' && isset($dataNote['status']) && $dataNote['status'] == 'Selesai')) ? 'selected' : ''; ?>>Selesai</option>
                                <option value="Belum" <?= (old('status') == 'Belum' || ($opsi === 'update' && isset($dataNote['status']) && $dataNote['status'] == 'Belum')) ? 'selected' : ''; ?>>Belum</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('status'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
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