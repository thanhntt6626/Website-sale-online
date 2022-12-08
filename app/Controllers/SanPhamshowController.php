<?php

namespace App\Controllers;

use App\Models\SanPham;
use App\Http\Paginator;
use App\Http\Response;

class SanPhamshowController extends BaseController
{
    public function showList()
    {
        $sanpham = SanPham::paginate($this->getPerPage());
        $total = SanPham::count();
        $paginator = new Paginator($this->request, $sanpham, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'sanpham/sanpham-listshow',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'sanpham/sanphamm',
            [
                'sanpham' => $sanpham,
                'paginator' => $paginator,
            ]
        );
    }
    public function sanphamshow()
    {
        $sanpham = SanPham::paginate($this->getPerPage());
        $total = SanPham::count();
        $paginator = new Paginator($this->request, $sanpham, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'sanpham/sanpham-listshow',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'sanpham/sanphamm',
            [
                'sanpham' => $sanpham,
                'paginator' => $paginator,
            ]
        );
    }

    public function giohang()
    {
        if (auth() == null) {
            session()->setFlash(\FLASH::INFO, 'Vui lòng đăng nhập khi muốn mua hàng!');
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
        session()->setFlash(\FLASH::SUCCESS, 'Thêm sản phẩm thành công!');


        $sanpham = SanPham::paginate($this->getPerPage());
        $total = SanPham::count();
        $paginator = new Paginator($this->request, $sanpham, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'sanpham/sanpham-listshow',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'sanpham/sanphamm',
            [
                'sanpham' => $sanpham,
                'paginator' => $paginator,
            ]
        );
    }
}
