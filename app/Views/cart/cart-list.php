<div class=" list">
    <?php if ($sanpham_mua != null) : ?>
        <form enctype="multipart/form-data" action="/hoadon" method="POST">

            <table id="table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $tongtien = 0; ?>

                    <?php foreach ($sanpham_mua as $sanpham_muaa) : ?>
                        <tr>
                            <td><img src="<?= request()->baseUrl() ?>/assets/images/sanpham/<?= $sanpham_muaa->image ?>" alt="ảnh sản phẩm" class="cartDetail-img"></td>
                            <td><?= $sanpham_muaa->name; ?></td>
                            <td><?= number_format($sanpham_muaa->gia, 0, ",", "."); ?> VNĐ</td>
                            <?php $tongtien += $sanpham_muaa->gia; ?>
                            <td> <?= $_SESSION[$user][$sanpham_muaa->id]['soluong'] ?></td>
                            <td>
                                <a href="/sanpham/giohangg/<?= $sanpham_muaa->id ?>">
                                    <img src="/assets/images/logo/delete.png" style="width:30px;">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between" style="margin-bottom: 20px;">
                <button style="height: 70px; width: 120px;" id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Thanh toán</button>
                <h3 id="total">Tổng giá tiền: <?= number_format($tongtien, 0, ",", "."); ?> VNĐ</h3>
            </div>
        </form>
    <?php else : ?>
        <div style="height: 200px;"></div>
    <?php endif; ?>
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
        background-color: #006400;
    }

    .cart_soluong {
        width: 50px;
    }
</style>