<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Chỉnh sửa khuyến mãi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8  mb-10">
        <div class="col-4  " style="margin-bottom:10px; ;">
            <a href="<?= request()->baseUrl() ?>/khuyenmai" class="btn btn-primary">
                Đi đến danh sách khuyến mãi</a>
        </div>
        <div class="container">
            <form enctype="multipart/form-data" action="/khuyenmai/edit" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID khuyến mãi:</span>
                    </div>
                    <input type="text" id="id" name="id" readonly value="<?= $khuyenmai->id ?>" class="form-control form-input">
                </div>
                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                        <span class="input-group-text">sản phẩm:</span>
                    </div>
                    <select name="id_sanpham" style="display: block;">
                        <option value="<?php echo $khuyenmai->id_sanpham ?>" selected>
                            <?= $khuyenmai->id_sanpham . " - " . $khuyenmai->sanpham->name ?>
                        </option>
                        <?php foreach ($sanpham as $sanphams) : ?>
                            <?php if ($sanphams->name != $khuyenmai->sanpham->name) : ?>
                                <option name="id_sanpham" value="<?php echo $sanphams->id ?>">
                                    <?= $sanphams->id . " - " . $sanphams->name ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên khuyến mãi:</span>
                    </div>
                    <input required type="text" class="form-control" value="<?= $khuyenmai->name ?>" placeholder="Nhập tên sản phẩm" name="khuyenmai_name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phần trăm khuyến mãi</span>
                    </div>
                    <input required type="number" class="form-control" value="<?= $khuyenmai->phantram ?>" placeholder="Nhập phần trăm" name="khuyenmai_phantram">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Thời gian bắt đầu</span>
                    </div>
                    <input required type="date" class="form-control" value="<?= $khuyenmai->NgayBD ?>" placeholder="Nhập số lượng" name="khuyenmai_bd">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Thời gian kết thúc</span>
                    </div>
                    <input required type="date" class="form-control" value="<?= $khuyenmai->NgayKT ?>" placeholder="Nhập số lượng" name="khuyenmai_kt">
                </div>

                <div class="form-group" style="text-align: center; margin-bottom: 10px;">
                    <button id="themkhuyenmai" type="submit" class="btn btn-primary btn-block">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
<?php $this->start('js') ?>
<?= $this->insert('khuyenmai/khuyenmai-checkngay'); ?>
<?php $this->stop(); ?>