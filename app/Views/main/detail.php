<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4"><b>Detail <?= $dataNote['judul']; ?></b></h3>
                <div class="mt-3">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $dataNote['nama']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" value="<?= $dataNote['judul']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="prioritas" class="form-label">Prioritas</label>
                        <input type="text" class="form-control" id="prioritas" value="<?= $dataNote['prioritas']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tenggat_waktu" class="form-label">Tenggat Waktu</label>
                        <input type="text" class="form-control" id="tenggat_waktu" value="<?= formatTanggal($dataNote['tenggat_waktu']) ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                        <input type="text" class="form-control" id="tanggal_dibuat" value="<?= formatTanggal($dataNote['tanggal_dibuat']) ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" value="<?= $dataNote['status']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" disabled><?= $dataNote['deskripsi']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>