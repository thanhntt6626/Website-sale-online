<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Chỉnh sửa nơi sản xuất</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8 " style="margin-bottom: 25px;">
        <div class="col-10 row align-items-start ">
            <div class="col-8 mt-3">
                <a href="<?= request()->baseUrl() ?>/nhasanxuat" class="btn btn-primary">Đi tới danh sách nơi sản xuất</a>
            </div>
        </div>
        <form action="/nhasanxuat/edit" method="POST">
            <div class="form-row">
                <label style="width:15%;">ID nhà sản xuất </label>
                <input type="text" id="nhasanxuat_id" name="nhasanxuat_id" readonly value="<?= $nhasanxuat->id ?>" class="form-control form-input">
            </div>
            <div class="form-row">
                <label style="width:15%;">Tên nhà sản xuất</label>
                <input required type="text" name="nhasanxuat_name" class="form-control form-input " placeholder="Ten nha san xuat" value="<?= $nhasanxuat->name ?? null ?>" />
                <div class="invalid-feedback">
                    <?= $errors['username'] ?? null; ?>
                </div>
                <label style="color: red;"> <?= $errors['username'] ?? null; ?></label>

            </div>

            <div class="form-row">
                <label style="width:15%;">Ngày sản xuất</label>
                <input required type="date" name="nhasanxuat_ngaymoi" class="form-control form-input " value="<?= $nhasanxuat->ngaysx ?>" />
                <div class="invalid-feedback">
                    <?= $errors['ngaysanxuat'] ?? null; ?>
                </div>
            </div>
            <div class="form-group" style="text-align: center;margin-top:30px;">
                <button type="submit" class="btn btn-primary btn-block">
                    Lưu
                </button>
            </div>
        </form>
    </div>
</div>



<?php $this->stop(); ?>