<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div style=" padding-bottom: 50px;">
    <div class="containter row justify-content-center">
        <div class="col-4 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách hóa đơn</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-10 m-auto mt-3 item-list" id="hoadon-list">
                <?php $this->insert(
                    'hoadon/hoadon-list',
                    [
                        'hoadon' => $hoadon,
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
<?= $this->insert('hoadon/hoadon-script'); ?>
<?php $this->stop(); ?>