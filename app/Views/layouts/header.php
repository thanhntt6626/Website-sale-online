<header class="p-3  text-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <div class="col-lg-7 col-md-6 col-12">
        <ul class="nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <img id="logo">
          <li style="padding: 0px; margin-right: 15px;" class="nav-tem"><a href="/home" class="nav-link px-2 text-secondary">Home</a></li>
          <li style="padding: 0px; margin-right: 15px;" class="nav-tem"><a href="/sanphamshow" class="nav-link px-2 text-dark">Sản phẩm</a></li>
          <li style="padding: 0px; margin-right: 15px;" class="nav-tem"><a href="/home/sanphamdaxem" class="nav-link px-2 text-dark">Sản phẩm đã xem</a></li>
          <form class="d-flex" action="/sanpham/search" method="GET">
            <input style="width:289px;" class="form-control me-2" type="search" name="searchKeyWord" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success btn btn-primary text-dark " type="submit">Search</button>
          </form>
        </ul>
      </div>
      <div class="col-lg-2 col-md-2 col-12" style="margin-left: 10px;">
        <nav id="navbar" class="navbar" style="background-color: #fff;">
          <ul style=" text-decoration: none;">
            <!-- <li><a href="contact.html">Contact Us</a></li> -->
            <li class="nav-tem" style="padding: 0px; margin-right: 15px;">
              <a href="/sanpham/giohang" class="nav-link px-2 text-dark">
                <div class="cart"><i class="lni lni-cart fa-lg" aria-hidden="true"></i>Giỏ hàng</div>
              </a>
            </li>
            <li class="nav-tem" style="padding: 0px; margin-right: 15px;">
              <a href="/tintuc" class="nav-link px-2 text-dark">Tin tức</a>
            </li>
            <!-- --------------------------------------------------------------------- -->
            <?php if (auth() == null) : ?>
              <li style="padding: 0px; margin-right: 15px;" id="nav-tem" class="dropdown nav-item">
                <a href="#" class="nav-link px-2 text-dark">
                  <div class="user">
                    <i class="lni lni-user"></i>
                    Hello Guest
                  </div>
                </a>
                <ul>
                  <li style="padding: 0px; margin-right: 15px;"><a href="/login" class="nav-link px-2 text-dark">Đăng nhập</a></li>
                  <li style="padding: 0px; margin-right: 15px;"><a href="/register" class="nav-link px-2 text-dark">Đăng ký</a></li>
                </ul>
              </li>
            <?php else : ?>
              <li class="nav-tem" style="padding: 0px; margin-right: 15px;"><a href="#">
                  <div class="user">
                    Hello <?php if ($_SESSION["username"] != null) : ?>
                      <?= $_SESSION["username"] ?? null; ?>
                    <?php else : ?>
                      <?= auth()->username ?>
                    <?php endif; ?>
                  </div>
                </a>
              </li>
              <li class="nav-tem">
                <div class="dropdown">
                  <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img style="width:40px;height: 40px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $_SESSION["anh"] ?? 'avatar.png' ?>" class="rounded-circle" height="25" alt="" loading="lazy" />
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                      <a class="dropdown-item" href="/profile">Thông tin cá nhân</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/sanpham/sanphamdamua">Lịch sử mua hàng</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/change-password">Đổi mật khẩu</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/logout">Đăng xuất</a>
                    </li>
                  </ul>
                </div>
              </li>
            <?php endif; ?>
          </ul>
        </nav><!-- .navbar -->
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-3 col-12" style="padding-bottom: 10px;">
        <div class="nav-inner">
          <div class="mega-category-menu">
            <div class="offcanvas offcanvas-start" id="demo">
              <div class="offcanvas-body">
                <?php $check = 1; ?>
                <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Admin') :  ?>
                  <div class="offcanvas-header nav-item">
                    <h3 style="color:#0d6efd">Danh mục quản lí</h3>
                    <?php if ($check == 1) : $check = 0; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    <?php endif; ?>
                  </div>
                  <ul class="nav nav-tabs" style="display: block; font-size: 17px; font-family: Arial, Helvetica, sans-serif;">
                    <li class="nav-tem"><strong><a class="nav-link" href="/loaisanpham">Danh sách loại sản phẩm </a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/sanpham">Danh sách sản phẩm </a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/nhasanxuat">Danh sách nơi sản xuất </a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/user">Danh sách người dùng</a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/hoadon">Danh sách hóa đơn </a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/khuyenmai">Danh sách khuyến mãi </a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/tintuc/list">Danh sách tin tức </a></strong></li>
                    <li class="nav-tem"><strong><a class="nav-link" href="/khuvuc">Danh sách khu vực </a></strong></li>
                  </ul>
                <?php endif; ?>
                <div class="offcanvas-header nav-item">
                  <h3 style="color:#0d6efd">Tất cả sản phẩm </h3>
                  <?php if ($check != 0) :  ?>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                  <?php endif; ?>
                </div>
                <ul class="nav nav-tabs" style="display: block;">
                  <?php foreach ($_SESSION["B1910139"] as  $key => $value) : ?>
                    <li class="nav-tem">
                      <a class="nav-link " href="<?= "/loaisanpham/loaisanphamlist/" . $key ?>"><?= $value ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <div class="container-fluid mt-3">
              <span class="nav-link2" style="font-weight: bolder; font-size: larger;"> Danh mục sản phẩm </span>
              <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <i class="lni lni-menu" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <div class="top-middle">
          <marquee direction="right" scrolldelay="6" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()"><a href="/home">
              <h3><a href="/home" style="color: #0d6efd;" class="nav-link px-2">Chào mừng quý khách đến với cửa hàng!</a> </h3>
            </a></marquee>
        </div>
      </div>
    </div>
  </div>
</header>