<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Register Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <title>Login | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="register-page bg-body-secondary">
    <div class="register-box">
      <!-- /.register-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header">
          <a
            href="../index2.html"
            class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"
          >
            <h1 class="mb-0"><b>Admin</b>LTE</h1>
          </a>
        </div>
        <div class="card-body register-card-body">
          <p class="register-box-msg">Register a new membership</p>

           @if ($errors->any())
                    <div class="alert alert-danger p-2 small">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

          <form action="{{ route('register.submit') }}" method="post">
             @csrf
            <div class="input-group mb-1">
              <div class="form-floating">
                <input name="name" type="text" class="form-control" placeholder="" />
                <label for="registerFullName">Full Name</label>
              </div>
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="input-group mb-1">
              <div class="form-floating">
                <input name="email" type="email" class="form-control" placeholder="" />
                <label for="registerEmail">Email</label>
              </div>
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="input-group mb-1">
              <div class="form-floating">
                <input name="password" type="password" class="form-control" placeholder="" />
                <label for="registerPassword">Password</label>
              </div>
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <!--begin::Row-->
            <div class="row">
              <div class="col-8 d-inline-flex align-items-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>

         
          <p class="mb-0">
            <a href="/" class="link-primary text-center"> I already have a membership </a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
    </div>
    <!-- /.register-box -->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    
    <!--end::OverlayScrollbars Configure--><!--begin::Color Mode Toggle (#6010)-->
   
    <!--end::Color Mode Toggle-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
