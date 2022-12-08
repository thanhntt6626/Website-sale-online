<div class="list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#No</th>
                <th scope="col">ID</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Ngày </th>
                <th colspan="2" scope="col" style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($hoadon as $hoadon) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $hoadon->ID; ?></td>
                    <td><?= $hoadon->nguoidung->username; ?></td>
                    <td><?= $hoadon->sanpham->name; ?></td>
                    <td><?= $hoadon->soluong; ?></td>
                    <td><?= date_format($hoadon->created_at," H:i:s d/m/Y")  ?></td>
                    <td></td>
                    <td class="action-icon">
                        <a class="remove-city delete" href="<?= request()->baseUrl(); ?>/hoadon/delete" data-id="<?= $hoadon->ID; ?>" title="Delete <?= $hoadon->ID; ?>" data-name="<?= $hoadon->ID; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                            <img src="/assets/images/logo/delete.png" style="width:30px;">
                        </a>
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