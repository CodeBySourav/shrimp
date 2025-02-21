@extends('layouts.navbar')
@section('content')
<style>
/* Responsive slider container */
.swiper-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding-top: 20px;
    padding-bottom: 20px;
}

/* Slide styling */
.swiper-slide {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
}

.swiper-slide img {
    width: 100%;
    height: 200px;            /* Fixed height for uniformity */
    object-fit: cover;        /* Crops image to fit container without stretching */
    border-radius: 10px;      /* Keeps border radius for styling */
}

.product-title {
    font-weight: bold;
    margin-top: 10px;
    font-size: 1.2em;
}

.product-description {
    color: #666;
    font-size: 0.9em;
    margin-top: 5px;
}

/* Styling pagination dots */
.swiper-pagination-bullet {
    background-color: #ddd;
    opacity: 1;
}

.swiper-pagination-bullet-active {
    background-color: #FFA500;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .product-title {
        font-size: 1em;
    }

    .product-description {
        font-size: 0.8em;
    }

    .swiper-slide {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .product-title {
        font-size: 0.9em;
    }

    .product-description {
        font-size: 0.75em;
    }

    .swiper-slide {
        padding: 10px;
    }
}
</style>

<main id="main">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Product Categories</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- Dashboard Content -->
    <section id="dashboard-content" class="dashboard-content">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <!-- Raw White Shrimp Slider -->
            <div class="section-header">
                <h2>Raw White Shrimp</h2>
            </div>
            <div class="row">
                <div class="swiper-container raw-shrimp-slider">
                    <div class="swiper-wrapper">
                        @foreach ($shrimpProducts as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('guest_product.show', ['id' => $product->id]) }}"
                                style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('/' . $product->image_path) }}" alt="{{ $product->name }}">
                                <div class="product-title">{{ $product->name }}</div>
                                <div class="product-description">Size Range: {{ $product->size_range }}</div>
                                <div class="product-description">Freezing: {{ $product->freezing_method }}</div>
                                <div class="product-description">Brand : Buyer Choice</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination for Raw White Shrimp -->
                    <div class="swiper-pagination raw-pagination"></div>
                </div>
            </div>

            <!-- Cooked White Shrimp Slider -->
            <div class="section-header" style="margin-top: 40px;">
                <h2>Cooked White Shrimp</h2>
            </div>
            <div class="row">
                <div class="swiper-container cooked-shrimp-slider">
                    <div class="swiper-wrapper">
                        @foreach ($cookedshrimp as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('guest_product.show', ['id' => $product->id]) }}"
                                style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('/' . $product->image_path) }}" alt="{{ $product->name }}">
                                <div class="product-title">{{ $product->name }}</div>
                                <div class="product-description">Size Range: {{ $product->size_range }}</div>
                                <div class="product-description">Freezing: {{ $product->freezing_method }}</div>
                                <div class="product-description">Brand : Buyer Choice</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination for Cooked White Shrimp -->
                    <div class="swiper-pagination cooked-pagination"></div>
                </div>
            </div>

            <!-- Black Tiger Shrimp Slider -->
            <div class="section-header" style="margin-top: 40px;">
                <h2>Black Tiger Shrimp</h2>
            </div>
            <div class="row">
                <div class="swiper-container black-tiger-shrimp-slider">
                    <div class="swiper-wrapper">
                        @foreach ($blackTigerShrimp as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('guest_product.show', ['id' => $product->id]) }}"
                                style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('/' . $product->image_path) }}" alt="{{ $product->name }}">
                                <div class="product-title">{{ $product->name }}</div>
                                <div class="product-description">Size Range: {{ $product->size_range }}</div>
                                <div class="product-description">Freezing: {{ $product->freezing_method }}</div>
                                <div class="product-description">Brand : Buyer Choice</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination for Black Tiger Shrimp -->
                    <div class="swiper-pagination black-tiger-pagination"></div>
                </div>
            </div>

            <!-- Swiper JS -->
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

            <!-- Initialize Swiper -->
            <script>
            var rawShrimpSwiper = new Swiper('.raw-shrimp-slider', {
                loop: true,
                pagination: {
                    el: '.raw-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 3,
                spaceBetween: 20,
                centeredSlides: true,
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                }
            });

            var cookedShrimpSwiper = new Swiper('.cooked-shrimp-slider', {
                loop: true,
                pagination: {
                    el: '.cooked-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 3,
                spaceBetween: 20,
                centeredSlides: true,
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                }
            });

            var blackTigerShrimpSwiper = new Swiper('.black-tiger-shrimp-slider', {
                loop: true,
                pagination: {
                    el: '.black-tiger-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 3,
                spaceBetween: 20,
                centeredSlides: true,
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                }
            });
            </script>

        </div>
    </section>
</main>
@endsection
