<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Chỉnh sửa loại sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-lg-8 col-md-8 col-sm-12 new-item" style="margin-bottom: 10px;">
        <div class=" align-items-start ">
            <div class="col-12 mt-4 " style="margin-bottom:10px;">
                <a href="<?= request()->baseUrl() ?>/loaisanpham" class="btn btn-primary">Đi tới danh sách loại sản phẩm</a>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/loaisanpham/edit" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID loại sản phẩm:</span>
                </div>
                <input type="text" id='id' name='id' class="form-control form-input " readonly value="<?= $loaisanpham->id ?>" />
            </div>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Khu vực:</span>
                    </div>
                    <select required name="id_khuvuc" style="display: block;">
                        <option name="id_khuvuc" value="<?= $loaisanpham->id_khuvuc ?>">
                            <?= $loaisanpham->id_khuvuc . " - " . $loaisanpham->khuvuc->TenKV ?>
                        </option>
                        <?php foreach ($khuvuc as $khuvuc) : ?>
                            <?php if ($khuvuc->TenKV != $loaisanpham->khuvuc->TenKV) : ?>
                                <option name="id_khuvuc" value="<?= $khuvuc->id ?>">
                                    <?= $khuvuc->id . " - " . $khuvuc->TenKV ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
             </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên loại sản phẩm:</span>
                </div>
                <input required type="text" name="loaisanpham_name" class="form-control form-input " value="<?= $loaisanpham->name ?? null ?>" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group" style="color: #000;">Hình ảnh loại sản phẩm</span>
                <div class="input-group">
                    <img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanpham->image ?>" alt="">
                </div>
                <input type="file" value="" name="image">
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