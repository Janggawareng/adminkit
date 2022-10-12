<?= $this->extend('layout/layout_login'); ?>
<?= $this->section('content'); ?>
<div class="container d-flex flex-column">
    <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Welcome back Boss</h1>
                    <p class="lead">
                        Sign in to your account to continue
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <div class="text-center">
                                <img src="\assets\images\users\user.png" class="img-fluid rounded-circle" width="150" height="150" />
                            </div>
                            <form method="POST" action="/login" class="was-validated">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control form-control-lg" type="text" name="username" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control form-control-lg" type="password" name="password" required />
                                </div>
                                <div class="mb-3">
                                    <small>
                                        <a href="#" class="">Forgot password?</a>
                                    </small>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="far fa-lock me-2"></i> Sign in.
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>