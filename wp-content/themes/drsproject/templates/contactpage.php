<?php
/* Template Name: Contact */

get_header();
?>

<div class="contact-intro">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-md-12 col-12">
        <h1>Vind vandaag uw <em>kantoor</em> van morgen.</h1>
        <div class="contact-section">
          <div class="contact-form">
            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
          </div>
        </div>
        <!-- <div class="contact-map">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/drs-map-amsterdam.webp" class="img-fluid" alt="">
        </div> -->
      </div>
    </div>
  </div>
</div>

<div class="icon-content">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-md-4 col-12 icon-div">
        <div class="media">
          <img class="mr-3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="">
          <div class="media-body">
            <h3>Wereldspeler in Amsterdam</h3>
            <p>DRS, in 30 jaar uitgegroeid van dé vastgoedmakelaar van Groot Amsterdam tot een wereldspeler in Nederland en ver daarbuiten.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-4 col-12 icon-div">
        <div class="media">
          <img class="mr-3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/network.svg" alt="">
          <div class="media-body">
            <h3>Een scherp oog voor uw kansen</h3>
            <p>DRS heeft een goede neus voor kansen en een scherp oog voor de beste deal. Wij maken ons sterk voor uw belangen. Creatief, alert en betrokken.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-4 col-12 icon-div">
        <div class="media">
          <img class="mr-3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" alt="">
          <div class="media-body">
            <h3>Dé allround specialist in vastgoed</h3>
            <p>Voor álle zaken in en rond vastgoed, bent u van harte welkom bij DRS. Of u nou een wereldspeler bent of op zoek naar uw allereerste kantoor.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
?>