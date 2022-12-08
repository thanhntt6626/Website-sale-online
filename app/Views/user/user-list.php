<div class="list-user list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#No</th>
                <th scope="col">ID</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</Address>
                </th>
                <th scope="col">Quyền</Address>
                </th>
                <th colspan="2" scope="col" style="text-align: center;">Actions</th>
                <!-- <th scope="col"></th> -->
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($user as $users) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $users->id_nguoidung; ?></td>
                    <td><?= $users->username; ?></td>
                    <td><?= $users->email; ?></td>
                    <td><?= $users->sdt; ?></td>
                    <td><?= $users->daichi ?></td>
                    <td><?= $users->quyenSD ?></td>
                    <td class="action-icon">
                        <a href="<?= '/user/edit/' . $users->id_nguoidung ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>
                    </td>
                    <td class="action-icon">
                        <?php
                        $flag = 0; //kiểm tra sản phẩm có tồn tại trong bảng sản phẩm không .Neus có thì khong hiện nút xóa nếu không tồn tại sẽ hiện
                        foreach ($binhluan as $binhluans) :
                            if ($binhluans->id_nguoidung == $users->id_nguoidung) :
                                $flag = 1;
                            endif;
                        endforeach;
                        foreach ($hoadon as $hoadons) :
                            if ($hoadons->id_nguoidung == $users->id_nguoidung) :
                                $flag = 1;
                            endif;
                        endforeach;
                        if ($flag == 0) : ?>
                            <a class="remove-city delete" href="<?= request()->baseUrl(); ?>/user/delete" data-id="<?= $users->id_nguoidung; ?>" title="Delete <?= $users->username; ?>" data-name="<?= $users->username; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php else : ?>
                            <a class="remove-city" style="margin: left 0px !important;" href="/user/delete">
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