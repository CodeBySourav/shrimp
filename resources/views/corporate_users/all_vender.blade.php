@extends('layouts.dashboard_navbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Vendor List</h2>
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
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Company Name</th> 
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                            <tr>
                                <td>{{ $vendor->id }}</td>
                                <td>{{ $vendor->username }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->contact_number }}</td>
                                <td>{{ $vendor->address }}</td>
                                <td>{{ $vendor->company_name }}</td> 
                                <td>
                                    @if ($vendor->status == "active")
                                    <button class="edit-status active" data-id="{{ $vendor->id }}"
                                        data-status="active">Approved</button>
                                    @elseif ($vendor->status == "inactive")
                                    <button class="edit-status inactive" data-id="{{ $vendor->id }}"
                                        data-status="inactive">Not Approved</button>
                                    @elseif ($vendor->status == "reject")
                                    <button class="edit-status Reject" data-id="{{ $vendor->id }}"
                                        data-status="reject">Reject</button>
                                    @endif
                                </td>
                                <td><button class="delete-vendor btn btn-danger" data-id="{{ $vendor->id }}">Delete</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </section>
    <div class="modal" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="contact" action="{{ route('change_status') }}" method="POST">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h5 class="modal-title">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <div class="modal-body"> -->
                    <input type="hidden" id="postIdInput" name="id">
                    <input type="hidden" id="newStatusInput" name="status">
                    <select id="editStatusInput" class="form-control" name="status">
                        <option value="active">Approved</option>
                        <option value="inactive">Not Approved</option>
                        <option value="reject">Reject</option>
                    </select>
                    <!-- </div> -->
                    <!-- <div class="modal-footer"> -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Load jQuery and DataTables as before -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).on('click', '.delete-vendor', function() {
    var vendorId = $(this).data('id');

    // SweetAlert v1 syntax
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this vendor!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function() {
        // Execute AJAX request on confirmation
        $.ajax({
            url: '{{ route("delete.vendor") }}',
            type: 'POST',
            data: {
                id: vendorId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    swal({
                        title: "Deleted!",
                        text: "Vendor deleted successfully.",
                        type: "success",
                        closeOnConfirm: true
                    },
                    function() {
                        // Reload the page after SweetAlert is closed
                        location.reload();
                    });
                } else {
                    swal("Error!", "Error deleting vendor.", "error");
                }
            },
            error: function(xhr) {
                console.error('Error deleting vendor:', xhr.responseText);
                swal("Error!", "An error occurred while deleting vendor.", "error");
            }
        });
    });
});


</script>
<script>
jQuery(document).ready(function($) {
    $('#example').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        pageLength: 10,
        lengthMenu: [5, 10, 20, 50],
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
        $(document).on('click', '.edit-status', function() {
            var postId = $(this).data('id');
            console.log("id data");
            console.log(postId);
            var newStatus = $(this).data('status');
            console.log("newStatus");
            console.log(newStatus);

            // Set the values in the hidden fields within the form
            $('#postIdInput').val(postId);
            $('#newStatusInput').val(newStatus);

            // Set the select value in the modal
            $('#editStatusInput').val(newStatus);

            // Show the modal
            $('#editModal').show();
        });

        $('#saveEdit').click(function() {
            var postId = $('#postIdInput').val();
            var newStatus = $('#newStatusInput').val();

            // AJAX request here to update the status in the controller
            $.ajax({
                url: '{{ route('change_status') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: postId,
                    status: newStatus
                },
                success: function(response) {
                    // Handle success response, if needed
                    // For example, you can update the UI to reflect the new status
                    $('#editModal').modal('hide');
                },
                error: function(error) {
                    console.error('Error updating status:', error);
                }
            });
        });
     
    $(document).on('click', '.edit-status', function() {
        console.log("edit-status work");

        var buttonText = $(this).text();
        $("#selectedStatus").val(buttonText);

        // Show the modal
        $('#editModal').show();
    });
    var postId = $('#postId').val();
    var currentStatus = $(this).data('status');

    // Set the value of the input field
    $('#postIdInput').val(postId);
    $('#editStatusInput').val(currentStatus);
    $('.close').click(function() {
        // Close the modal using JavaScript
        $('#editModal').hide();
    });
    $('.close').click(function() {
        // Close the modal using JavaScript
        $('#editModal').hide();
    });
    
});
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