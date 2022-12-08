<div class="nhasanxuat-list list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Tên nơi sản xuất</th>
                <th scope="col">Ngày sản xuất</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->ngaysx; ?></td>
                    <td>
                        <a href="<?= '/nhasanxuat/edit/' . $item->id ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>
                        <a class="delete-nhasanxuat" href="<?= request()->baseUrl() ?>/nhasanxuat/delete" data-id="<?= $item->id ?>" title="Edit <?= $item->name ?>" data-name="<?= $item->name ?>" data-return-url="<?= request()->fullUrl(); ?>">
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