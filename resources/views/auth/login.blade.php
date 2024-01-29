<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Dashboard</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" type="text/css" href="{{ asset('login.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('alpha.png') }}">
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

<body class="">
    @if (session('error-login'))
        <div id="live">
            <div class="danger-alert">
                <i class="far fa-check-circle shine-alert"></i> &nbsp; &nbsp;
                <span>Sorry! {{ session('error-login') }}</span>
            </div>
        </div>
    @endif
    <div class="container-new">
        <div class="left-side">
            <div style="padding:10px 20px;width:500px">
                <h5 style="font-family: fantasy">Sign In</h5>
                <p>Your Social Campaigns</p>
                <hr class="hr-text" data-content="Your Account">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3" style="text-align: left">
                        <label for="exampleInputEmail1" class="form-label m-1">Email address</label>
                        <input type="email" name="email"
                            class="form-control input @error('email') is-invalid @enderror" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text m-1">We'll never share your email with anyone else.</div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3" style="text-align: left">
                        <label for="exampleInputPassword1" class="form-label m-1">Password</label>
                        <input type="password" name="password"
                            class="form-control input @error('password') is-invalid @enderror"
                            id="exampleInputPassword1">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-check" style="text-align: left">
                        <input type="checkbox" class="form-check-input check {{ old('remember') ? 'checked' : '' }}"
                            id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                    </div>
                    <div class="d-grid gap-2 mt-5 mb-3">
                        <button class="btn btn-primary mt-2" type="submit">Sign In</button>
                    </div>
                </form>
                {{-- <div class="d-grid">
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                </div> --}}
            </div>
        </div>
        <div class="right-side">
            <img src="{{ asset('alpha.png') }}" width="190px" height="190px" alt="no-image" style="margin: -25px 0px">
            <div class="feedback">
                <h4>Drop-off and Pickup Services</h4>
                We value your <span style="color: #ff32f7"> feedback </span>and aim to provide you with the best
                <span style="color: #ff32f7">experience</span>. Your thoughts are important to
                us.Please feel free to share any concerns or <span style="color: #ff32f7"> suggestion </span> you may
                have. Your feedback helps us improve
                and
                ensures that we continue to meet your expectations.
                <br>
                <br>
                Thank you for taking the time to contact us.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
