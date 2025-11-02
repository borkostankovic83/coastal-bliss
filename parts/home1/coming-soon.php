
<div class="container">
  <img src="images/bf-sale-2026.png" alt="Coastal Bliss Wellness Logo" >
</div>
<div class="container" style="margin-bottom: 2rem;">
  <div id="widget-placeholder"></div>
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
          type:'INLINE-WIDGET',
          label:'Book Appointment',
          labelColor:'#FFFFFF',         // Button text color
          iconColor:'#FFFFFF',          // Icon color
          backgroundColor:'#536DFE',    // Button background color
          disableIcon:false,
          targetSelector:'#widget-placeholder',
          buttonStyles: {
            // You can add more CSS properties here, for example:
            borderRadius: '8px',
            border: '2px solid #beac5a',
            background: '#beac5a',
            color: '#fff'
          }
        });
      }
    };
  })();
  </script>
</div>
<div style="margin-top: 20px"></div>
<div class="container">

  <!-- <div class="modal-body" style="height: 700px; padding: 0;">
    <iframe src="https://www.yocale.com/widget/coastal-bliss-wellness?locations=165570"
            width="100%" height="100%" frameborder="0" style="border: none;"></iframe>
  </div> -->

</div>