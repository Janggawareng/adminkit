<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Detail User</strong> Database</h3>
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
                        <form action="/admin/user_update/<?= $myuser['id_user'] ?>" method="post" class="was-validated">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control text-lowercase" name="username" autocomplete="off" value="<?= $myuser['username'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" autocomplete="off" value="<?= $myuser['password'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control text-capitalize" name="nama_user" autocomplete="off" value="<?= $myuser['nama_user'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Aplikasi</label>
                                <select name="id_app" class="form-control" required>
                                    <option value="<?= $myuser['id_app'] ?>" hidden><?= $myuser['nama_app'] ?></option>
                                    <?php foreach ($app as $item) : ?>
                                        <option value="<?= $item['id_app'] ?>"><?= $item['nama_app'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status_user" class="form-control" required>
                                    <option value="<?= $myuser['status_user'] ?>" hidden><?= $myuser['status_user'] ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Created</label>
                                <input type="text" class="form-control" value="<?= tanggal_jam($myuser['created_at']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Updated</label>
                                <input type="text" class="form-control" value="<?= tanggal_jam($myuser['updated_at']) ?>" readonly>
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