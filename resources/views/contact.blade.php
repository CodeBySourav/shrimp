@extends('layouts.navbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Contact</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map"></i>
              <h3>Our Address</h3>
              <p>101 Merritt 7 Corporate Park 3rd Floor
              Norwalk, CT  06851 United States</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>newepolimson@gmail.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+91 9052989685</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-lg-6 ">
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122103.71422774483!2d81.72395548113933!3d16.987282143257612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a37a3f2440c9fff%3A0x86b24503e305ca21!2z4LCw4LC-4LCc4LCu4LC54LGH4LCC4LCm4LGN4LCw4LC14LCw4LCCLCDgsIbgsILgsKfgsY3gsLAg4LCq4LGN4LCw4LCm4LGH4LC24LGN!5e0!3m2!1ste!2sin!4v1709379733670!5m2!1ste!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
              <iframe
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.763721096759!2d-73.4350941!3d41.103625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e81e7722c672e7%3A0x347c839775eacb30!2sLimson%20Trading!5e0!3m2!1sen!2sus!4v1709379733670!5m2!1sen!2sus"
  frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>

          </div><!-- End Google Maps -->

          <div class="col-lg-6">
          <form action="{{ route('contact.store') }}" method="post" >
          @csrf  
          <div class="php-email-form">
              <div class="row gy-4">
              
                <div class="col-lg-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div> 
              
              <div class="text-center"><button type="submit">Send Message</button></div>
              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
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