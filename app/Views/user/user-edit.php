<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-4 m-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title ">
                                <h2 class="a-h2">Chỉnh sửa người dùng</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1 col-md-10 offset-md-1 col-12">
                <div class="col-10 row align-items-start ">
                    <div class="col-8 mt-2">
                        <a href="<?= request()->baseUrl() ?>/user" class="btn btn-primary">Đi tới danh sách người dùng</a>
                    </div>
                </div>
                <div class="register-form" style="margin-top: 15px;">
                    <?php if (isset($errors['failed'])) : ?>
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors['failed']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form enctype="multipart/form-data" action="/user/edit" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="id" id="id" value="<?= $user->id_nguoidung ?? null ?>" readonly class="form-control">
                            <label for="id">ID người dùng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="username" value="<?= $user->username ?? null ?>" readonly class="form-control ">
                            <label for="username">Username</label>

                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Quyen</span>
                            </div>
                            <select name="id_quyen" style="display: block;">
                                <option value="<?= $user->quyenSD ?>" selected><?= $user->quyenSD ?></option>
                                <?php if ($user->quyenSD != "User") : ?>
                                    <option name="id_quyen" value="User">
                                        User
                                    </option>

                                <?php else : ?>
                                    <option name="id_quyen" value="Admin">
                                        Admin
                                    </option>
                                <?php endif; ?>

                            </select>
                        </div>
                        <div class="form-group" style="text-align: center;margin-top:15px;;margin-bottom:45px;">
                            <button type="submit" class="btn btn-primary btn-block">
                                Lưu
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop(); ?>