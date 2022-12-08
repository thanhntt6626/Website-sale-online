<div class="list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#No</th>
                <th scope="col">Mã Khu Vực</th>
                <th scope="col">Tên Khu vực</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($khuvuc as $khuvucs) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $khuvucs->makhuvuc; ?></td>
                    <td><?= $khuvucs->TenKV; ?></td>
                    <td class="action-icon">
                        <a href="<?= '/khuvuc/edit/' . $khuvucs->id ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>                 
                        <a class="remove-city delete" style="margin: left 0px !important;" data-id="<?= $khuvucs->id;?>" href="/khuvuc/delete">
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