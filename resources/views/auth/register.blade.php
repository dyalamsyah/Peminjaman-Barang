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

<body class="background">
    <section style="margin-top: 40px;margin-bottom: 40px" class="login ">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-5 m-auto">
                <div class="card  ">
                    <div class="card-body">
                        <h4>Adventure starts here</h4>
                        <p>Make your app management easy and fun!</p>
                        <form name="validate" id="validate" action="{{ route('register') }}" method="POST">
                            <x-validation-errors class="mb-4" />
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="nama"
                                        placeholder="username" required />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="name@example.com" required />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" name="nik" class="form-control" id="nik" required />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="telp" class="form-label">No HP</label>
                                    <input type="number" name="telp" class="form-control" id="telp" required />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option value="">Pilih Gender</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" required />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paswword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="paswwordL"
                                        required />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" required />
                                </div>
                            </div>

                            <button type="submit" class="btn tombol">Daftar</button>
                        </form>
                        <div class="d-flex justify-content-center mt-4">
                            <p>Already have an account??</p>
                            <a href="{{ route('login') }}">Sign in instead</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <img class="foto position-absolute bottom-0 end-0" src="public/authv1tree2png1311-r8y-300h.png" alt="" />
    <img class="foto position-absolute bottom-0 start-0" src="public/authv1treepng1310-z2hr-200w.png" alt="" />
    <img class="position-absolute bottom-0 end-0" src="public/authv1masklightpng139-owua-200h.png" alt="" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user/js/validasi.js') }}"></script>
    <script type="text/javascript">
        $("#validate").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                nik: {
                    required: true,
                    number: true,
                },
                telp: {
                    required: true,
                    number: true,
                },
                gender: {
                    required: true,
                },
                alamat: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#paswwordL"
                }
            },
        });
    </script>
</body>

</html>
