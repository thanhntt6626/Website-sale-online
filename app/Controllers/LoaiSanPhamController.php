<?php

namespace App\Controllers;

use App\Models\KhuVuc;
use App\Models\Khuyenmai;
use App\Models\Hoadon;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Http\Paginator;
use App\Http\Response;

class LoaiSanPhamController extends BaseController
{
    public function showAddForm()
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
        $khuvuc = KhuVuc::all();
         return $this->render(
                'loaisanpham/loaisanpham-add',
                [
                    'khuvuc' => $khuvuc
                ]
            );
    }
    public function add()
    {
        $ten_loai = $_POST['loaisanpham_name'] ?? null;
        $id_khuvuc = $_POST['id_khuvuc'] ?? null;
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/loaisanpham/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
            ) {
                session()->setFlash(\FLASH::WARNING, 'Lỗi, chỉ định dạng JPG, JPEG, PNG & GIF được cho phép.');
            }
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Hình ảnh loại sản phẩm tải lên thất bại!');
            }
        }
        if ($ten_loai != null) {
            $pattern = "/^[a-z 'ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i";
            if (!preg_match($pattern, $ten_loai)) {
                session()->setFlash(\FLASH::ERROR, 'Tên loại sản phẩm không hợp lệ! Chỉ cho phép ký tự và khoảng trắng!');
                return $this->showAddForm();
            } else {
                $loaisanpham = LoaiSanPham::wherename($ten_loai)->first();
                if (!$loaisanpham) {
                    $loaisanpham = new LoaiSanPham();
                    $loaisanpham->name = $ten_loai;
                    $loaisanpham->id_khuvuc =$id_khuvuc;
                    $loaisanpham->image = $_FILES['image']['name'];
                    $loaisanpham->save();
                    session()->setFlash(\FLASH::SUCCESS, 'Loại sản phẩm đã được thêm thành công!');
                } else {
                    session()->setFlash(\FLASH::ERROR, 'Tên loại sản phẩm đã tồn tại!');
                }
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id loại sản phẩm!');
        }
        return $this->showAddForm();
    }
    public function showList()
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

        $loaisanpham = LoaiSanPham::paginate($this->getPerPage());
        $total = LoaiSanPham::count();
        $paginator = new Paginator($this->request, $loaisanpham, $total, 15);
        $paginator->onEachSide(2);
        $sanpham = SanPham::all();
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'loaisanpham/loaisanpham-list',
                [
                    'loaisanpham' => $loaisanpham,
                    'paginator' => $paginator,
                    'sanpham' => $sanpham
                ]
            );

            return $this->json(['data' => $html]);
        }
        return $this->render(
            'loaisanpham/loaisanpham',
            [
                'loaisanpham' => $loaisanpham,
                'paginator' => $paginator,
                'sanpham' => $sanpham
            ]
        );
    }
    public function showEditForm($id)
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
        $loaisanpham = LoaiSanPham::find($id);
        $khuvuc = KhuVuc::all();
        return $this->render(
            'loaisanpham/loaisanpham-edit',
            [
                'loaisanpham' => $loaisanpham,
                'khuvuc' => $khuvuc
            ]
        );
    }
    public function edit()
    {
        $id = $this->request->post('id');
        $loaisanpham = LoaiSanPham::find($id);
        $name = $_POST['loaisanpham_name'];
        $id_khuvuc = $_POST['id_khuvuc'];
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/loaisanpham/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
            ) {
                session()->setFlash(\FLASH::WARNING, 'Lỗi, chỉ định dạng JPG, JPEG, PNG & GIF được cho phép.');
            }
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Hình ảnh loại sản phẩm tải lên thất bại!');
            }
            $loaisanpham->image = $_FILES['image']['name'];
        }
        $ok = 1;
        if ($loaisanpham) {
            if ($name != '') {
                $pattern = "/^[a-z 'ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i";
                $length = strlen($name);
                if (!preg_match($pattern, $name)) {
                    session()->setFlash(\FLASH::ERROR, 'Loai loại sản phẩm không hợp lệ! Chỉ cho phép ký tự và khoảng trắng và độ dài tối đa là 191');
                    $ok = 0;
                } else {
                    $loaisanpham->name = $name;
                    $loaisanpham->id_khuvuc =$id_khuvuc;
                    $loaisanpham->save();
                    session()->setFlash(\FLASH::SUCCESS, 'Loai loại sản phẩm đã thay đổi thành công!');
                }
            } else {
                session()->setFlash(\FLASH::ERROR, 'Loai loại sản phẩm không được để trống!');
                $ok = 0;
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id loại sản phẩm!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect('/loaisanpham');
        }
        return $this->render('loaisanpham/loaisanpham-edit', ['loaisanpham' => $loaisanpham]);
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $loaisanpham = LoaiSanPham::find($id);
        if ($this->request->ajax()) {
            if ($loaisanpham) {
                if ($loaisanpham->delete()) {
                    return $this->json([
                        'message'  => $loaisanpham->name . ' Đã được xóa thành công.'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message'  => 'Không thể xóa'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message'   => 'ID không tồn tại!'
            ], Response::HTTP_NOT_FOUND);
        }
        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }
    public function showsanpham($id)
    {
        $loaisanpham = LoaiSanPham::where('id', $id)->first();
        $sanpham = SanPham::where('id_loai', $id)->paginate($this->getPerPage());
        $countsanpham = SanPham::where('id_loai', $id)->count();
        $loaisanpham = LoaiSanPham::where('id', $id)->first();
        $sanpham_mua = [];
        $paginator = new Paginator($this->request, $sanpham, $countsanpham, 25);
        $paginator->onEachSide(2);
        if (isset(auth()->username)) {
            $user = auth()->username;
            if (isset($_SESSION[$user])) {
                foreach ($_SESSION[$user] as $muahnag) {
                    if (isset($muahnag['id'])) {
                        if ($id != $muahnag['id']) {
                            $sanpham_mua[] = SanPham::where('id', $muahnag['id'])->first();
                        } else {
                            unset($_SESSION[$user][$id]);
                        }
                    }
                }
            }
            return $this->render(
                'loaisanpham/sanphamtheoloai',
                [
                    'sanpham' => $sanpham,
                    'loaisanpham' => $loaisanpham,
                    'countsanpham' => $countsanpham,
                    'paginator' => $paginator,
                    'sanpham_mua' => $sanpham_mua,
                    'user' => $user
                ]
            );
        }
          
        return $this->render(
                'loaisanpham/sanphamtheoloai',
                [
                    'sanpham' => $sanpham,
                    'loaisanpham' => $loaisanpham,
                    'countsanpham' => $countsanpham,
                    'paginator' => $paginator
                   
                ]
            );
        
    }
    public function deletekhongchoxoa()
    {
        session()->setFlash(\FLASH::INFO, 'Loại sản phẩm không được xóa do có sản phẩm thuộc loại sản phẩm!');
        $this->showList();
    }
}
