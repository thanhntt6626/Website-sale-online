<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Thêm nhà sản xuất</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8 mb-10" style="margin-bottom:135px;">
        <div class="col-4 mt-3" style="margin-bottom:15px;">
            <a href="<?= request()->baseUrl() ?>/nhasanxuat" class="btn btn-primary">
                Đi đến danh sách nhà sản xuất</a>
        </div>
        <div class="container">
            <form enctype="multipart/form-data" action="/nhasanxuat/add" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên nhà sản xuất</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập tên nhà sản xuất" name="nhasanxuat_name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ngày thành lập</span>
                    </div>
                    <input required type="date" class="form-control" required placeholder="Chọn ngày" name="nhasanxuat_ngay">
                </div>

                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-block">
                        Thêm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->stop(); ?>