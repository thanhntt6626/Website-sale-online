<?php

namespace App\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\Khuyenmai;
use App\Models\hoadon;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\User;
use DateTime;

class HoadonController  extends BaseController
{

    public function showForm()
    {
        session()->setFlash(\FLASH::SUCCESS, 'Thanh toán thành công, quý khách kiểm tra hóa đơn trước khi thoát!');
        $sanpham_mua = [];
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        if (isset($_SESSION[$username])) {
            foreach ($_SESSION[$username] as $muahnag) {
                if (isset($muahnag['id'])) {
                    $sanpham_mua[] = SanPham::where('id', $muahnag['id'])->first();
                    $sanpham = SanPham::where('id', $muahnag['id'])->first();
                    $hoadon = new Hoadon();
                    $hoadon->id_sanpham = $sanpham->id;
                    $hoadon->soluong = $muahnag['soluong'];
                    $hoadon->id_nguoidung = $user->id_nguoidung;
                    $hoadon->ngay = date("Y/m/d");
                    $hoadon->save();
                    $sanphams = SanPham::where('id', $sanpham->id)->first();
                    $sanphams->soluong -= $hoadon->soluong;
                    $sanphams->save();
                }
            }
        }
        return $this->render('hoadon/hoadon-show', ['sanpham_mua' => $sanpham_mua, 'user' => $user]);
    }
    public function showList()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền!');
            $sanpham = SanPham::take(8)->get();
            $loaisanpham = LoaiSanPham::take(6)->get();
            $khuyenmai = Khuyenmai::all();
            $hoadon = Hoadon::all();
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
        if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Admin') {
            $hoadon = hoadon::paginate($this->getPerPage());
            $total = hoadon::count();
            $paginator = new Paginator($this->request, $hoadon, $total, 15);
            $paginator->onEachSide(2);
            if ($this->request->ajax()) {
                $html = $this->view->render(
                    'hoadon/hoadon-list',
                    [
                        'hoadon' => $hoadon,
                        'paginator' => $paginator,
                    ]
                );
                return $this->json(['data' => $html]);
            }
            return $this->render(
                'hoadon/hoadon',
                [
                    'hoadon' => $hoadon,
                    'paginator' => $paginator,
                ]
            );
        }
    }

    public function delete()
    {
        $id = $this->request->post('id');
        $hoadon = hoadon::where('ID', $id)->first();
        if ($this->request->ajax()) {
            if ($hoadon) {
                if ($hoadon->delete()) {
                    return $this->json([
                        'message' => $hoadon->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa hóa đơn!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'ID hóa đơn không tồn tại!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }

    public function showOk()
    {
        $user = auth()->username;
        $hoadon = Hoadon::all();
        unset($_SESSION[$user]);
        session()->setFlash(\FLASH::INFO, 'Cảm ơn bạn đã ủng hộ cửa hàng của chúng tôi!');
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
}
