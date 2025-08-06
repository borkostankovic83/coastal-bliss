<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Gallery";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Gallery";
	require_once('parts/page-title.php');
?>

<!-- Gallery Section -->

  
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaP1GqF2zQe1Ym8HICTcVJLmqo5T6QKp3YkF0hYW8RkG5q5n3W7fNQ8An3g"
    crossorigin="anonymous"/>
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" /> 
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      color: #333;
    }
    .gallery-section {
      background: #fff;
      padding: 60px 0;
    }
    .gallery-title {
      font-size: 2rem;
      margin-bottom: 30px;
      text-align: center;
      color: #2a3f54;
    }
    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 8px;
    }
    .gallery-item img {
      transition: transform 0.3s ease;
    }
    .gallery-item:hover img {
      transform: scale(1.05);
    }
    .gallery-item .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.4);
      opacity: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.3s ease;
    }
    .gallery-item:hover .overlay {
      opacity: 1;
    }
    .overlay i {
      font-size: 2rem;
      color: #fff;
    }
    .about-section {
      padding: 60px 0;
    }
    .about-text h2 {
      color: #2a3f54;
    }
    .about-text p {
      line-height: 1.6;
    }
  </style>

  <!-- About Section -->
  <section class="about-section container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="images/front.jpg" alt="Coastal Bliss Spa Interior" class="img-fluid rounded">
      </div>
      <div class="col-md-6 about-text">
        <h2>Welcome to Coastal Bliss Wellness</h2>
        <p>At Coastal Bliss, we believe in holistic wellness and personalized care. Founded by friends Vesna Josic and Milena Stankovic, our mission is to create a serene environment where every guest feels valued from "good morning to goodbye." We offer facials, massages, lash & brow services, waxing, manicures, and pedicures using natural and organic products whenever possible.</p>
        <p>Located at 323C Rehoboth Ave, we opened our doors on June 18, 2025. Whether you’re from the local community or visiting the coast, we invite you to experience true relaxation and rejuvenation.</p>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="gallery-section">
    <div class="container">
      <h2 class="gallery-title">Our Space in Photos</h2>
      <div class="row g-3">
        <!-- Repeat this block for each image -->
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery1.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery1.jpg" alt="Cozy manicure station" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery2.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery2.jpg" alt="Tranquil treatment room" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <!-- <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery7.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery7.jpg" alt="Reception area" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div> -->
        <!-- <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery4.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery4.jpg" alt="Natural products display" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div> -->
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery5.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery5.jpg" alt="Co-founders Vesna & Milena" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery6.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery6.jpg" alt="Coastal decor detail" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS & Lightbox JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeo1vF7B2wQp6i7P9E2c6Z8nW3o2gotJ3ql6WZBA4M8g4JGH" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script>
    const lightbox = GLightbox({ selector: '.glightbox' });
  </script>
</body>
</html>


<!-- End Gallery Section -->

<?php require_once('parts/footer/footer.php'); ?>