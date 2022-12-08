<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div style="padding-top: 20px; padding-bottom: 50px;">
    <div class="containter row justify-content-center">
        <div class="col-10 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách sản phẩm đã mua</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-10 m-auto mt-2 item-list" id="sanpham-list">


                <div class="list">

                    <table id="table" class="table table-striped table-hover">
                        <thead>

                            <tr>
                                <th scope="col">#No</th>

                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Ngày mua</th>

                                <th colspan="2" scope="col" style="text-align: center;">Actions</th>
                                <!-- <th scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>

                            <?php foreach ($hoadon as $hoadons) : ?>
                                <tr>
                                    <th scope="row"><?= $start++; ?></th>
                                    <td><?= $hoadons->sanpham->name; ?></td>

                                    <td><img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $hoadons->sanpham->image ?>" alt=""></td>
                                    <td><?= $hoadons->soluong; ?></td>
                                    <td><?=
                                        date_format($hoadons->created_at, " H:i:s d/m/Y "); ?></td>

                                    <td class="action-icon">
                                        <a href="<?= '/sanpham/chitietsanpham/' . $hoadons->id_sanpham ?>">

                                            <div style="margin-left:25%" class="d-flex justify-content-between">
                                                <button id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Xem chi tiết</button>

                                            </div>


                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
                    </div>
                </div>
                <!-- Hiển thị phân trang bên dưới bảng -->
            </div>
        </div>
    </div>

</div>
<style>
    table>thead {
        vertical-align: top !important;
    }

    .cartDetail-img {
        height: 10rem;
    }

    #total {
        text-align: right;
    }

    .thanhtoan {
        width: 112px;
        height: 38px;
        background-color: gray;
    }

    .cart_soluong {
        width: 50px;
    }
</style>

<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>