@extends('layouts.dashboard_navbar')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>All Enquiries</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Vendor Table ======= -->
    <section id="vendor-table" class="vendor-table">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-12">

                <table id="example" class="display nowrap" style="width:100%;font-size: 16px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($all_enquiries as $all_enquiriess)
        <tr>
            <td>{{ $all_enquiriess->name }}</td>
            <td>{{ $all_enquiriess->email }}</td>
            <td>{{ $all_enquiriess->subject }}</td>
            <td>{{ $all_enquiriess->message }}</td> 
            <td>
                <button onclick="deleteEnquiry({{ $all_enquiriess->id }})" class="edit-status inactive">Delete</button>
            </td>
 
        </tr>
        @endforeach
    </tbody>
</table>
                </div>
            </div>
        </div>



    </section>
     
</main>

<!-- Load jQuery and DataTables as before -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
function deleteEnquiry(id) {
    if (confirm("Are you sure you want to delete this enquiry?")) {
        $.ajax({
            url: "{{ url('/enquiries') }}/" + id,
            type: 'POST', // Use POST with _method for compatibility
            data: {
                _method: 'DELETE',
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                if (response.success) {
                    $('#enquiry-' + id).remove();
                    alert(response.message);
                    location.reload();
                } else {
                    alert(response.message || "Unable to delete enquiry.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error: ", error);
                console.error("Response: ", xhr.responseText);
                alert('Something went wrong. Please try again.');
            }
        });
    }
}

</script>
<style>
/* Add borders to the table */
#example {
    border-collapse: collapse;
    /* Ensures borders are joined cleanly */
    width: 100%;
    /* Makes the table take the full width */
}

/* Add borders to table cells */
#example th,
#example td {
    border: 1px solid #ddd;
    /* Light gray border for cells */
    padding: 8px;
    /* Padding inside cells */
}

/* Header styling */
#example th {
    background-color: #f2f2f2;
    /* Light background for headers */
    color: #333;
    /* Dark text for headers */
    text-align: center;
}

/* Center-align the status buttons in cells */
#example td {
    text-align: center;
}

/* Button styling for a consistent look */
.edit-status {
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    color: #fff;
    font-size: 12px;
    cursor: pointer;
}

.edit-status.active {
    background-color: #4CAF50;
    /* Green for active status */
}

.edit-status.inactive {
    background-color: #f44336;
    /* Red for blocked or not approved */
}
/* Centered modal title */
.modal-header {
    position: relative;
    display: flex;
    justify-content: center;
    border-bottom: 1px solid #dee2e6;
}

.modal-header .modal-title {
    font-weight: bold;
    font-size: 18px;
    color: #333;
}

.modal-header .close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    color: #333;
    opacity: 0.7;
    text-shadow: none;
}

.modal-header .close:hover {
    opacity: 1;
    color: #000;
}

/* Modal content styling */
.modal-content {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border: none;
}

/* Modal body */
.modal-body {
    padding: 20px;
}

.modal-body .form-group label {
    font-size: 16px;
    color: #555;
}

.modal-body select.form-control {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 8px;
}

/* Modal footer */
.modal-footer {
    border-top: 1px solid #dee2e6;
    display: flex;
    justify-content: flex-end;
    padding-top: 15px;
}

.modal-footer .btn {
    border-radius: 4px;
    font-size: 14px;
    padding: 8px 15px;
}

/* Styling for modal buttons */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

</style>

@endsection