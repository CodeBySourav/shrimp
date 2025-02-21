@extends('layouts.navbar')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Corporate User Registration</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <h5>Corporate User Registration Form</h3>
                    <form action="{{ route('corporate_users.register.submit') }}" method="POST">
                        @csrf
                        <!-- CSRF Token for security -->
                        <div class="container-fluid">
 

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-4 form-label" for="inputFirstName">First Name</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="glyphicon glyphicon-pencil"></i></span>
                                            <input required class="form-control text-box single-line" id="FName"
                                                name="FName" type="text" value="">
                                        </div>
                                        @error('FName')
                                        <span class="field-validation-valid text-danger" data-valmsg-for="FName"
                                            data-valmsg-replace="true">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="col-sm-4 form-label" for="inputLastName">Last Name</label>

                                    <div class="col-sm-8">
                                        <input required class="form-control text-box single-line" id="LName"
                                            name="LName" type="text" value="">


                                    </div>
                                    @error('LName')
                                    <span class="field-validation-valid text-danger" data-valmsg-for="LName"
                                        data-valmsg-replace="true">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-4 form-label" for="inputFirstName">Username</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                            <input required class="form-control text-box single-line" data-val="true"
                                                data-val-required="The Username field is required." id="Username"
                                                name="Username" type="text" value="">
                                        </div>
                                        @error('Username')
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Username"
                                            data-valmsg-replace="true">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-4 form-label" for="inputLastName">Email</label>

                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="glyphicon glyphicon-envelope"></i></span>
                                            <input required class="form-control text-box single-line" data-val="true"
                                                data-val-required="The Email field is required." id="Email" name="Email"
                                                type="email" value="">

                                        </div>
                                        @error('Email')
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Email"
                                            data-valmsg-replace="true">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-4 form-label" for="inputFirstName">Password</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="glyphicon glyphicon-asterisk"></i></span>
                                            <input required class="form-control text-box single-line password"
                                                data-val="true" data-val-required="The password field is required."
                                                id="password" name="password" type="password" value="">


                                        </div>
                                        @error('password')
                                        <span class="field-validation-valid text-danger" data-valmsg-for="password"
                                            data-valmsg-replace="true">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-4 form-label" for="inputLastName">Confirm Password</label>

                                    <div class="col-sm-8">
                                        <input required class="form-control text-box single-line password"
                                            data-val="true" data-val-required="The ConfirmPassword field is required."
                                            id="ConfirmPassword" name="password_confirmation" type="password" value="">


                                    </div>
                                    @error('ConfirmPassword')
                                    <span class="field-validation-valid text-danger" data-valmsg-for="ConfirmPassword"
                                        data-valmsg-replace="true">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-4 form-label" for="inputFirstName">Contact Number</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="glyphicon glyphicon-earphone"></i></span>
                                            <input required class="form-control text-box single-line" data-val="true"
                                                data-val-required="The ContactNumber field is required."
                                                id="ContactNumber" name="ContactNumber" type="tel" value="">
                                        </div>
                                        @error('ContactNumber')
                                        <span class="field-validation-valid text-danger"
                                            data-valmsg-for="ConfirmPassword"
                                            data-valmsg-replace="true">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 submitbtn" style="float:right;">
                                <button type="submit" class="btn btn-info">
                                    <i class="icon-user icon-white glyphicon glyphicon-floppy-open"></i> Create
                                </button>
                                <input required type="reset" class="btn btn-light" value="Clear" onclick="ClearPage();"
                                    class="btn btn-default">

                            </div>
                    </form>
            </div>

        </div>
    </section>

</main><!-- End #main -->

@endsection