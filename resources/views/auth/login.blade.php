
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Masuk - Kelurahan Airlangga</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-5">
                <div class="card-body mb-0">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                        <!-- Nested Row within Card Body -->

                                <div class="p-5">
                                    
                                    <div class="d-flex justify-content-center py-1">
                                   
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="logo.png" width="51" height="66">
                                        
                                        
                                      </div>
                                      <h5 class="card-title text-center pb-0 fs-4"><strong>KELURAHAN AIRLANGGA</strong></h5>
                                      @error('login_gagal')
                                      {{-- <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span> --}}
                                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                          <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      @enderror

                                    <form action="/postlogin" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="integer" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="NIP/NIK" name="nik_nip">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> --}}
                                        {{-- <a href="index.html" class="btn btn-success btn-user btn-block"> --}}
                                            <input type="submit"  class="btn btn-primary btn-lg btn-block" value="Masuk">
                                          
                                        </a>
                                        <hr>

                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                </div>
                          
                      
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>