<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Đăng nhập - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{('public/backend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{('public/backend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{('public/backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{('public/backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{('public/backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{('public/backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{('public/backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{('public/backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{('public/backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{('public/backend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  .alert {
  padding: 10px;
  border: 1px solid #ccc;
  background-color: #dff0d8;
  color: #3c763d;
  border-radius: 4px;
}

.alert.alert-success {
  background-color: #d4edda;
  color: #155724;
  border-color: #c3e6cb;
  text-align: center;
}

</style>
<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{('public/backend/assets/img/logo.png')}}" alt="">
                  <span class="d-none d-lg-block">Admin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Đăng Nhập</h5>
                    <?php
                    $message = Session::get('message');
                    if($message){
                      echo '<div class="alert alert-success">' . $message . '</div>';
                      Session::put('message', null);
                    }
                    ?>
                  </div>

                  <form class="row g-3 needs-validation" action="{{URL::to('/admin-dashboard')}}" method="post" novalidate>
                    {{ csrf_field() }}
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tài khoản</label>
                      <div class="input-group has-validation">
                        <input type="text" name="admin_email" class="form-control" id="yourUsername" placeholder="Nhập tên đăng nhập" required>
                        <div class="invalid-feedback">Vui lòng nhập tên đăng nhập.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mật khẩu</label>
                      <input type="password" name="admin_password" class="form-control" id="passwordField" placeholder="Nhập mật khẩu" required>
                      <div class="invalid-feedback">Vui lòng nhập mật khẩu!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="showPassword">
                        <label class="form-check-label" for="showPassword">Hiện mật khẩu</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Đăng Nhập</button>
                    </div>                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{('public/backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/chart.js')}}/chart.umd.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{('public/backend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{('public/backend/assets/js/main.js')}}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const passwordField = document.getElementById('passwordField');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('click', function () {
        if (showPasswordCheckbox.checked) {
            passwordField.type = 'text'; // Hiện mật khẩu
        } else {
            passwordField.type = 'password'; // Ẩn mật khẩu
        }
    });
});

  </script>

</body>

</html>