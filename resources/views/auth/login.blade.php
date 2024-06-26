<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Dashboard</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" type="text/css" href="{{ asset('login.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "e72e959c-79cd-4537-92aa-9b1b009e79e1";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
</head>
<style>
    .form-control::-webkit-input-placeholder {
        font-size: 15px;
        font-family: sans-serif;
    }

    /*support mozilla*/
    .form-control:-moz-input-placeholder {
        font-size: 15px;
        font-family: sans-serif;
    }

    .form-new {
        padding: 7px 10px !important;
        margin: 15px 0px;
    }
</style>

<body class="main-bg">
    @if (session('error'))
        <div id="live">
            <div style="background: linear-gradient(180deg, #972c2cb3 0%, #972c2cb3 100%); color: white; border: solid #bb0808 2px; font-size:14px"
                class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Wrong ! {{ session('error') }} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="login-container text-c animated flipInX">

        <h3 class="text-whitesmoke">Sign In</h3>
        <p class="text-whitesmoke">Your Social Campaign</p>
        <div class="container-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mt-4" style="text-align: left">
                    <input type="email" name="email" input @error('email') is-invalid @enderror"
                        id="exampleInputEmail1" aria-describedby="emailHelp" class="form-control form-new"
                        placeholder="Your email ?" required>
                    <div id="emailHelp" class="form-text m-1" style="color: gray">We'll never share your email with
                        anyone else.</div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" style="text-align: left">
                    <input type="password" input @error('password') is-invalid @enderror" id="exampleInputPassword1"
                        name="password" class="form-control form-new" placeholder="Password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-check" style="text-align: left">
                    <input type="checkbox" class="form-check-input check {{ old('remember') ? 'checked' : '' }}"
                        id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1" style="color: gray">Keep me signed in</label>
                </div>
                <div class="mt-5 mb-3" style="color: white">Don't have an account ? <a style="text-decoration: none"
                        href="{{ route('register') }}">Sign up</a></div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary mt-3" type="submit">Sign In</button>
                </div>
            </form>
        </div>
        <p class="mt-4" style="color:gray"><small>Alpha&copy;All rights reserved.</small>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
