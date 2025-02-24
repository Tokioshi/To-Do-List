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
                    <div class="mb-3 d-flex justify-content-end">
                        <input type="text" id="nama" name="nama" class="form-control me-2 w-25" placeholder="Cari Dengan Nama...">
                        <button type="submit" class="btn btn-primary" id="nama">Cari</button>
                    </div>
                    <?= form_close(); ?>

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($note as $n) :
                                $id_note = $n['id'];
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $n['nama']; ?></td>
                                    <td><?= $n['judul']; ?></td>
                                    <td><?= formatTanggal($n['tanggal']); ?></td>
                                    <td>
                                        <div class="btn-group dropstart">
                                            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-gear"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item btn-custom pointer" data-action="detail" href="<?= site_url('detail/' . $n['id']); ?>">Detail</a></li>
                                                <li><a class="dropdown-item btn-custom pointer" data-action="edit" href="<?= site_url('edit/' . $n['id']); ?>">Edit</a></li>
                                                <form action="/delete/<?= $n['id'] ?>" method="post" id="deleteForm<?= $n['id'] ?>">
                                                    <li>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="dropdown-item delete-btn btn-custom pointer" data-action="delete" data-id="<?= $n['id'] ?>">Hapus</button>
                                                    </li>
                                                </form>
                                                <li><a class="dropdown-item btn-custom pointer" data-action="selesai" href="<?= site_url('selesai/' . $n['id']); ?>">Selesai</a></li>
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
</main>

<?= $this->endSection(); ?>