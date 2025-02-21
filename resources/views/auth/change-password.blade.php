@extends('layouts.dashboard_navbar')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Change Password</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Dashboard Content ======= -->
    <section id="dashboard-content" class="dashboard-content">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
            <div class="container">
    <h2>Change Password</h2>
    
    <!-- Display Success Message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
            </div>
        </div>
    </section>

</main>
@endsection
