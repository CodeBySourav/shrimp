@extends('layouts.dashboard_navbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
    max-height: 377px;
    /* Adjust height as needed */
    overflow-y: auto;
    /* Enable vertical scrolling for overflow */
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    /* Adjust font size for readability */
    line-height: 1.5;
    /* Ensure good line height for text */
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

.product-content .row {
    margin-top: 10px;
}

.product-content p {
    margin-bottom: 5px;
}

.star-rating-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px 0;
}

.stars {
    display: flex;
    font-size: 30px;
    cursor: pointer;
    color: #ccc;
    /* Default gray color */
}

.star {
    transition: color 0.3s ease;
}

.star:hover,
.star.selected {
    color: #ff9f00;
    /* Flipkart-style orange */
}

.rating-message {
    font-size: 16px;
    font-weight: bold;
    color: #ff9f00;
    margin-top: 10px;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("selected-rating");
    const ratingText = document.getElementById("rating-text");

    const messages = {
        1: "1 star",
        2: "2 star",
        3: "3 star",
        4: "4 star",
        5: "5 star"
    };

    stars.forEach(star => {
        star.addEventListener("click", function() {
            let rating = this.getAttribute("data-value");
            ratingInput.value = rating;

            // Remove previous selection
            stars.forEach(s => s.classList.remove("selected"));

            // Highlight selected and previous stars
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add("selected");
            }

            // Update message text
            ratingText.textContent = messages[rating];
        });

        // Optional: Add hover effect
        star.addEventListener("mouseover", function() {
            let hoverValue = this.getAttribute("data-value");

            stars.forEach(s => s.classList.remove("selected"));
            for (let i = 0; i < hoverValue; i++) {
                stars[i].classList.add("selected");
            }
        });

        star.addEventListener("mouseout", function() {
            let currentRating = ratingInput.value;
            stars.forEach(s => s.classList.remove("selected"));
            for (let i = 0; i < currentRating; i++) {
                stars[i].classList.add("selected");
            }
        });
    });
});
</script>

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

                <div class="col-lg-6 product-content">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p class="product-description">
                        {{ $product->description }}
                    </p>
                    <div class="row">
                        <!-- First Row -->
                        <div class="col-6">
                            <p><strong>Size Range:</strong> {{ $product->size_range }}</p>
                            <p><strong>Freezing Method:</strong> {{ $product->freezing_method }}</p>
                        </div>
                        <div class="col-6">
                            <p><strong>Brand:</strong> Buyer Choice</p>
                            <p><strong>Section:</strong> {{ $product->section }}</p>
                        </div>
                    </div>
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
            </div>
        </div>
        </div>
        <!-- ======= Vendor Form Section ======= -->
        <section id="service-details" class="service-details vendor-form-container">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="section-header">
                    <h3 class="vendor-form-title">Vendor Form</h3>
                </div>
                <form action="{{ route('vendor_form.save') }}" method="post">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-lg-6 sidebar aos-init aos-animate" data-aos="fade">
                            <div class="text-center">
                                <label class="vendor-form-label">Count</label>

                                @if($product->name === 'Peeled and un-deveined (PUD) Tail OFF' || $product->name === 'Peeled and un-deveined (PUD) Tail ON')
                                <div class="quantity-checkbox-container">
                                    <div class="checkbox-column">
                                        @foreach(['80 - 100', '91 - 110', '150 - 200', '200 - 300'] as $index => $range)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="quantities[]" value="{{ $range }}"
                                                class="custom-control-input quantity-checkbox"
                                                id="quantity-{{ $index }}">
                                            <label class="custom-control-label"
                                                for="quantity-{{ $index }}">{{ $range }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                <div class="quantity-checkbox-container">
                                    <div class="checkbox-column">
                                        @foreach(['8 - 12', '13 - 15', '16 - 20', '21 - 25', '26 - 30'] as $index =>
                                        $range)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="quantities[]" value="{{ $range }}"
                                                class="custom-control-input quantity-checkbox"
                                                id="quantity-{{ $index }}">
                                            <label class="custom-control-label"
                                                for="quantity-{{ $index }}">{{ $range }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="checkbox-column">
                                        @foreach(['31 - 40', '41 - 50', '61 - 70', '71 - 90', '91 - 110'] as $index =>
                                        $range)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="quantities[]" value="{{ $range }}"
                                                class="custom-control-input quantity-checkbox"
                                                id="quantity-{{ $index + 5 }}">
                                            <label class="custom-control-label"
                                                for="quantity-{{ $index + 5 }}">{{ $range }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif


                                <div class="star-rating-container">
                                <div class="certification-container">
                                    <h4 id="certification-text">BAP Certified</h4>
                                    <input type="hidden" name="certified" id="certified-value" value="BAP Certified">

                                </div>

                                    <div class="stars">
                                        <i class="fa fa-star star" data-value="1"></i>
                                        <i class="fa fa-star star" data-value="2"></i>
                                        <i class="fa fa-star star" data-value="3"></i>
                                        <i class="fa fa-star star" data-value="4"></i>
                                        <span class="separator"></span> <!-- Spacer between stars and reset icon -->
                                        <i class="fa fa-ban star reset-rating" data-value="0" title="No Rating"></i>
                                        <!-- Reset Star -->
                                    </div>
                                    <input type="hidden" name="rating" id="selected-rating" value="0">
                                    <p id="rating-text" class="rating-message"></p>
                                </div>

                                <style>
                                .stars {
                                    display: flex;
                                    align-items: center;
                                }

                                .star {
                                    font-size: 24px;
                                    cursor: pointer;
                                    color: gray;
                                    margin-right: 5px;
                                }

                                .star.selected {
                                    color: gold;
                                }

                                .reset-rating {
                                    color: red;
                                    font-size: 24px;
                                    cursor: pointer;
                                }

                                .separator {
                                    display: inline-block;
                                    width: 15px;
                                    /* Adjust space between stars and reset icon */
                                }
                                </style>

                                <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const stars = document.querySelectorAll(".star");
                                    const ratingInput = document.getElementById("selected-rating");
                                    const ratingText = document.getElementById("rating-text");

                                    stars.forEach(star => {
                                        star.addEventListener("click", function() {
                                            let ratingValue = this.getAttribute("data-value");

                                            if (ratingValue === "0") {
                                                stars.forEach(s => s.classList.remove(
                                                    "selected"));
                                                ratingText.innerText = "No Rating Selected";
                                                ratingInput.value = "0";
                                            } else {
                                                stars.forEach(s => s.classList.remove(
                                                    "selected"));
                                                for (let i = 0; i < ratingValue; i++) {
                                                    stars[i].classList.add("selected");
                                                }
                                                ratingText.innerText =
                                                    `You rated: ${ratingValue} stars`;
                                                ratingInput.value = ratingValue;
                                            }
                                        });
                                    });
                                });
                                </script>


                                <div class="col-md-11 form-group mt-4">
                                    <label class="vendor-form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="6"
                                        placeholder="Mention Terms / Delivery Port Details" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 sidebar aos-init aos-animate" data-aos="fade">
                            <div id="dynamic-fields"></div>
                            <div class="col-md-11 text-center submitbtn mt-4">
                                <button type="submit" class='col-md-12'>Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section><!-- End Vendor Form Section -->
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityCheckboxes = document.querySelectorAll('.quantity-checkbox');
    const dynamicFieldsContainer = document.getElementById('dynamic-fields');
    const certificationText = document.getElementById('certification-text');
    const certifiedInput = document.getElementById('certified-value'); // Hidden Input for DB

    quantityCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            toggleFields(checkbox);
        });
    });

    function toggleFields(checkbox) {
        const quantityValue = checkbox.value;
        const fieldId = `fields-for-${quantityValue.replace(/\s+/g, '-')}`;

        if (checkbox.checked) {
            const fieldset = document.createElement('div');
            fieldset.id = fieldId;
            fieldset.classList.add('quantity-fieldset');
            fieldset.innerHTML = `
                <h4>Count: ${quantityValue}</h4>
                <div class="form-group" style="display: flex; gap: 10px;">
                    <div style="flex: 0.5;">
                        <label for="currency-${fieldId}">Currency type</label> 
                        <select name="currency[${quantityValue}]" id="currency-${fieldId}" class="form-control currency-selector" style="max-width: 120px;">
                            <option value="$USD">&#36; USD</option>
                            <option value="$CAD">&#36; CAD</option>
                        </select> 
                    </div>
                    <div style="flex: 1;">
                        <label for="price-${fieldId}">Best Price for ${quantityValue}</label>
                        <input type="number" name="prices[${quantityValue}]" id="price-${fieldId}" class="form-control" placeholder="Enter price" step="0.01" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="validity-${fieldId}">Validity for ${quantityValue}</label>
                        <select name="validities[${quantityValue}]" id="validity-${fieldId}" class="form-control">
                            <option value="1 Week">1 Week</option>
                            <option value="2 Weeks">2 Weeks</option>
                            <option value="3 Weeks">3 Weeks</option>
                            <option value="1 Month">1 Month</option>
                            <option value="3 Months">3 Month</option>
                            <option value="6 Months">6 Month</option>
                            <option value="1 Year">1 Year</option>
                        </select>
                    </div>
                    <div style="flex: 1;">
                        <label for="treatment-${fieldId}">Treatment for ${quantityValue}</label>
                        <select name="treatment[${quantityValue}]" id="treatment-${fieldId}" class="form-control">
                            <option value="STPP/ NW-NC">STPP/ NW-NC</option>
                            <option value="Phosphate Free">Phosphate Free</option>
                            <option value="Chem Free">Chem Free</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="product_id" value="${@json($product->id)}">
            `;
            dynamicFieldsContainer.appendChild(fieldset);

            // Add event listener to newly created select field
            const currencySelector = fieldset.querySelector('.currency-selector');
            currencySelector.addEventListener('change', function() {
                updateCertificationDisplay(currencySelector.value);
            });
        } else {
            const fieldset = document.getElementById(fieldId);
            if (fieldset) {
                dynamicFieldsContainer.removeChild(fieldset);
            }
        }
    }

    function updateCertificationDisplay(currency) {
        if (currency === "$USD") {
            certificationText.innerText = "BAP Certified";
            certifiedInput.value = "BAP Certified"; // Store value in hidden input
        } else if (currency === "$CAD") {
            certificationText.innerText = "ASC Certified";
            certifiedInput.value = "ASC Certified"; // Store value in hidden input
        }
    }
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