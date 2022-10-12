<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Dashboard</strong> Analytics</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <div class="row">

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Database</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fal fa-database"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">2.382</h1>
                            <div class="mb-0">
                                <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Database</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fal fa-database"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">2.382</h1>
                            <div class="mb-0">
                                <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-7">
        </div>
    </div>

</div>

<?= $this->endSection(); ?>