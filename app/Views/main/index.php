<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="col-md-12 mb-3">
                    <h3 class="text-center"><b>To Do List</b></h3>

                    <?php if (session()->get('pesan')) : ?>
                        <script>
                            Swal.fire({
                                title: "Berhasil!",
                                text: "<?= session()->getFlashdata('pesan'); ?>",
                                icon: "success"
                            });
                        </script>
                    <?php endif; ?>

                    <?php if (session()->get('error')) : ?>
                        <script>
                            Swal.fire({
                                title: "Oops...",
                                text: "<?= session()->getFlashdata('error'); ?>",
                                icon: "error",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Oke"
                            });
                        </script>
                    <?php endif; ?>

                    <!-- Search Field -->
                    <?= form_open('search'); ?>
                    <div class="mb-3 d-flex justify-content-end align-items-center flex-wrap">
                        <input type="text" id="nama" name="nama" class="form-control me-2" style="flex-grow: 1; max-width: 300px;" placeholder="Cari Dengan Nama...">
                        <button type="submit" class="btn btn-primary mt-2 mt-md-0" id="nama">Cari</button>
                    </div>
                    <?= form_close(); ?>

                    <div class="table-responsive overflow-visible">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Prioritas</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tenggat Waktu</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $warna_prioritas = [
                                    'Tinggi' => 'danger',
                                    'Sedang' => 'warning',
                                    'Rendah' => 'secondary'
                                ];
                                $warna_status = [
                                    'Selesai' => 'success',
                                    'Belum' => 'secondary'
                                ];
                                foreach ($note as $n) :
                                    $id_note = $n['id'];
                                ?>
                                    <tr class="text-center align-middle">
                                        <td><?= $n['nama']; ?></td>
                                        <td><?= $n['judul']; ?></td>
                                        <td><span class="badge text-<?= $warna_prioritas[$n['prioritas']] ?> bg-<?= $warna_prioritas[$n['prioritas']] ?>-subtle border border-<?= $warna_prioritas[$n['prioritas']] ?>-subtle"><?= $n['prioritas']; ?></span></td>
                                        <td><span class="badge text-<?= $warna_status[$n['status']] ?> bg-<?= $warna_status[$n['status']] ?>-subtle border border-<?= $warna_status[$n['status']] ?>-subtle"><?= $n['status']; ?></span></td>
                                        <td><?= formatTanggal($n['tenggat_waktu']); ?></td>
                                        <td>
                                            <div class="btn-group dropstart">
                                                <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-gear"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item btn-custom pointer" data-action="detail" href="<?= site_url('detail/' . $n['id']); ?>">Detail</a></li>
                                                    <li><a class="dropdown-item btn-custom pointer" data-action="edit" href="<?= site_url('edit/' . $n['id']); ?>">Edit</a></li>
                                                    <li><a class="dropdown-item btn-custom pointer" data-action="selesai" href="<?= site_url('selesai/' . $n['id']); ?>">Selesai</a></li>
                                                    <form action="/delete/<?= $n['id'] ?>" method="post" id="deleteForm<?= $n['id'] ?>">
                                                        <li>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="button" class="dropdown-item delete-btn btn-custom pointer" data-action="delete" data-id="<?= $n['id'] ?>">Hapus</button>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>