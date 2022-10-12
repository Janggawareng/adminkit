<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Aplikasi</strong> Database</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#open_modal">
                <i class="fal fa-file-plus me-1"></i> Buat Baru
            </button>

            <div class="modal fade" id="open_modal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="/admin/app_create" method="post" class="was-validated">
                            <?= csrf_field() ?>
                            <div class="modal-header">
                                <h5 class="modal-title">Aplikasi Register</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3 text-start">
                                <div class="mb-3">
                                    <label class="form-label">Nama Aplikasi</label>
                                    <input type="text" class="form-control text-capitalize" name="nama_app" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status Aplikasi</label>
                                    <select name="status_app" class="form-control" required>
                                        <option value hidden>-- Pilih --</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fas fa-x me-1"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <form class="d-none d-sm-inline-block mb-3" action="/admin" method="GET">
                <div class="input-group input-group-navbar">
                    <input type="text" class="form-control" name="keyword" placeholder="Search …">
                    <button class="btn" type="submit">
                        <i class="fas fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            <div class="card">
                <div class="card-body">

                    <table class="table table-sm table-striped table-hover text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Aplikasi</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no_page = $no_page * 10 - 9 ?>
                            <?php foreach ($app as $item) : ?>
                                <tr>
                                    <td><?= $no_page++ ?>.</td>
                                    <td><?= $item['nama_app'] ?></td>
                                    <td><?= $item['slug_app'] ?></td>
                                    <td>
                                        <?php if ($item['status_app'] == 'Aktif') : ?>
                                            <span class="badge text-bg-success"><?= $item['status_app'] ?></span>
                                        <?php endif ?>
                                        <?php if ($item['status_app'] == 'Non Aktif') : ?>
                                            <span class="badge text-bg-danger"><?= $item['status_app'] ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="/admin/app_detail/<?= $item['id_app'] ?>" class="btn btn-sm btn-primary">
                                            <i class="fal fa-magnifying-glass me-1"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?= $pager->links('app', 'my_page') ?>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>