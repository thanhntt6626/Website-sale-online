<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="containter row justify-content-center">
    <div class="row">
        <div class="col-10 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Sản phẩm quý khách đã chọn mua! Thầy nhớ bấm thanh toán giúp em nha ><</h2>
                        </div>
                    </div>
                </div>
                <div class="col-10 row align-items-start ">
                    <div class="col-4 mt-5 ">
                        <a href="/sanphamshow" class="btn btn-primary">Tiếp tục mua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-10 m-auto mt-2 item-list" id="loaisanpham-list">
        <?php $this->insert('cart/cart-list', [
            'sanpham_mua' => $sanpham_mua,
            'user' => $user
        ]); ?>
    </div>
</div>
<?php $this->stop() ?>

<?php $this->start('js') ?>

<script>
    $(document).ready(function() {
        $('input').change(function() {
            alert($(this).val());
        });

    });
</script>
<?php $this->stop(); ?>