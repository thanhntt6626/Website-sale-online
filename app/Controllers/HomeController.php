<?php

namespace App\Controllers;

use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Khuyenmai;
use App\Models\User;

class HomeController  extends BaseController
{

    public function index()
    {
        $sanpham = SanPham::take(8)->get();
        $loaisanpham = LoaiSanPham::take(4)->get();
        $khuyenmai = Khuyenmai::all();
        $danhmuc = [];
        $danhmucsanpham = LoaiSanPham::all();
        $hoadon = Hoadon::all();
        foreach ($danhmucsanpham as $danhmucsanphams) {
            $danhmuc[$danhmucsanphams->id] = $danhmucsanphams->name;
        }
        $_SESSION["B1910139"] = $danhmuc;

        return $this->render(
            'home/index',
            [
                'sanpham' => $sanpham,
                'loaisanpham' => $loaisanpham,
                'khuyenmai' => $khuyenmai,
                'hoadon' => $hoadon
            ]
        );
    }

    public function giohang()
    {
        if (auth() == null) {
            session()->setFlash(\FLASH::INFO, 'Vui lòng đăng nhập khi sự dụng');
            return $this->render('auth/login');
        }
        $id = $_POST['id'] ?? null;
        $soluong = $_POST['soluong'] ?? null;
        $user = auth()->username;

        if (!isset($_SESSION[$user][$id])) {
            $_SESSION[$user][$id] = array(
                'soluong' => $soluong,
                'id' => $id
            );
        } else {
            $_SESSION[$user][$id]['soluong'] += $soluong;
        }
        $hoadon = Hoadon::all();
        session()->setFlash(\FLASH::SUCCESS, 'Thêm sản phẩm thành công!');
        $sanpham = SanPham::take(8)->get();
        $loaisanpham = LoaiSanPham::take(6)->get();
        $khuyenmai = Khuyenmai::all();
        return $this->render(
            'home/index',
            [
                'sanpham' => $sanpham,
                'loaisanpham' => $loaisanpham,
                'khuyenmai' => $khuyenmai,
                'hoadon' => $hoadon
            ]
        );
    }
    public function giohangget()
    {
        $hoadon = Hoadon::all();
        $sanpham = SanPham::take(8)->get();
        $loaisanpham = LoaiSanPham::take(6)->get();
        $khuyenmai = Khuyenmai::all();
        return $this->render(
            'home/index',
            [
                'sanpham' => $sanpham,
                'loaisanpham' => $loaisanpham,
                'khuyenmai' => $khuyenmai,
                'hoadon' => $hoadon
            ]
        );
    }


    public function sanphamdaxem()
    {
        $sanpham_xem = [];
        $flag = 0;
        if (isset($_SESSION["B1909982"])) {
            foreach ($_SESSION["B1909982"] as $sanpham) {
                $sanpham_xem[] = SanPham::where('id', $sanpham['id'])->first();
            }
        }
        if ($sanpham_xem == null)
            $flag = 1;
        return $this->render('home/sanphamdaxem', [
            'sanpham' => $sanpham_xem,
            'flag' => $flag

        ]);
    }
}
