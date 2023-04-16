<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - NMDPRA VMS</title>
    <link href="/theme/css/login.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/theme/assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<div class="login-page">

    <div class="form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input id="email" name="email" type="email" placeholder="Enter email address"
                    value="{{ old('email') }}" autocomplete="email" autofocus required />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <input id="password" type="password" name="password" placeholder="Enter password" required
                    autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            
            <div class="container">

                <div class="row">
                    <div class="col-sm-6">
                        @if (Route::has('password.request'))
                        <a class="small" href="{{ route('password.request') }}">Forgot
                            Password?</a>
                    @endif
                    </div>
                    <div class="col-sm-6">
                        <a href="/auth/redirect">Staff Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="/theme/js/login.js"></script>

</html>
