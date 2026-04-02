<!doctype html>
<html lang="en">
  <!--begin::Head-->
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        {{-- <link rel="preload" href="{{ Vite::asset('resources/scss/app.scss') }}" as="style"> --}}

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body class="login-page bg-body-secondary">
    <div class="login-box">
      <div class="login-logo">
        <h4 class="test-css">Login</h4>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="{{ route('admin.login.submit') }}" id="loginForm" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" />
              <div class="input-group-text">
                <span class="bi bi-envelope"></span>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" />
              <div class="input-group-text">
                <span class="bi bi-lock-fill"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                {{-- <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                </div> --}}
              </div>
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
            </div>
          </form>

          {{-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.html" class="text-center"> Register a new membership </a>
          </p> --}}
        </div>
      </div>
    </div>

    <style>
      .customerror {
        top: 100% !important;
      }
    </style>

    @if(session('success'))
      <script type="module">
          toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script type="module">
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    @if($errors->any())
        <script type="module">
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        </script>
    @endif
   
  </body>
</html>
