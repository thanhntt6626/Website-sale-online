<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div style="padding-top: 20px; padding-bottom: 50px;">
    <div class="containter row justify-content-center">
        <div class="col-4 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách khuyến mãi</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 row align-items-start  ">
            <div class="col-4 mt-2 ">
                <a href="/khuyenmai/add" class="btn btn-primary">
                    Thêm khuyến mãi
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-10 m-auto mt-2 item-list" id="khuyenmai-list">
                <?php $this->insert(
                    'khuyenmai/khuyenmai-list',
                    [
                        'items' => $items,
                        'paginator' => $paginator
                    ]
                );
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?= $this->insert('khuyenmai/khuyenmai-script'); ?>
<?php $this->stop(); ?>