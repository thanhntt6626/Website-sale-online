<div class="list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#No</th>
                <th scope="col">ID</th>
                <th scope="col">Tên Loại Sản Phẩm</th>
                <th scope="col">Tên Khu vực</th>
                <th scope="col">Hình Ảnh Loại Sản Phẩm</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($loaisanpham as $loaisanphams) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $loaisanphams->id; ?></td>
                    <td><?= $loaisanphams->name; ?></td>
                    <td><?= $loaisanphams->khuvuc->TenKV; ?></td>
                    <td><img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanphams->image ?>" alt=""></td>
                    <td class="action-icon">
                        <a href="<?= '/loaisanpham/edit/' . $loaisanphams->id ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>
                        <?php
                        $flag = 0; // kiểm tra loại sản phẩm có tồn tại trong bảng sản phẩm không .Neus có thì khong hiện nút xóa nếu không tồn tại sẽ hiện
                        foreach ($sanpham as $sanphams) :
                            if ($sanphams->id_loai == $loaisanphams->id) :
                                $flag = 1;
                            endif;
                        endforeach;
                        if ($flag == 0) :
                        ?>
                            <a class="remove-city delete" style="margin: left 0px !important;" href="<?= request()->baseUrl(); ?>/loaisanpham/delete" data-id="<?= $loaisanphams->id; ?>" title="Delete <?= $loaisanphams->name; ?>" data-name="<?= $loaisanphams->name; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php else : ?>
                            <a class="remove-city" style="margin: left 0px !important;" href="/loaisanpham/delete">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>