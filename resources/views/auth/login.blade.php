@extends('layouts.navbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<style>
    .inputfield {
        padding: 10px;
        position: relative;
        z-index: 10;
    }

    .readmore {
        color: #fff;
        text-align: center;
        padding: 5px;
    }

    .reply-form {
        position: relative;
        z-index: 10;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 100%;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
        .reply-form {
            width: 90%;
            padding: 15px;
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .footer-links ul {
            padding-left: 0;
        }
    }

    .flot-end {
        float: end;
    }

    .main2{
        font-size: 15px;
    }
    </style>
    <main id="main" class="main2">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Login</h2>

                <div class="reply-form" style="width: 100%; max-width: 480px;">

                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col form-group inputfield">
                                <input name="username" type="text" class="form-control main2" placeholder="User name"
                                    required>
                                @error('username')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group inputfield">
                                <input name="password" type="password" class="form-control main2"  placeholder="Password"
                                    required>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary inputfield main2">Login</button>
                        </div>
 
                        <p class="readmore stretched-link">
                            New Visit? 
                            <a href="{{ route('vendor.register.submit') }}" class="inputfield">Sign up</a>
                        </p>

                        <div class="inputfield text-right d-flex justify-content-end gap-3">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-decoration-none">{{ __('Forgot Your Password?') }}</a>
                            @endif

                            @if (Route::has('username.request'))
                            <a href="{{ route('username.request') }}"
                                class="text-decoration-none">{{ __('Forgot Your Username?') }}</a>
                            @endif
                        </div>


                    </form>

                </div>

            </div>
        </div><!-- End Breadcrumbs -->
    </main><!-- End #main -->

    <script>
    @if(session('success'))
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "OK",
        });
    @endif

    @if(session('error'))
        swal({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            button: "OK",
        });
    @endif
</script>
    @endsection