<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center" style="margin-bottom:140px;">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Thêm loại sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8 mb-10">
        <div class="col-4" style="margin-bottom:10px;">
            <a href="<?= request()->baseUrl() ?>/loaisanpham" class="btn btn-primary">Đi đến danh sách loại sản phấm</a>
        </div>
        <form enctype="multipart/form-data" action="/loaisanpham/add" method="POST">
             <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Khu vực:</span>
                    </div>
                    <select required name="id_khuvuc" style="display: block;">
                        <option value="" selected>-- Chọn khu vực --</option>
                        <?php foreach ($khuvuc as $khuvuc) : ?>
                            <option name="id_khuvuc" value="<?php echo $khuvuc->id ?>">
                                <?= $khuvuc->id . " - " . $khuvuc->makhuvuc ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
             </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên loại sản phẩm:</span>
                </div>
                <input required type="text" name="loaisanpham_name" class="form-control form-input " placeholder="nhập vào loại sản phẩm" value="" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group">
                    <span class="input-group" style="color: #fff;">Hình ảnh loại sản phẩm</span>
                </div>
                <input required type="file" placeholder="Hình ảnh sản phẩm" required name="image">
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