<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center" style="margin-bottom:140px;">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Thêm Khu Vực</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8 mb-10">
        <div class="col-4" style="margin-bottom:10px;">
            <a href="<?= request()->baseUrl() ?>/khuvuc" class="btn btn-primary">Đi đến danh sách khu vực</a>
        </div>
        <form enctype="multipart/form-data" action="/khuvuc/add" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Mã Khu vực:</span>
                </div>
                <input required type="text"class="form-control form-input "  placeholder="Nhập vào mã khu vực" name="makhuvuc">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên Khu Vực:</span>
                </div>
                <input required type="text" name="khuvuc_name" class="form-control form-input " placeholder="nhập vào tên khu vực" value="" />
            </div>

            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-block">
                    Thêm
                </button>
            </div>
        </form>
    </div>
</div>
<?php $this->stop(); ?>