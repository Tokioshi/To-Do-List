<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo site_url('/') ?>">
            <img src="<?php echo base_url('images/checklist.png') ?>" alt="Logo" height="24" class="d-inline-block align-text-top">
            Task Master
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item ms-2">
                <?php if ($current == '/') : ?>
                    <a class="btn btn-outline-primary" type="button" href="<?php echo site_url('tambah') ?>">Tambah</a>
                <?php else : ?>
                    <a class="btn btn-outline-primary" type="button" href="<?php echo site_url('/') ?>">Kembali</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>