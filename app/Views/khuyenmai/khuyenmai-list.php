<div class="khuyenmai-list list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Tên khuyến mãi</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Phần trăm khuyến mãi</th>
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày kết thúc</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->name ?></td>
                    <td><?= $item->sanpham->name ?></td>
                    <td><?= $item->phantram ?></td>
                    <td><?= $item->NgayBD ?></td>
                    <td><?= $item->NgayKT ?></td>
                    <td>
                        <a href="<?= '/khuyenmai/edit/' . $item->id ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>
                        <a class="delete" href="<?= request()->baseUrl() ?>/khuyenmai/delete" data-id="<?= $item->id ?>" title="Delete<?= $item->name ?>" data-name="<?= $item->name ?>" data-return-url="<?= request()->fullUrl(); ?>">
                            <img src="/assets/images/logo/delete.png" style="width:30px;">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>