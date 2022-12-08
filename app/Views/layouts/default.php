<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Website Cửa hàng bách hóa tổng hợp</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/btn.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- insert specific page's css -->
    <?= $this->section('css') ?>
</head>
<body>
    <!-- Header section -->
    <?= $this->insert('layouts/header') ?>
    <!-- Content section -->
    <?= $this->section('page') ?>
    <!-- Footer section -->
    <?= $this->insert('layouts/footer') ?>
    <?= $this->insert('layouts/logout_modal') ?>
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/tiny-slider.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/glightbox.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Thêm thông báo Flash messages -->
    <?= $this->insert('layouts/notifications'); ?>
    <!-- insert specific page's scripts -->
    <?= $this->section('js') ?>
</body>

</html>