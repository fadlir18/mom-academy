<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="title-area">
            <img src="{{ asset('images/logo/gojek.png') }}" alt="logo">
            <h3>SADEWA</h3>
        </div>
        <div class="box-area card">
            <div class="card-body">
                <h1>Sign In</h1>
                <p>Use your Google Account</p>
                <a href="{{ url('/home') }}" type="button" class="btn btn-light">
                    <img src="{{ asset('images/logo/google.png') }}" alt="logo-google">
                    Sign in with Google
                </a>
            </div>
        </div>
    </div>
    <img class="bg-image" src="{{ asset('images/layout.png') }}" alt="bg-image">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="{{ asset('js/login2.js') }}"></script>
</body>

</html>