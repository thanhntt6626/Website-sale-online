<?php $this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container">
    <?php $check = 1 ?>
    <?php if ($countsanpham == 0) : ?>
        <div class="col-10 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h5 style="font-size: 1.8rem;text-align: center;" class="a-h2">
                                Đã hết hàng theo loại: <span class="text-dark"><?= $loaisanpham->name ?>!</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-10 col-md-10 col-12">
                        <div class="top-middle">
                            <marquee direction="right" scrolldelay="8" scrollamount="8" onmouseover="this.stop()" onmouseout="this.start()"><a href="/home">
                                    <h3 style="color: black;">Rất tiếc sản phẩm theo loại <?= $loaisanpham->name ?> đã bán hết, vui lòng quay lại sau!</h3>
                                </a></marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:200px;">
            <?php $check = 0; ?>
        </div>
    <?php else : ?>
        <div class="col-5 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h5 style="font-size: 1.8rem;margin:0px 10px 10px  ;text-align: center;" class="a-h2">
                                Sản phẩm theo loại: <span class="text-dark"><?= $loaisanpham->name ?>!</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-5">
        <div class="col-12 m-auto item-list">
            <div class="row">
                <?php foreach ($sanpham as  $sanphams) :
                    if ($sanphams->id_loai == $loaisanpham->id) : ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                            <div class="cards">
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
                                    <div class="card" style="width: 15rem;">
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
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php if ($check != 0) : ?>
                <div class="pagination" style="margin-bottom:15px;">
                    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $this->stop(); ?>