<?php if ($flag == 1) : ?>
    <div class="col-lg-10 col-md-10 col-12" style="margin:90px 0px ;">
        <div class="top-middle">
            <marquee direction="right" scrolldelay="8" scrollamount="8" onmouseover="this.stop()" onmouseout="this.start()"><a href="/home">
                    <h3 style="color: black;">Rất tiếc từ khóa : <?= $keyword ?> của bạn không tìm thấy!</h3>
                </a></marquee>
        </div>
    </div>
    <div style="height:40;">
    </div>
<?php else : ?>
    <div class="row">
        <?php foreach ($sanpham as  $sanphams) : ?>
            <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                <div class="cards" style="width: 290px;">
                    <div class="overlay d-none">
                        <small class="fa fa-close"></small>
                        <a href="<?= "/sanpham/chitietsanpham/" . $sanphams->id ?>"> <img src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanphams->image ?>" class="img-fluid"></a>
                    </div>
                    <div class="top-div">
                        <i><a href="http://facebook.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-original"></a></i>
                        <i><a href="http://gmail.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-messenger"></a></i>
                    </div>
                    <div class="image">
                        <span> <a href="<?= "/sanpham/chitietsanpham/" . $sanphams->id ?>"> <img src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanphams->image ?>" class="img-fluid"></a></span>
                        <h3><?= $sanphams->name ?></h3>
                    </div>
                    <div class="arc">
                        <span></span>
                    </div>
                    <div class="about">
                        <div class="card" style="width: 17rem;">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Thông tin sản phẩm</b></li>
                                <li class="list-group-item"><?= $sanphams->name ?></li>
                                <li class="list-group-item"><?= $sanphams->noisanxuat->name ?></li>
                                <li class="list-group-item"><?= number_format($sanphams->gia, 0, ",", "."); ?> VNĐ</li>
                                <li class="list-group-item">
                                    <form action="/sanphamshow/giohang" method="POST">
                                        <button type="submit" name="submit">
                                            <i class="lni lni-shopping-basket"></i> Mua
                                        </button>
                                        <input type="number" name="soluong" id="soluong" min="1" max="50" value="1">
                                        <input type="hidden" name="id" value="<?= $sanphams->id ?>">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>