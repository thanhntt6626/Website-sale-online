<?php

namespace App\Controllers;

use App\Models\User;


use App\Http\Paginator;
use App\Http\Response;
use App\Models\Binhluan;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use App\Models\Khuyenmai;
use App\Models\SanPham;


class UserController extends BaseController
{
    public function showForm()
    {   
        $khuyenmai = Khuyenmai::all();
        $hoadon = Hoadon::all();
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
            $sanpham = SanPham::take(8)->get();
            $loaisanpham = LoaiSanPham::take(6)->get();

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
        $binhluan = Binhluan::all();
        $hoadon = Hoadon::all();
        $user = user::paginate($this->getPerPage());
        $total = user::count();
        $paginator = new Paginator($this->request, $user, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'user/user-list',
                [
                    'user' => $user,
                    'paginator' => $paginator,
                    'binhluan' => $binhluan,
                    'hoadon' => $hoadon
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'user/user',
            [
                'user' => $user,
                'paginator' => $paginator,
                'binhluan' => $binhluan,
                'hoadon' => $hoadon
            ]
        );
    }

    public function showEditForm($id)
    {
        $user  = user::where('id_nguoidung', $id)->first();


        return $this->render(
            'user/user-edit',
            [
                'user' => $user,

            ]
        );
    }

    public function edit()
    {
        $id = $this->request->post('id');
        $id_quyen = $_POST['id_quyen'];
        $user = user::where('id_nguoidung', $id)->first();
        $user->quyenSD = $id_quyen;
        $user->save();
        session()->setFlash(\FLASH::SUCCESS, 'Thay đổi thành công!');

        redirect('/user');
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $user = user::where('id_nguoidung', $id)->first();
        if ($this->request->ajax()) {
            if ($user) {
                if ($user->delete()) {
                    return $this->json([
                        'message' => $user->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa thành phố!'
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
    public function deletekhongchoxoa()
    {
        session()->setFlash(\FLASH::INFO, 'Tài khoản không được xóa do khóa ngoại có dữ liệu !');
        $this->showForm();
    }
}
