<?php

namespace App\Controllers;

use App\Models\Khuyenmai;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\SanPham;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;

class KhuyenmaiController  extends BaseController
{

    public function showAddForm()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
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
        $sanpham = SanPham::all();
        return $this->render('khuyenmai/khuyenmai-add', ['sanpham' => $sanpham]);
    }
    public function add()
    {
        $name = $_POST['khuyenmai_name'] ?? null;
        $phantram = $_POST['khuyenmai_phantram'] ?? null;
        $id_sanpham = $_POST['id_sanpham'] ?? null;
        $khuyenmai_bd = $_POST['khuyenmai_bd'] ?? null;
        $khuyenmai_kt = $_POST['khuyenmai_kt'] ?? null;
        $ok = 1;
        if ($name != null) {
            $khuyenmais = Khuyenmai::where(['name' => $name])->first();
            if (!$khuyenmais && $ok == 1) {
                $khuyenmai = new khuyenmai();
                $khuyenmai->id_sanpham = $id_sanpham;
                $khuyenmai->name = $name;
                $khuyenmai->phantram = $phantram;
                $khuyenmai->NgayBD = $khuyenmai_bd;
                $khuyenmai->NgayKT = $khuyenmai_kt;
                $khuyenmai->save();
                session()->setFlash(\FLASH::SUCCESS, 'Khuyến mãi đã thêm thành công');
            } else {
                session()->setFlash(\FLASH::WARNING, 'Tên khuyến mãi đã tồn tại');
                //$errors = "khuyenmai name already existed!";
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Tên khuyến mãi không được để trống!');
            //$errors = "khuyenmai name can not null!";
        }
        return $this->showAddForm();
    }
    public function showList()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
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
        $items = Khuyenmai::paginate($this->getPerPage());
        $total = Khuyenmai::count();
        $paginator = new Paginator($this->request, $items, $total, 15);
        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render(
                'khuyenmai/khuyenmai-list',
                [
                    'items' => $items,
                    'paginator' => $paginator,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'khuyenmai/khuyenmai',
            [
                'items' => $items,
                'paginator' => $paginator,
            ]
        );
    }
    public function showEditForm($id)
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
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
        $khuyenmai = Khuyenmai::where('id', $id)->first();
        $sanpham = SanPham::all();
        return $this->render(
            'khuyenmai/khuyenmai-edit',
            [
                'khuyenmai' => $khuyenmai,
                'sanpham' => $sanpham
            ]
        );
    }
    public function edit()
    {
        $id = $this->request->post('id');
        $id_sanpham = $_POST['id_sanpham'] ?? null;
        $name = $_POST['khuyenmai_name'] ?? null;
        $phantram = $_POST['khuyenmai_phantram'] ?? null;
        $khuyenmai_bd = $_POST['khuyenmai_bd'] ?? null;
        $khuyenmai_kt = $_POST['khuyenmai_kt'] ?? null;
        $khuyenmai = Khuyenmai::where('id', $id)->first();
        $ok = 1;
        if ($khuyenmai->name) {
            if ($name != null) {

                $khuyenmai->id =  $id;
                $khuyenmai->id_sanpham = $id_sanpham;
                $khuyenmai->name = $name;
                $khuyenmai->phantram = $phantram;
                $khuyenmai->NgayBD = $khuyenmai_bd;
                $khuyenmai->NgayKT = $khuyenmai_kt;
                $khuyenmai->save();
                session()->setFlash(\FLASH::SUCCESS, 'Khuyến mãi đã thay đổi thành công!');
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id khuyến mãi!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect('/khuyenmai');
        }
        return $this->render(
            'khuyenmai/khuyenmai-edit',
            [
                'khuyenmai' => $khuyenmai,
            ]
        );
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $khuyenmai = Khuyenmai::where('id', $id)->first();
        if ($this->request->ajax()) {
            if ($khuyenmai) {
                if ($khuyenmai->delete()) {
                    return $this->json([
                        'message' => $khuyenmai->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'ID không tồn tại!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }
}
