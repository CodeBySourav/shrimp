@extends(auth()->check() ? 'layouts.dashboard_navbar' : 'layouts.navbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- Load jQuery and DataTables scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<style>
/* Container styling */
.product-detail-container {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
}

/* Image styling */
.product-image {
    flex: 1;
    max-width: 600px;
    margin-right: 40px;
}

.product-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Content styling */
.product-content {
    flex: 1;
}

.product-title {
    font-size: 2em;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.product-description {
    font-size: 1.1em;
    color: #666;
    line-height: 1.6;
}

/* Form styling */
.vendor-form-container {
    margin-top: 30px;
}

.vendor-form-title {
    font-size: 1.8em;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

.vendor-form-label {
    font-size: 2.2em;
    font-weight: 600;
    color: #333;
    margin-top: 10px;
}

.form-group input,
.form-group select,
.form-group textarea {
    font-size: 1.1em;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    width: 100%;
    margin-top: 5px;
}

.form-group h4 {
    font-size: 1.3em;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.custom-control-label {
    font-size: 1.1em;
    color: #333;
    font-weight: 500;
}

/* Submit button styling */
.submitbtn button {
    font-size: 1.2em;
    font-weight: 600;
    padding: 12px;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

.submitbtn button:hover {
    background-color: #0056b3;
}

/* Adjustments for dynamic fields */
.dynamic-fields {
    margin-top: 15px;
    padding-left: 20px;
    border-left: 3px solid #007bff;
}

.quantity-checkbox-container {
    display: flex;
    gap: 20px;
}

.checkbox-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 15px;
}

.dynamic-fields {
    margin-top: 15px;
    padding-left: 20px;
    border-left: 3px solid #007bff;
}
.quantity-checkbox-container {
    display: flex;
    gap: 20px;
}
.checkbox-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 15px;
}
.product-attributes {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 20px;
    color: #333;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    flex: 1;
    max-height: 370px; /* Adjust height as needed */
    overflow-y: auto; /* Enable vertical scrolling for overflow */
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-size: 16px; /* Adjust font size for readability */
    line-height: 1.5; /* Ensure good line height for text */
}
.product-attributes h4 {
    font-size: 24px;
    color: #0056b3;
    margin-bottom: 20px;
    border-bottom: 2px solid #0056b3;
    padding-bottom: 5px;
}
.attribute-section {
    margin-bottom: 15px;
}
.attribute-section h5 {
    font-size: 18px;
    color: #222;
    margin-bottom: 8px;
}
.attribute-section p {
    font-size: 14px;
    color: #555;
    margin: 0;
    padding: 0;
    text-align: justify;
}
.attribute-section:last-child {
    margin-bottom: 0;
}
.attribute-section p:last-child {
    margin-bottom: 0;
}
.product-info-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Adjust gap between the columns */
    margin-top: 10px;
}

.product-info-col {
    flex: 1;
    min-width: 200px; /* Ensures the column has a minimum width */
    font-size: 1.1em;
    color: #333;
    line-height: 1.6;
}
.table_padding {
    padding: 0px 100px 5px 100px;
}
</style>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Product Categories</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <section id="service-details" class="service-details">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <div class="col-lg-6 product-image">
                    <img src="{{ asset('/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="img-fluid services-img">
                </div>

                <div class="product-content">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">
                    {{ $product->description }}
                </p>
                <!-- Two-row layout -->
                <div class="product-info-row">
                    <div class="product-info-col">
                        <p><strong>Size Range:</strong> {{ $product->size_range }}</p>
                        <p><strong>Freezing Method:</strong> {{ $product->freezing_method }}</p>
                    </div>
                    <div class="product-info-col">
                        <p><strong>Brand:</strong> Buyer Choice</p>
                        <p><strong>Section:</strong> {{ $product->section }}</p>
                    </div>
                </div>
                <!-- Product Attributes -->
                <div class="product-attributes">
                    <h4>Product Details</h4>
                    <div class="attribute-section">
                        <h5>Compliance Statement</h5>
                        <p>
                        {{ $product->compliance_statement }}
                        </p>
                    </div>
                    <div class="attribute-section">
                        <h5>Raw Materials</h5>
                        <p>
                        {{ $product->raw_materials }}
                        </p>
                    </div>
                    <div class="attribute-section">
                        <h5>Processing</h5>
                        <p>
                        {{ $product->processing }}
                        </p>
                    </div>
                    <div class="attribute-section">
                        <h5>Freezing</h5>
                        <p>
                        {{ $product->freezing }}
                        </p>
                    </div>
                    <div class="attribute-section">
                        <h5>Glazing</h5>
                        <p>
                        {{ $product->glazing }}
                        </p>
                    </div>
                </div>
                </div>

                    @auth
                    <section id="product-pricing" class="product-pricing">
                        <div class="container" data-aos="fade-up" data-aos-delay="200">
                            <div class="row">
                                <div class="col-lg-12 table_padding">
                                    <table id="example" class="display nowrap" style="width:100%; ">
                                        <thead>
                                            <tr>
                                                <th>Counts</th>
                                                <th>Price</th>
                                                <th>Validity</th>
                                                <th>Treatment</th>
                                                <th>Certified</th> 
                                                <th>rating</th> 
                                                <th>Description</th>
                                                <th>Comapny  Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product_pricing as $pricing)
                                            <tr>
                                                <td>{{ $pricing->quantity_range }}</td>
                                                <td>{{ $pricing->price }} {{ $pricing->currency }}</td>
                                                <td>{{ $pricing->validity }}</td>
                                                <td>{{ $pricing->treatment ?? 'N/A' }}</td>
                                                <td>{{ $pricing->certified ?? 'N/A' }}</td>
                                                <td>{{ $pricing->rating ?? 'N/A' }} Star</td>
                                                <td>{{ $pricing->description }}</td>
                                                <td>{{ $pricing->company_name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endauth
                </div>



            </div>
        
    </section>
</main>


<script>
jQuery(document).ready(function($) {
    $('#example').DataTable({
        responsive: true, // Enable responsive design
        paging: true,     // Enable pagination
        searching: true,  // Enable search
        order: [],        // Disable default DataTables ordering
        pageLength: 10,   // Number of rows per page
        lengthMenu: [5, 10, 20, 50], // Dropdown for page length
        language: {
            search: "Search:",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});

</script>
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