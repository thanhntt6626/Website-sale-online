<?php
namespace App\Controllers;

use App\Models\KhuVuc;
use App\Models\Khuyenmai;
use App\Models\Hoadon;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Http\Paginator;
use App\Http\Response;

class KhuVucController extends BaseController
{
    private $isten_khu_vuc ="";
    private $isMa_Khuvuc="";
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
        return $this->render('khuvuc/khuvuc-add');
    }
    public function add()
    {
        $Ma_Khuvuc = $_POST['makhuvuc'] ?? null;
        $ten_khu_vuc = $_POST['khuvuc_name'] ?? null;
        $isten_khu_vuc = KhuVuc::where('TenKV', $ten_khu_vuc)->first();
        $isMa_Khuvuc = KhuVuc::where('makhuvuc', $Ma_Khuvuc)->first();
        if($isten_khu_vuc||$isMa_Khuvuc){
            session()->setFlash(\FLASH::ERROR, 'Mã Khu vực hoặc tên Khu vực đã tồn tại, vui lòng nhập lại!');
            return $this->showAddForm();
        }
        else{
            if ($Ma_Khuvuc != null) {
                $pattern = "/^[a-z0-9'ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i";
                if (!preg_match($pattern,$Ma_Khuvuc)) {
                    session()->setFlash(\FLASH::ERROR, 'Mã Khu vực không hợp lệ! Chỉ cho phép ký tự và khoảng trắng!');
                    return $this->showAddForm();
                } else {
                     $makhuvuc = null;
                    if (!$makhuvuc) {
                        $makhuvuc = new KhuVuc();
                        $makhuvuc->TenKV = $ten_khu_vuc;
                        $makhuvuc->makhuvuc = $Ma_Khuvuc;
                        $makhuvuc->save();
                        session()->setFlash(\FLASH::SUCCESS, 'Khu vực đã được thêm thành công!');
                    } else {
                        session()->setFlash(\FLASH::ERROR, 'Mã khu vực đã tồn tại!');
                    }
                }
            } else {
                session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id khu vực!');
            }
            return $this->showAddForm();
        }
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

        $khuvuc = KhuVuc::paginate($this->getPerPage());
        $total = KhuVuc::count();
        $paginator = new Paginator($this->request, $khuvuc, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'khuvuc/khuvuc-list',
                [
                    'khuvuc' => $khuvuc,
                    'paginator' => $paginator
                ]
            );

            return $this->json(['data' => $html]);
        }
        return $this->render(
            'khuvuc/khuvuc',
            [
                'khuvuc' => $khuvuc,
                'paginator' => $paginator
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
        $khuvuc = KhuVuc::find($id);
        $isten_khu_vuc ="";
        $isMa_Khuvuc="";
        return $this->render(
            'khuvuc/khuvuc-edit',
            [
                'khuvuc' => $khuvuc
            ]
        );
    }

    public function edit()
    {
        $id = $this->request->post('id');
        $KhuVuc = KhuVuc::find($id);
        $name = $_POST['khuvuc_name'];
        $Ma_Khuvuc = $_POST['khuvuc_makhuvuc'];
        $ok = 1;
        // $isten_khu_vuc = KhuVuc::where('TenKV', $name)->first();
        // $isMa_Khuvuc = KhuVuc::where('makhuvuc', $Ma_Khuvuc)->first();
        if ($Ma_Khuvuc) {
            if ($Ma_Khuvuc != '') {
                $pattern = "/^[a-z 'ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ0123456789]+$/i";
                if (!preg_match($pattern, $Ma_Khuvuc)) {
                    session()->setFlash(\FLASH::ERROR, 'Mã khu vực không hợp lệ! Chỉ cho phép ký tự và khoảng trắng và độ dài tối đa là 191');
                    $ok = 0;
                } else {
                    $KhuVuc->TenKV = $name;
                    $KhuVuc->makhuvuc = $Ma_Khuvuc;
                    $KhuVuc->save();
                    session()->setFlash(\FLASH::SUCCESS, 'Khu vực đã thay đổi thành công!');
                }
            } else {
                session()->setFlash(\FLASH::ERROR, 'Khu vực không được để trống!');
                $ok = 0;
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id khu vực!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect('/khuvuc');
        }
        return $this->render('khuvuc/khuvuc-edit', ['khuvuc' => $KhuVuc]);
        
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $khuvuc = KhuVuc::find($id);
        if ($this->request->ajax()) {
            if ($khuvuc) {
                if ($khuvuc->delete()) {
                    return $this->json([
                        'message' => $khuvuc->TenKV . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa'
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
?>