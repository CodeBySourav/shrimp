@extends('layouts.navbar')
@section('content')
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
    }

    .flot-end {
        float: inline-end;
    }

    .breadcrumbs {
        background-size: cover;
        padding: 60px 0;
        text-align: center;
    }

    .reply-form {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-family: 'Arial', sans-serif;
        color: #444;
    }

    .form-group label {
        color: #555;
        font-size: 14px;
        font-weight: 500;
    }

    .form-group input {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .bg-sp{
        background-color: 
rgb(188 177 177) !important;
margin-top:5%;
    }
    </style> 
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/img/breadcrumbs-bg.jpg'); padding: 60px 0; background-size: cover;">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                
                <div class="reply-form bg-sp shadow-lg rounded p-4" style="width: 35%; max-width: 450px;font-size: 15px;">
                    <h3 class="text-center mb-4" style="font-weight: bold; color: #333;font-size: 24px;">Forgot Password?</h3>
                    <p class="text-center" style="color: #555;">
                    Enter your email address below, and we’ll send your password to your inbox.
                    </p>
                    <form method="POST" action="{{ route('password.reset') }}" class="mt-3">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" class="text-muted" style="font-size: 14px;">Email Address</label>
                            <input id="email" placeholder="Email Address" type="email" name="email" class="form-control mt-2"
                                style="padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;"
                                required autofocus>
                                @error('email')
                                    <small class="text-danger mt-1">{{ $message }}</small>
                                @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary"
                                style="width: 100%; padding: 10px 0; font-size: 16px; font-weight: bold; border-radius: 5px;"> 
                                Send Password </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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