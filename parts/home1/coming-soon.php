
<div class="container">
  <img src="images/bf-sale-2026.png" alt="Coastal Bliss Wellness Logo" >
</div>

<div class="container-fluid">
  <?php
$apiKey = 'AIzaSyCbKyOl-dKHONVxbqScOMBQOlaJ9Uju_zI';
$placeId = 'ChIJ6fGQyIG3uIkRs_LIBvlYUNI';

$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$placeId&fields=name,rating,reviews,user_ratings_total&key=$apiKey";
$response = file_get_contents($url);
$data = json_decode($response, true);

$reviews = $data['result']['reviews'] ?? [];
?>

<!-- ✅ Include Bootstrap 5 (add this to your <head> if not already there) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container-fluid py-5 bg-light">
  <h2 class="text-center mb-4 fw-bold">What Our Customers Say</h2>
<div class="d-flex justify-content-end pe-4 mt-4">
  <a
    href="https://search.google.com/local/writereview?placeid=ChIJ6fGQyIG3uIkRs_LIBvlYUNI"
    target="_blank"
    class="btn btn-warning btn-lg fw-semibold px-4 py-2 shadow-sm"
  >
    ★ Review Us on Google
  </a>
</div>


  <?php if (!empty($reviews)): ?>
    <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php foreach ($reviews as $index => $review): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="d-flex justify-content-center">
              <div class="card shadow-sm border-0 mx-3" style="max-width: 700px;">
                <div class="card-body text-center">
                  <h5 class="card-title fw-semibold"><?= htmlspecialchars($review['author_name']) ?></h5>
                  <p class="text-warning mb-2">
                    <?php for ($i = 0; $i < $review['rating']; $i++) echo "⭐"; ?>
                  </p>
                  <p class="card-text fst-italic text-muted">"<?= htmlspecialchars($review['text']) ?>"</p>
                </div>
                <div class="card-footer bg-white border-0 text-end">
                  <small class="text-secondary">
                    <?= date("F j, Y", strtotime($review['time'])) ?>
                  </small>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  <?php else: ?>
    <p class="text-center text-muted">No reviews available.</p>
  <?php endif; ?>
</div>



<!-- <script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-e43999ba-f7b1-4df8-961c-cc0b7b077d63" data-elfsight-app-lazy></div> -->
</div>
<div style="margin-top: 20px"></div>
    <div class="embedsocial-hashtag" data-ref="2082f57e6c1dfcf1aee3e702453c811610349aac"> <a class="feed-powered-by-es feed-powered-by-es-slider-img es-widget-branding" href="https://embedsocial.com/social-media-aggregator/" target="_blank" title="Instagram widget"> <img src="https://embedsocial.com/cdn/icon/embedsocial-logo.webp" alt="EmbedSocial"> <div class="es-widget-branding-text">Instagram widget</div> </a> </div> <script> (function(d, s, id) { var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js); }(document, "script", "EmbedSocialHashtagScript")); </script>
</div>
<script>
  (function() {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = 'https://app.yocale.com/tentacle/tentacle.v1.0.0.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
    s.onload = s.onreadystatechange = function() {
      if (!this.readyState || this.readyState === 'complete') {
        Tentacle.run({
          business: 'coastal-bliss-wellness',
          type:'FLOATING',
          label:'Book Appointment',
          labelColor:'#FFFFFF',
          iconColor:'#FFFFFF',
          backgroundColor:'#9CD948',
          disableIcon:false,
          buttonStyles:{}
        });
      }
    };
  })();
  </script>

  <style>
.card {
  border-radius: 1rem;
}
.card-text {
  font-size: 1.1rem;
  line-height: 1.6;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
  filter: invert(1);
}
@media (max-width: 768px) {
  .card {
    margin: 0 1rem;
  }
}
.btn-warning {
  background-color: #fbbc05;
  border: none;
  transition: all 0.3s ease;
}
.btn-warning:hover {
  background-color: #e0a800;
  transform: translateY(-2px);
}
@media (max-width: 768px) {
  .d-flex.justify-content-end {
    justify-content: center !important; /* center the button on mobile */
  }
}


</style>