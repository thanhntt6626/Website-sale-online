<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div style="padding-top: 10px; padding-bottom: 50px;">
    <div class="containter row justify-content-center">
        <div class="col-4 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách loại sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 row align-items-start ">
            <div class="col-4 ">
                <a href="/loaisanpham/add" class="btn btn-primary">Thêm Loại Sản Phẩm</a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 m-auto mt-2 item-list" id="loaisanpham-list">
                <?php $this->insert('loaisanpham/loaisanpham-list', [
                    'loaisanpham' => $loaisanpham,
                    'paginator' => $paginator,
                    'sanpham' => $sanpham
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?= $this->insert('loaisanpham/loaisanpham-script'); ?>
<?php $this->stop(); ?>