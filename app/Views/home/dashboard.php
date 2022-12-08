<section class="banner section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 w-100" style="margin: 10px auto 15px auto;">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= request()->baseUrl(); ?>/assets/images/carousel/Main3.jpg" class="d-block w-100" alt="#">
                            </div>
                            <div class="carousel-item  ">
                                <img src="<?= request()->baseUrl(); ?>/assets/images/carousel/Main6.jpg" class="d-block w-100" alt="#">
                            </div>
                            <div class="carousel-item ">
                                <img src="<?= request()->baseUrl(); ?>/assets/images/carousel/Main5.jpg" class="d-block w-100" alt="#">
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="trending-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="a-h2 a-h3 "> <span class="a-strong"> Sản phẩm cửa hàng</span></h2>
                </div>
            </div>
        </div>
        <h5 style="font-size: 1.8rem;margin-bottom:20px;" class="a-h2">
            <span class="a-danhmuc">Danh mục</span>
        </h5>
        <div class="row" id="noidung">
            <?php foreach ($loaisanpham as  $loaisanphams) : ?>
                <div class="col-lg-2 col-md-6 col-sm-12 new-item">
                    <div class="cardss">
                        <div class="overlayy d-none">
                            <small class="fa fa-close"></small>
                        </div>
                        <div class="top-divv">
                        </div>
                        <div class="imagee">
                            <span> <a href="<?= "/loaisanpham/loaisanphamlist/" . $loaisanphams->id ?>"> <img src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanphams->image ?>"></a></span>
                        </div>
                        <div class="aboutt">
                            <div class="card" style="width: 17rem;">
                                <ul class="list-groupp">
                                    <li class="list-group-item"><?= $loaisanphams->name ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="color: while; text-align: center;">
            <a id="them" class="text-primary" style="cursor: pointer; font-size:1.2rem;"><strong>Xem thêm danh mục</strong></a>
        </div>
        <h5 style="font-size: 1.8rem;margin-bottom:20px;" class="a-h2">
            <span class="a-danhmuc">Gợi ý hôm nay</span>
        </h5>
        <div class="row" id="noidungsanpham">
            <?php foreach ($sanpham as  $sanphams) : ?>
                <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                    <div class="cards" style="width: 300px;">
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
                                    <li class="list-group-item"> <?= $sanphams->name ?> </li>
                                    <li class="list-group-item"><?= $sanphams->noisanxuat->name ?></li>
                                    <li class="list-group-item"><?= number_format($sanphams->gia, 0, ",", "."); ?> VNĐ</li>
                                    <li class="list-group-item">
                                        <form action="/home/giohang" method="POST">
                                            <button type="submit">
                                                <i class="lni lni-shopping-basket"></i> Mua
                                            </button>
                                            <input type="number" name="soluong" id="soluong" min="1" max="<?=$sanphams->soluong?>" value="1">
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




        <div style="color: while; text-align: center;margin-bottom:15px;">
            <a id="them1" class="text-primary" style="cursor: pointer; font-size:1.2rem;"><strong>Xem thêm sản phẩm</strong></a>
        </div>
    </div>
</section>
<section class="home-product-list section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="a-h2 a-h3 "> <span class="a-strong">Sản phẩm Khuyến mãi với giá ưu đãi</span></h2>

                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($khuyenmai as  $khuyenmais) : ?>
                <?php if ($khuyenmais->phantram >= "30") : ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                        <div class="cards" style="width: 300px;">
                            <div class="overlay d-none">
                                <small class="lni lni-close"></small>
                                <a href="<?= "/sanpham/chitietsanpham/" . $sanphams->id ?>"><img src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $khuyenmais->sanpham->image ?>" class="img-fluid"></a>
                            </div>
                            <div class="top-div">
                                <i><a href="http://facebook.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-original"></a></i>
                                <i><a href="http://gmail.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-messenger"></a></i>
                            </div>
                            <div class="image">
                                <span> <a href="<?= "/sanpham/chitietsanpham/" . $khuyenmais->sanpham->id ?>"> <img src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $khuyenmais->sanpham->image ?>" class="img-fluid"></a></span>
                                <h3><?= $khuyenmais->sanpham->name ?></h3>
                            </div>
                            <div class="arc">
                                <span></span>
                            </div>
                            <div class="about">
                                <div class="card" style="width: 17rem;">
                                    <ul class="list-group">
                                        <li class="list-group-item"><?= $khuyenmais->tenkhuyenmai ?></li>
                                        <li class="list-group-item"><?= $khuyenmais->sanpham->name ?></li>
                                        <li class="list-group-item"><?= $khuyenmais->sanpham->noisanxuat->name ?></li>
                                        <li class="list-group-item"><?= number_format($khuyenmais->sanpham->gia, 0, ",", "."); ?> VNĐ</li>
                                        <li class="list-group-item">
                                            <form action="/home/giohang" method="POST">
                                                <button type="submit">
                                                    <i class="lni lni-shopping-basket"></i> Mua
                                                </button>
                                                <input type="number" name="soluong" id="soluong" min="1" max="<?= $khuyenmais->sanpham->soluong ?>" value="1">
                                                <input type="hidden" name="id" value="<?= $sanphams->id ?>">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<section class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2 class="a-h2 a-h3 "> <span class="a-strong">Sản phẩm được mua nhiều nhất</span></h2>

            </div>
        </div>
        <div class="row" id="noidungsanpham">
            <?php
            foreach ($hoadon as  $hoadons) :
                $count = 0;
                if (!isset($_SESSION["$hoadons->id_sanpham"])) :
                    foreach ($hoadon as  $hoadonss) :

                        if ($hoadons->id_sanpham == $hoadonss->id_sanpham) :
                            $count += $hoadonss->soluong;
                        endif;
                    endforeach;
                endif;
                if ($count >= 4) :
                    $_SESSION["$hoadons->id_sanpham"] = "1"; ?>
                    <?php foreach ($sanpham as  $sanphams) :
                        if ($hoadons->id_sanpham == $sanphams->id) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">

                                <div class="cards" style="width: 300px;">
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
                                                    <form action="/home/giohang" method="POST">
                                                        <button type="submit">
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
                    <?php endif;
                    endforeach; ?>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
    <div>
        <a href="#logo" style="position: fixed;color: #ed4190;right: 10px;bottom: 5px"><img src="<?= request()->baseUrl(); ?>/assets/images/logofooter" class="top" width="60px" height="60px"></a>
    </div>
</section>

<section class="shipping-info">
    <div class="container">
        <div class="footer-sologan bg-white" style=" padding-top:30px ; padding-bottom:30px ; border-top: 5px solid #008A55">
            <div class="container" style="padding-left: 105px;">
                <div class="row row2">
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem;height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Sản phẩm an toàn</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem;height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot1.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Chất lượng cam kết</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem;height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot2.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Dịch vụ vượt trội</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem; height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot3.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Giao hàng nhanh</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tránh tải lại trang khi mua hàng nếu không dùng đoạn lệnh này thì đơn hàng sẽ tự tăng số lượng vì còn lưu tham số trên url -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>