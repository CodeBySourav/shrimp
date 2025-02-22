@extends('layouts.dashboard_navbar')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>My Postings</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Postings Table ======= -->
    <section id="dashboard-content" class="dashboard-content" >
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-12" style="font-size: 15px;" > 
                    <table id="example" class="display nowrap" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity Range</th>
                                <th>Price</th>
                                <th>Validity</th>
                                <th>Certified</th>
                                <th>Description</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $submission)
                            <tr>
                                <td>{{ $submission->name }}</td>
                                <td>{{ $submission->quantity_range }}</td>
                                <td style="font-weight: bold; ">
                                    ${{ number_format($submission->price, 2) }}
                                </td>
                                <td>{{ $submission->validity }}</td>
                                <td>{{ $submission->certified }}</td>
                                <td>{{ $submission->description }}</td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Load jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

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
        },
        "columnDefs": [
            { "orderable": false, "targets": [5] } // Disable sorting for the "Description" column (6th column, index 5)
        ],
        order: [] // Disable default sorting on any column
    });
    $('.edit-status').click(function() {
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
    $(document).ready(function() {
        $('.edit-status').click(function() {
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

</style>

@endsection
