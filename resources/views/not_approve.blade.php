
@extends('layouts.dashboard_navbar')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Vendor Dashboard</h2>
        </div>
    </div><!-- End Breadcrumbs -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Approval</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container2 {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container2">
        <h1>Thank you for registering with our platform</h1>
        <p>We're excited to have you join our community!</p>
        <p>Your profile is currently pending approval from our administrative team. We review profiles diligently to ensure the safety and quality of our platform for all users.</p>
        <p>Please be patient as our team works through the approval process. We strive to complete this process as quickly as possible while maintaining our standards.</p>
        <p>Once your profile is approved, you'll receive a notification email, and you'll be able to access all features of our platform.</p>
        <p>Thank you for your understanding and cooperation.</p>
    </div>
</body>
</html>
@endsection