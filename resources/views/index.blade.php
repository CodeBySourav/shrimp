@extends('layouts.navbar')
@section('content')
<style>
    .img-border {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 10px; /* Optional: rounded corners */
}

/* General styling */
.swiper-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px 0;
}

.swiper-slide {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
}

.swiper-slide img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
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

/* Pagination bullets */
.swiper-pagination-bullet {
    background-color: #ddd;
    opacity: 1;
}

.swiper-pagination-bullet-active {
    background-color: #FFA500;
}

/* Responsive adjustments */
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

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Welcome to <span>SHRIMP</span></h2>
                    <p>The origins of the word "shrimp" come from the 14th-century Middle English word "shrimpe", meaning "tiny". Tiny they might be, but they are loaded with nutritional value. Shrimp is rich in omega-3 fatty acids, vitamins, and minerals, making it a nutritious alternative to meat proteins.</p>
                    <a href="#get-started" class="btn-get-started">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        @for ($i = 1; $i <= 5; $i++)
            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}" style="background-image: url('assets/img/hero-carousel/hero-carousel-{{ $i }}.jpg')"></div>
        @endfor
        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</section>

<!-- ======= Features Section ======= -->
<section id="features" class="features section-bg">
        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row  g-2 d-flex">

                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                        <h4>Our Story</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                        <h4> Our Logistics System</h4>
                    </a><!-- End tab nav item -->

                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                        <h4> Meeting Demands</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                        <h4>Our Commitment</h4>
                    </a>
                </li><!-- End tab nav item -->

            </ul>

            <div class="tab-content">

                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <div style="font-size:15px;" class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                            data-aos="fade-up" data-aos-delay="100">
                            <h3>Our Mission as a Importer</h3>
                            <p class="fst-italic">
                            <p> This shrimp species is renowned for its excellent taste, adaptability, and contribution
                                to global seafood production. We as a Importer want to be bridge between Suppliers and
                                Buyers. As Limson We have a strong network of logistical operations around the world
                                from shipping ports to receiving docks. No matter where the product is sourced, we have
                                the experience and supply chain partners to ensure your products are shipped and
                                delivered as efficiently as possible.</p>
                            <ul>

                                <li><i class="bi bi-check2-all"></i> To provide the highest quality shrimp and
                                    exceptional service to our customers.</li>
                                <li><i class="bi bi-check2-all"></i> Lower our costs by utilizing the best technology
                                    and implementing the best techniques, not by cutting corners.</li>
                                <li><i class="bi bi-check2-all"></i> Think sustenance in every step.</li>
                                <p class="fst-italic">
                                <p>
                                <ul>We believe in a value system which is based on honesty, integrity and transparency
                                    which we religiously practice in our dealings with all stakeholders. We focus on
                                    satisfying our customers and never compromise on the quality of the products. We
                                    endeavour to make a difference by creating value in whatever we do. We love
                                    challenges and push our limits in striving for perfection.
                                </ul>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="assets/img/features-1.jpg" alt="" class="img-fluid img-border">
                        </div>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        <div style="font-size:15px;" class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>We are expertise</h3>
                            <p class="fst-italic">
                                We focus exclusively on the procurement/logistics/quality assurance function, allowing
                                us to achieve the lowest operating cost in the business. Our logistics system starts
                                with QA inspection at the supplier’s dock, providing over-the-water tracking,
                                integrating intermodal shipping through our North American warehousing network and ends
                                at your door with a minimum number of stops. Not only do we streamline the importing
                                process, we provide direct access to overseas vendors while giving our customers a
                                “firewall” from any unexpected issues like allegations of labor abuse or food safety
                                concerns..
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> All products are rigorously tested on antibiotics,
                                    moisture, microbiology, salt, etc. These products are fully accredited by the
                                    world’s leading aquaculture and food safety councils such as ASC, BAP, BRC, IFS,
                                    HACCP and HALAL. .</li>
                                <li><i class="bi bi-check2-all"></i> Our experience in procurement, quality control,
                                    logistics, warehousing, sales and marketing, coupled with outstanding customer
                                    service, has helped us develop a strong reputation in the industry with our
                                    suppliers and clients that continues today </li>

                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-2.jpg" alt="" class="img-fluid img-border">
                        </div>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-3">
                    <div class="row">
                        <div style="font-size:15px;" class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Sustainability in sourcing</h3>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Sustainability and ethical sourcing are very
                                    important to today’s consumers and global communities. Our definition of sustainable
                                    goes beyond environmental impacts and regenerative food production. We also strive
                                    to purchase from suppliers that observe socially responsible farming and harvesting
                                    practices. The impact that this has on communities can create positive change that
                                    lasts for generations. This leads to improved education, health care,
                                    infrastructure, and global food security.</li>
                                <li><i class="bi bi-check2-all"></i> We believe in working together to find inventive
                                    ways to make a positive contribution to an ever-changing world.</li>

                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-3.jpg" alt="" class="img-fluid img-border">
                        </div>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-4">
                    <div class="row">
                        <div style="font-size:15px;" class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Commitment to Ourselves & Our Customerst</h3>
                            <p class="fst-italic">
                                We’ve made a commitment to ourselves and our customers to always operate responsibly
                                with people in mind. The commodity industry can be difficult to regulate, and
                                unfortunately, some companies are only in the business to move products and make
                                profits. Limson is interested in making a difference for our customers while at the same
                                time supporting the communities that specialize in producing and supplying those
                                products.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> A combination of multi-sourcing, component buying,
                                    risk management and volume leverage put us in a low-cost position across the
                                    commodities we manage. In 2020 NATL was merged with Limson Trading by commodity
                                    category..</li>
                                <li><i class="bi bi-check2-all"></i> Our experience in procurement, quality control,
                                    logistics, warehousing, sales and marketing, coupled with outstanding customer
                                    service, has helped us develop a strong reputation in the industry with our
                                    suppliers and clients that continues today.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-4.jpg" alt="" class="img-fluid img-border">
                        </div>
                    </div>
                </div><!-- End tab content item -->

            </div>

        </div>
    </section><!-- End Features Section -->	 	

<!-- ======= Product Category Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Product Category</h2>
            <p>Our product line includes sea-caught and aquaculture shrimps, both raw and cooked, processed according to customer specifications.</p>
        </div>
        <div class="swiper-container black-tiger-shrimp-slider">
            <div class="swiper-wrapper">
                @foreach($product_category as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('guest_product.show', ['id' => $product->id]) }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('/' . $product->image_path) }}" alt="{{ $product->name }}">
                            <h3 class="product-title">{{ $product->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination black-tiger-pagination"></div>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
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
            480: { slidesPerView: 1, spaceBetween: 10 },
            768: { slidesPerView: 2, spaceBetween: 15 },
            1024: { slidesPerView: 3, spaceBetween: 20 },
        }
    });
</script>
@endsection
