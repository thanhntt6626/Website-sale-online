<?php $this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container" style="margin-top: 10px;">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
      <img style="width: 304px;height:300px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" class="img-fluid" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
      <div class="mainContent">
        <div class="container mt-3" style="margin:0px 0px 0px 0px !important;width:500px !important;">
          <h2 style="color: black;"><?= $sanpham->name ?></h2>
          <br>
          <!-- Nav pills -->
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="pill" href="#home">Mô tả</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="pill" href="#menu1">Thông tin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="pill" href="#menu2">Bình luận</a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
              <p><?= $sanpham->mota ?></p>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
              <table data-toggle="table" data-mobile-responsive="true" data-check-on-init="true" class="table table-striped table-light table-hover">
                <thead>
                  <tr>
                    <td>Xuất Xứ</td>
                    <td><?= $sanpham->noisanxuat->name ?></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bảo quản</td>
                    <td>
                      <?= $sanpham->baoquan ?></td>
                  </tr>
                  <tr>
                    <td>Số Lượng trong kho</td>
                    <td><?= $sanpham->soluong ?>KG</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
              <form enctype="multipart/form-data" name="login" method="POST" action="/binhluan">
                <textarea name="binhluan" style="width:100%;height:100px;" placeholder="Nhập bình luận">

                </textarea>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                    Lưu
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 new-item" style="margin-bottom:15px;padding-left:250px;">
      <div class="cards">
        <div class="overlay d-none">
          <small class="fa fa-close"></small>
          <a href="<?= "/sanpham/chitietsanpham/" . $sanpham->id ?>"> <img src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" class="img-fluid"></a>
        </div>
        <div class="top-div">
          <i><a href="http://facebook.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-original"></a></i>
          <i><a href="http://gmail.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-messenger"></a></i>
        </div>
        <div class="image">
          <span> <a href="<?= "/sanpham/chitietsanpham/" . $sanpham->id ?>"> <img src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" class="img-fluid"></a></span>
          <h3><?= $sanpham->name ?></h3>
        </div>
        <div class="arc">
          <span></span>
        </div>
        <div class="about">
          <div class="card" style="width: 17rem;">
            <ul class="list-group">
              <li class="list-group-item"><b>Thông tin sản phẩm</b></li>
              <li class="list-group-item"><?= $sanpham->name ?></li>

              <li class="list-group-item"><?= $sanpham->noisanxuat->name ?></li>
             
              <li class="list-group-item"><?= number_format($sanpham->gia, 0, ",", "."); ?> VNĐ</li>
              <li class="list-group-item">
                <form action="/sanphamshow/giohang" method="POST">
                  <button type="submit" name="submit">
                    <i class="lni lni-shopping-basket"></i> Mua
                  </button>
                  <input type="number" name="soluong" id="soluong" min="1" max="50" value="1">
                  <input type="hidden" name="id" value="<?= $sanpham->id ?>">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->
      <button style="margin-top:5px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Xem bình luận
      </button>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Bình luận về sản phâm : <?= $sanpham->name ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Nội dung bình luận</th>

                </thead>
                <?php foreach ($binhluan as $binhluans) : ?>
                  <?php if ($binhluans->id_sanpham == $sanpham->id) : ?>
                    <tr>
                      <td style="font-weight :bold"><?= $binhluans->nguoidung->username ?></td>
                      <td> <?= $binhluans->noidungbinhluan ?></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->stop(); ?>