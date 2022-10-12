<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Detail Aplikasi</strong> Database</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="<?= $last_url ?>" class="btn btn-primary">
                <i class="fal fa-arrow-left"></i>
            </a>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/app_update/<?= $app['id_app'] ?>" method="post" class="was-validated">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Aplikasi</label>
                                <input type="text" class="form-control text-capitalize" name="nama_app" autocomplete="off" value="<?= $app['nama_app'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Aplikasi</label>
                                <select name="status_app" class="form-control" required>
                                    <option value="<?= $app['status_app'] ?>" hidden><?= $app['status_app'] ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Created</label>
                                <input type="text" class="form-control" value="<?= tanggal_jam($app['created_at']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Updated</label>
                                <input type="text" class="form-control" value="<?= tanggal_jam($app['updated_at']) ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>