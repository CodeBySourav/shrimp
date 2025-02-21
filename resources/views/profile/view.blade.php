@extends('layouts.dashboard_navbar')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Profile</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Profile Content ======= -->
    <section id="profile-content" class="profile-content">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3 class="text-center mb-4">Welcome to Your Profile</h3>
                    
                    <p class="text-center">Here you can view and update your personal and company details.</p>

                    <!-- Profile Details Card -->
                    <div class="card shadow-lg p-4">
                        <h4 class="mb-4" style="font-size: 1.5rem; font-weight: bold;">Personal Information</h4>

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>First Name:</strong> {{ $user->first_name }}
                                </div>
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>Username:</strong> {{ $user->username }}
                                </div>
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>Alternate Email:</strong> {{ $user->email_1 }}
                                </div>
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>Role Type:</strong>
                                    @if($user->role == 1)
                                        Vendor
                                    @elseif($user->role == 2)
                                        Corporate User
                                    @else
                                        Unknown
                                    @endif
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>Last Name:</strong> {{ $user->last_name }}
                                </div>
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>Email:</strong> {{ $user->email }}
                                </div>
                                <div class="mb-3" style="font-size: 1.1rem;">
                                    <strong>Contact Number:</strong> {{ $user->contact_number }}
                                </div>

                                <!-- Conditionally Display Company Name and Address if Role == 1 -->
                                @if($user->role == 1)
                                    <div class="mb-3" style="font-size: 1.1rem;">
                                        <strong>Company Name:</strong> {{ $user->company_name }}
                                    </div>
                                    <div class="mb-3" style="font-size: 1.1rem;">
                                        <strong>Address:</strong> {{ $user->address }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Content -->

</main>
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
