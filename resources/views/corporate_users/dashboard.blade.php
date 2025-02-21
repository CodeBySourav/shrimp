@extends('layouts.dashboard_navbar')
@section('content')
<style>
    /* Container to center-align the charts with 40% space on each side and 20% in the middle */
    .chart-container {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
        padding: 0 10%;
    }

    /* Chart card styles */
    .chart-card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 40%;
        text-align: center;
    }

    /* Style for each chart */
    #myPieChart, #container {
        max-width: 100%;
        max-height: 300px;
        margin: 0 auto;
    }

    /* Dropdown styles */
    .dropdown-label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 5px;
        padding: 8px 12px;
    }

    .breadcrumbs {
        background-color: #f5f5f5;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<main id="main">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Corporate User Dashboard</h2>
        </div>
    </div>

    <!-- Dashboard Content -->
    <section id="dashboard-content" class="dashboard-content">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <h3>Welcome to the Corporate User Dashboard</h3>
                <p>Manage your company's profile, monitor accounts, and access resources tailored for corporate users.</p>

                <!-- Dropdown Row -->
                <div class="row align-items-center mt-4">
                    <div class="col-md-4">
                        <label class="dropdown-label" for="user-dropdown">Select a User:</label>
                        <select id="user-dropdown" name="user" class="form-control">
                            <option value="">-- Select User --</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="dropdown-label" for="product-dropdown">Product Names:</label>
                        <select id="product-dropdown" name="product" class="form-control">
                            <option value="">-- Select Product --</option>
                            <!-- Product names will be injected by AJAX -->
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="dropdown-label" for="quantity-range-dropdown">Quantity Ranges:</label>
                        <select id="quantity-range-dropdown" class="form-control">
                            <option value="">-- Select Quantity Range --</option>
                            <!-- Quantity ranges will be injected by AJAX -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Charts Section -->
    <div class="chart-container">
        <!-- Pie Chart Card -->
        <div class="chart-card">
            <h5>Product</h5>
            <canvas id="myPieChart"></canvas>
        </div>

        <!-- Bar Chart Card -->
        <div class="chart-card">
            <h5>Product Quantity Ranges</h5>
            <div id="container"></div>
        </div>
    </div>
</main>

<!-- AJAX Script for Dropdowns -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#user-dropdown').on('change', function() {
        console.log('calling for get product name')
        var userId = $(this).val();
        if (userId) {
            $.ajax({
                url: '{{ route("get.user.details") }}',
                type: 'POST',
                data: {
                    id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#product-dropdown').empty().append('<option value="">-- Select Product --</option>');
                    
                    // Prepare data for pie chart
                    let labels = [];
                    let data = [];
                    
                    $.each(response.products, function(index, product) {
                        $('#product-dropdown').append('<option value="' + product.id + '">' + product.name + '</option>');
                        labels.push(product.name);
                        data.push(1); // Placeholder count
                    });

                    // Update the Pie Chart with new data
                    myPieChart.data.labels = labels;
                    myPieChart.data.datasets[0].data = data;
                    myPieChart.update();
                },
                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                }
            });
        } else {
            $('#product-dropdown').html('<option value="">-- Select Product --</option>');
            myPieChart.data.labels = [];
            myPieChart.data.datasets[0].data = [];
            myPieChart.update();
        }
    });

    $('#product-dropdown').on('change', function() {
        console.log("aara ahi product-dropdown main");
        var productId = $(this).val();
        console.log(productId);

        if (productId) {
            $.ajax({
                url: '{{ route("get.product.count") }}',
                type: 'POST',
                data: {
                    id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#quantity-range-dropdown').empty().append('<option value="">-- Select Quantity Range --</option>');
                    $.each(response.quantity_ranges, function(index, range) {
                        $('#quantity-range-dropdown').append('<option value="' + range + '">' + range + '</option>');
                    });

                    // Update the Bar Chart with quantity ranges
                    if (response.success) {
                        Highcharts.chart('container', {
                            chart: {
                                type: 'column',
                                options3d: { enabled: true, alpha: 15, beta: 15, depth: 50, viewDistance: 25 }
                            },
                            title: { text: 'Quantity Ranges for Selected Product' },
                            xAxis: { categories: response.quantity_ranges },
                            yAxis: { title: { text: 'Quantity' } },
                            series: [{ name: 'Quantity', data: response.quantity_ranges.map(() => 1) }] // Assuming equal quantity for simplicity
                        });
                    }
                },
                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                }
            });
        } else {
            $('#quantity-range-dropdown').html('<option value="">-- Select Quantity Range --</option>');
        }
    });
});
</script>

<!-- Pie Chart Script -->
<script>
const ctx = document.getElementById('myPieChart').getContext('2d');
const myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [],
        datasets: [{
            data: [],
            backgroundColor: ['#FFA726', '#FFEE58', '#7986CB', '#EF5350', '#AB47BC', '#8BC34A', '#FF5722', '#26A69A', '#FFCC80'],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'right' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw || 0;
                        return label + ': ' + value + ' items';
                    }
                }
            }
        }
    }
});
</script>
@endsection
