<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset("admin/assets")}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset("admin/assets")}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset("admin/assets")}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset("admin/assets")}}/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post" action="{{ route('createLogin') }}">
                    @csrf



                    @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  <div class="form-group">
                    <label> email </label>
                    <input type="email" name="email"  class="form-control p_input">
                  </div>

                  @error('password')
                  <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Password </label>
                    <input type="text" name="password" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">

                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>



                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset("admin/assets")}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset("admin/assets")}}/js/off-canvas.js"></script>
    <script src="{{asset("admin/assets")}}/js/hoverable-collapse.js"></script>
    <script src="{{asset("admin/assets")}}/js/misc.js"></script>
    <script src="{{asset("admin/assets")}}/js/settings.js"></script>
    <script src="{{asset("admin/assets")}}/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
