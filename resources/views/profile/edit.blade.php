@extends('layouts.dashboard_navbar')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Edit Profile</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Profile Content ======= -->
    <section id="profile-content" class="profile-content">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3 class="text-center mb-4"> Edit Your Profile</h3> 

                    <!-- Profile Details Card -->
                    <div class="card shadow-lg p-4">
                        <h4 class="mb-4" style="font-size: 1.5rem; font-weight: bold;">Personal Information</h4>

                        <!-- Profile Update Form -->
                        <form method="POST" action="{{ route('profile.edit') }}">
                            @csrf 

                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input id="first_name" type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input id="last_name" type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                        <input id="username" type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="email_1" class="block text-sm font-medium text-gray-700">Alternate Email</label>
                                        <input id="email_1" type="email" name="email_1" class="form-control" value="{{ old('email_1', $user->email_1) }}">
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <!-- Conditionally hide these fields based on the user's role -->
                                    @if(auth()->user()->role != 2)
                                        <div class="mb-4">
                                            <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                            <input id="company_name" type="text" name="company_name" class="form-control" value="{{ old('company_name', $user->company_name) }}">
                                        </div>

                                        <div class="mb-4">
                                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                            <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $user->address) }}</textarea>
                                        </div>
                                    @endif

                                    <div class="mb-4">
                                        <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                        <input id="contact_number" type="text" name="contact_number" class="form-control" value="{{ old('contact_number', $user->contact_number) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Content -->

</main>
@endsection
