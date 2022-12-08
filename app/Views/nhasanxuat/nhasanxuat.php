<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section">
    <div class="containter row justify-content-center">
        <div class="col-4 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách nơi sản xuất</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 row align-items-start ">
            <div class="col-4">
                <a href="/nhasanxuat/add" class="btn btn-primary">
                    Thêm nơi sản xuất
                </a>
            </div>
        </div>
        <div class="row" style="margin-bottom: 90px;">
            <div class="col-10 m-auto mt-2 item-list" id="nhasanxuat-list">
                <?php $this->insert('nhasanxuat/nhasanxuat-list', [
                    'items' => $items,
                    'paginator' => $paginator
                ]); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
<?php $this->start('js') ?>
<?= $this->insert('nhasanxuat/nhasanxuat-script'); ?>
<?php $this->stop(); ?>