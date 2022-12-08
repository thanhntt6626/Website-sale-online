<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Chỉnh sửa sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8 ">
        <div class="col-10 row align-items-start ">
            <div class="col-8 " style="margin-bottom:10px;">
                <a href="<?= request()->baseUrl() ?>/sanpham" class="btn btn-primary">Đi tới danh sách sản phẩm</a>
            </div>
        </div>
        <div class="container" style="margin-bottom:15px;">
            <form enctype="multipart/form-data" action="/sanpham/edit" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID Sản Phẩm:</span>
                    </div>
                    <input type="text" id="id" name="id" readonly value="<?= $sanpham->id ?>" class="form-control">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Loại sản phẩm:</span>
                    </div>
                    <select required name="id_loai" style="display: block;">
                        <option name="id_loai" value="<?= $sanpham->id_loai ?>">
                            <?= $sanpham->id_loai . " " . $sanpham->loaisanpham->name ?>
                        </option>
                        <?php foreach ($loaisanpham as $loaisanpham) : ?>
                            <?php if ($loaisanpham->name != $sanpham->loaisanpham->name) : ?>
                                <option name="id_loai" value="<?= $loaisanpham->id ?>">
                                    <?= $loaisanpham->id . " - " . $loaisanpham->name ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nơi sản xuất:</span>
                    </div>
                    <select required name="id_nsx" style="display: block;">
                        <option value="<?= $sanpham->id_nsx ?>">
                            <?= $sanpham->id_nsx . " " . $sanpham->noisanxuat->name ?>
                        </option>
                        <?php foreach ($nsx as $nsxs) : ?>
                            <?php if ($nsxs->name != $sanpham->noisanxuat->name) : ?>
                                <option name="id_nsx" value="<?php echo $nsxs->id ?>">
                                    <?= $nsxs->id . " - " . $nsxs->name ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group" style="color: #000;">Hình ảnh loại sản phẩm</span>
                    <div class="input-group">
                        <img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" alt="">
                    </div>
                    <input type="file" value="" name="image">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên sản phẩm:</span>
                    </div>
                    <input required type="text" class="form-control" value="<?= $sanpham->name ?>" placeholder="Nhập tên sản phẩm" name="sanpham_name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mô tả sản phẩm:</span>
                    </div>
                    <input required type="text" class="form-control" value="<?= $sanpham->mota ?>" placeholder="Nhập mô tả sản phẩm" name="mota">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Bảo quản sản phẩm:</span>
                    </div>
                    <input required type="text" class="form-control" value="<?= $sanpham->baoquan ?>" name="baoquan">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Giá sản phẩm</span>
                    </div>
                    <input required type="text" value="<?= $sanpham->gia ?>" class="form-control" placeholder="Nhập số lượng" name="gia">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Số lượng tồn kho</span>
                    </div>
                    <input required type="number" value="<?= $sanpham->soluong ?>" class="form-control" placeholder="Nhập số lượng" name="soluong">
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-block">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->stop(); ?>