<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Chỉnh sửa khu vực</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-lg-8 col-md-8 col-sm-12 new-item" style="margin-bottom: 10px;">
        <div class=" align-items-start ">
            <div class="col-12 mt-4 " style="margin-bottom:10px;">
                <a href="<?= request()->baseUrl() ?>/khuvuc" class="btn btn-primary">Đi tới danh sách khu vực</a>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/khuvuc/edit" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID khu vực:</span>
                </div>
                <input type="text" id='id' name='id' class="form-control form-input " readonly value="<?= $khuvuc->id ?>" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mã khu vực:</span>
                </div>
                <input required type="text" name="khuvuc_makhuvuc" readonly class="form-control form-input " value="<?= $khuvuc->makhuvuc ?? null ?>" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên khu vực</span>
                </div>
                <input required type="text" name="khuvuc_name" class="form-control form-input " value="<?= $khuvuc->TenKV ?? null ?>" />
            </div>

            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-block">
                    Lưu
                </button>
            </div>
        </form>
    </div>
</div>

<?php $this->stop(); ?>