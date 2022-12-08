<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6" style="margin-top: 10px;margin-bot:20px;">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5 text-dark">Đăng ký tài khoản</h2>
              <form class="row g-3 needs-validation" action="/register" method="POST" id="form_register" novalidation>
                <div class="form-floating mb-3">
                  <input type="username" name="username" value="<?= $params['username'] ?? null ?>" class="form-control " id="username" placeholder="Your username" required>
                  <label for="username">Username</label>
                  <div class="invalid-feedback">
                   
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="diachi" value="<?= $params['diachi'] ?? null ?>" class="form-control" id="email" placeholder="Your Addresss" required>
                  <label for="diachi">Address</label>
                  <div class="invalid-feedback">
                  
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" name="email" value="<?= $params['email'] ?? null ?>" class="form-control" id="email" placeholder="Your email" required>
                  <label for="email">Email address</label>
                  <div class="invalid-feedback">
                   </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="sdt" value="<?= $params['sdt'] ?? null ?>" class="form-control <?= isset($errors['sdt']) ? 'is-invalid' : '' ?>" id="sdt" placeholder="Your Number Phone" required>
                  <label for="sdt">Số điện thoại</label>
                  <div class="invalid-feedback">
                    <?= $errors['sdt'] ?? null; ?>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password" value="<?= $params['password'] ?? null ?>" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" placeholder="Your password" required>
                  <label for="password">Password</label>
                  <div class="invalid-feedback">
                    <?= $errors['password'] ?? null; ?>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="confirm_password" value="<?= $params['confirm_password'] ?? null ?>" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>" id="confirm_password" placeholder="Confirm Password" required>
                  <label for="confirm_password">Confirm Password</label>
                  <div class="invalid-feedback">
                    <?= $errors['confirm_password'] ?? null; ?>
                  </div>
                </div>
                <div class="form-floating">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="" id="terms" required>
                    <label for="form-check-input">Agree to terms and conditions</label>
                    <div class="invalid-feedback">You must agree before submitting!</div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>
                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login" class="fw-bold text-body" style="text-decoration: none;"><u>Login here</u></a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->stop(); ?>