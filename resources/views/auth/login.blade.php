<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('user/css/loginstyle.css') }}" />
    <title>Document</title>
</head>

<body class="background ">
    <section class="login ">
        <div style="margin-top: 100px" class="row ">
            <div class="col-12 col-sm-8 col-md-5 mx-auto my-auto">
                <div class="card ">
                    <div class="card-body">
                        <h4>Welcome to Tropiraya Rentals</h4>
                        <p>Please sign-in to your account and start the adventure</p>
                        <x-validation-errors class="mb-4 " />
                        <form action="{{ route('login') }}" id="validate" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="name@example.com" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" />
                            </div>
                            <button type="submit" class="btn tombol">Masuk</button>
                        </form>
                        @if (Route::has('password.request'))
                            <a style="color: inherit" class="text-decoration-none"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <div class="d-flex justify-content-center mt-4">
                            <p>New on our platform?</p>
                            <a href="{{ route('register') }}">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <img class="foto position-absolute bottom-0 end-0" src="public/authv1tree2png1311-r8y-300h.png"
            alt="" />
        <img class="foto position-absolute bottom-0 start-0" src="public/authv1treepng1310-z2hr-200w.png"
            alt="" />
        <img class="position-absolute bottom-0 end-0" src="public/authv1masklightpng139-owua-200h.png" alt="" />
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('user/js/validasi.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $("#validate").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
        });
    </script>
</body>

</html>
