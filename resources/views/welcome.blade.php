<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="login-page bg-body-secondary d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="login-box" style="width: 360px;">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1 class="mb-0"><b>FINGO APP</h1>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg text-center mb-4">Sign in to start your session</p>

                @if ($errors->any())
                    <div class="alert alert-danger p-2 small">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="post">
                    @csrf
                    
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

                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-box" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
                        </div>
                        <a href="{{ route('register') }}">register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    // Listen for when an input field gets focus
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', () => {
            // Give the keyboard a split second to animate up, then scroll to the input
            setTimeout(() => {
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 300);
        });
    });
</script>