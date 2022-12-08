<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center" style="margin-bottom:95px;">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Thêm sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8 mb-10">
        <div class="col-4 " style="margin-bottom:10px;">
            <a href="<?= request()->baseUrl() ?>/sanpham" class="btn btn-primary">
                Đi đến danh sách sản phẩm</a>
        </div>
        <div class="container">
            <form enctype="multipart/form-data" action="/sanpham/add" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Loại sản phẩm:</span>
                    </div>
                    <select required name="id_loai" style="display: block;">
                        <option value="" selected>-- Chọn loại sản phẩm--</option>
                        <?php foreach ($loaisanpham as $loaisanpham) : ?>
                            <option name="id_loai" value="<?php echo $loaisanpham->id ?>">
                                <?= $loaisanpham->id . " - " . $loaisanpham->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nơi sản xuất:</span>
                    </div>
                    <select required name="id_nsx" style="display: block;">
                        <option value="" selected>-- Chọn nơi sản xuất--</option>
                        <?php foreach ($nsx as $nsxs) : ?>
                            <option name="id_nsx" value="<?php echo $nsxs->id ?>">
                                <?= $nsxs->id . " - " . $nsxs->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group">
                        <span class="input-group" style="color: #fff;">Hình ảnh sản phẩm</span>
                    </div>
                    <input required type="file" placeholder="Hình ảnh sản phẩm" required name="image">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên sản phẩm:</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="sanpham_name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mô tả sản phẩm:</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập mô tả sản phẩm" name="mota">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Bảo quản sản phẩm:</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập hướng dẫn bảo quản" name="baoquan">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Giá sản phẩm</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập số lượng" name="gia">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Số lượng sản phẩm</span>
                    </div>
                    <input required type="number" class="form-control" placeholder="Nhập số lượng" name="soluong">
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