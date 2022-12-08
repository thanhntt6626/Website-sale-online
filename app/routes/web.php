<?php

use App\Router;

// Router::get('/hello', function () {
//     echo 'Hello world!';
// });
//user
Router::get('/user', 'App\Controllers\UserController@showForm');
Router::post('/user/delete', 'App\Controllers\UserController@delete');
Router::get('/user/delete', 'App\Controllers\UserController@deletekhongchoxoa');
Router::get('/user/edit/(\d+)', 'App\Controllers\UserController@showEditForm');
Router::post('/user/edit', 'App\Controllers\UserController@edit');
//profile
Router::get('/profile', 'App\Controllers\ProfileController@showForm');
Router::post('/profile', 'App\Controllers\ProfileController@edit');
//change password
Router::get('/change-password', 'App\Controllers\Auth\ChangePasswordController@changePasswordForm');
Router::post('/change-password', 'App\Controllers\Auth\ChangePasswordController@changePassword');

//home
Router::post('/home', 'App\Controllers\HomeController@index');
Router::get('/', 'App\Controllers\HomeController@index');
Router::get('/home', 'App\Controllers\HomeController@index');
Router::post('/home/giohang', 'App\Controllers\HomeController@giohang');
Router::get('/home/giohang', 'App\Controllers\HomeController@giohangget');
Router::get('/home/sanphamdaxem', 'App\Controllers\HomeController@sanphamdaxem');


// user authentication
Router::get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
Router::post('/login', '\App\Controllers\Auth\LoginController@login');

Router::get('/logout', '\App\Controllers\Auth\LoginController@logout');
Router::post('/logout', '\App\Controllers\Auth\LoginController@logout');

// register user
Router::get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
Router::post('/register', '\App\Controllers\Auth\RegisterController@register');
//error
Router::error("\App\Controllers\ErrorController@notFoundError");
//tintuc
Router::get('/tintuc/add', 'App\Controllers\TintucController@showAddForm');
Router::post('/tintuc/add', 'App\Controllers\TintucController@add');
Router::get('/tintuc', 'App\Controllers\TintucController@showtintuc');
Router::get('/tintuc/list', 'App\Controllers\TintucController@showList');
Router::get('/tintuc/edit/(\d+)', 'App\Controllers\TintucController@showEditForm');
Router::post('/tintuc/edit', 'App\Controllers\TintucController@edit');
Router::post('/tintuc/delete', 'App\Controllers\TintucController@delete');

// LoaiSanPham
Router::get('/loaisanpham/add', 'App\Controllers\LoaiSanPhamController@showAddForm');
Router::post('/loaisanpham/add', 'App\Controllers\LoaiSanPhamController@add');
Router::get('/loaisanpham', 'App\Controllers\LoaiSanPhamController@showList');
Router::get('/loaisanpham/edit/(\d+)', 'App\Controllers\LoaiSanPhamController@showEditForm');
Router::post('/loaisanpham/edit', 'App\Controllers\LoaiSanPhamController@edit');
Router::post('/loaisanpham/delete', 'App\Controllers\LoaiSanPhamController@delete');
Router::get('/loaisanpham/delete', 'App\Controllers\LoaiSanPhamController@deletekhongchoxoa');
Router::get('/loaisanpham/loaisanphamlist/(\d+)', 'App\Controllers\LoaiSanPhamController@showsanpham');
// SanPham
Router::get('/sanpham/add', 'App\Controllers\SanPhamController@showAddForm');
Router::post('/sanpham/add', 'App\Controllers\SanPhamController@add');
Router::get('/sanpham', 'App\Controllers\SanPhamController@showList');
Router::get('/sanpham/edit/(\d+)', 'App\Controllers\SanPhamController@showEditForm');
Router::post('/sanpham/edit', 'App\Controllers\SanPhamController@edit');
Router::post('/sanpham/delete', 'App\Controllers\SanPhamController@delete');
Router::get('/sanpham/delete', 'App\Controllers\SanPhamController@deletekhongchoxoa');
Router::get('/sanpham/search', 'App\Controllers\SanPhamController@search');
Router::get('/sanpham/chitietsanpham/(\d+)', 'App\Controllers\SanPhamController@showDetail');
Router::post('/sanpham/chitietsanpham/(\d+)', 'App\Controllers\SanPhamController@showDetail');
Router::get('/sanpham/sanphamdamua', 'App\Controllers\SanPhamController@sanphamdamua');
//GIO HANG SANPHAM
Router::get('/sanpham/giohang', 'App\Controllers\SanPhamController@giohang');
Router::get('/sanpham/giohangg/(\d+)', 'App\Controllers\SanPhamController@giohangg');
//Load trang
Router::get('/ajax', 'App\Controllers\SanPhamController@loadpage');
Router::get('/ajax_sanpham', 'App\Controllers\SanPhamController@loadpage_sanpham');

//showSanPham
Router::get('/sanphamshow', 'App\Controllers\SanPhamshowController@showList');
Router::post('/sanphamshow/giohang', 'App\Controllers\SanPhamshowController@giohang');
Router::get('/sanphamshow/giohang', 'App\Controllers\SanPhamshowController@sanphamshow');

//khuyen mai
Router::get('/khuyenmai/add', 'App\Controllers\KhuyenmaiController@showAddForm');
Router::post('/khuyenmai/add', 'App\Controllers\KhuyenmaiController@add');
Router::get('/khuyenmai', 'App\Controllers\KhuyenmaiController@showList');
Router::post('/khuyenmai/delete', 'App\Controllers\KhuyenmaiController@delete');
Router::get('/khuyenmai/edit/(\d+)', 'App\Controllers\KhuyenmaiController@showEditForm');
Router::post('/khuyenmai/edit', 'App\Controllers\KhuyenmaiController@edit');


//nhasanxuat
Router::get('/nhasanxuat/add', 'App\Controllers\NhaSanXuatController@showAddForm');
Router::post('/nhasanxuat/add', 'App\Controllers\NhaSanXuatController@add');
Router::get('/nhasanxuat', 'App\Controllers\NhaSanXuatController@nhasanxuat_list');
Router::post('/nhasanxuat/delete', 'App\Controllers\NhaSanXuatController@delete');
Router::get('/nhasanxuat/edit/(\d+)', 'App\Controllers\NhaSanXuatController@showFormedit');
Router::post('/nhasanxuat/edit', 'App\Controllers\NhaSanXuatController@edit');

//binhluan
Router::get('/binhluan/add', 'App\Controllers\BinhluanController@showAddForm');
Router::post('/binhluan/add', 'App\Controllers\BinhluanController@add');
Router::get('/binhluan', 'App\Controllers\BinhluanController@binhluan_list');
Router::post('/binhluan/delete', 'App\Controllers\BinhluanController@delete');
Router::get('/binhluan/edit/(\d+)', 'App\Controllers\BinhluanController@showFormedit');
Router::post('/binhluan/edit', 'App\Controllers\BinhluanController@edit');
Router::post('/binhluan', 'App\Controllers\BinhluanController@add');

////hoadon
Router::post('/hoadon', 'App\Controllers\HoadonController@showForm');
Router::get('/hoadon', 'App\Controllers\HoadonController@showList');
Router::post('/hoadonxong', 'App\Controllers\HoadonController@showOk');
Router::get('/hoadonxong', 'App\Controllers\HomeController@index');
Router::post('/hoadon/delete', 'App\Controllers\HoadonController@delete');

//khuvuc
//Thêm
Router::get('/khuvuc/add', 'App\Controllers\KhuVucController@showAddForm');
Router::post('/khuvuc/add', 'App\Controllers\KhuVucController@add');
//Hiển Read
Router::get('/khuvuc', 'App\Controllers\KhuVucController@showList');
//SỬA
Router::get('/khuvuc/edit/(\d+)', 'App\Controllers\KhuVucController@showEditForm');
Router::post('/khuvuc/edit', 'App\Controllers\KhuVucController@edit');
//xóa
Router::post('/khuvuc/delete', 'App\Controllers\KhuVucController@delete');

Router::error(function () {
    echo '404 :: Page Not Found';
});
