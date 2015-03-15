<?php

include realpath($_SERVER["DOCUMENT_ROOT"]).'/includes/includes.php';

/* ID from rewrite. */
if(isset($_GET['id'])){
  $id = $_GET['id'];
} else {
  #die();
}

/* Category. */
$query = "SELECT * FROM `businesses` WHERE `slug` = '$id'";
$results = mysql_query($query);
$business = mysql_fetch_assoc($results);

/* Format address. */
$business_address = "";
if($business['address']){
  $a = $business['address'];
  $b = explode(' ', $a);
  foreach($b as $c){
    $business_address .= $c;
    $business_address .= '+';
  }
  $business_address = substr_replace($business_address ,"",-1);
}

?>
<?php include $root.'/includes/header.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
          <h1 class="page-header"><?php echo $business['title']; ?></h1>

          <div class="col-xs-6 col-sm-6 placeholder">
            <img src="/static/img/logos/<?php echo $business['logo']; ?>.png" class="img-responsive">
          </div>
          <div class="col-xs-6 col-sm-6 placeholder">
            <h2><?php echo $business['slogan']; ?></h2>
          </div>

          <div class="col-xs-12 col-sm-12 placeholder">

            <?php if($business['url']): ?>

            <div id="website" class="placeholder-detail">
              <img src="/static/img/icons/world.png"> <a href="<?php echo $business['url']; ?>"><?php echo $business['title']; ?></a><br />
            </div>

            <?php endif; ?>

            <?php if($business['email']): ?>

            <div id="email" class="placeholder-detail">
              <img src="/static/img/icons/email.png"> <a href="mailto:<?php echo $business['email']; ?>"><?php echo $business['email']; ?></a><br />
            </div>

            <?php endif; ?>

            <?php if($business['phone']): ?>

            <div id="phone" class="placeholder-detail">
              <img src="/static/img/icons/phone.png"> <a href="tel:<?php echo $business['phone']; ?>"><?php echo $business['phone']; ?></a>
            </div>

            <?php endif; ?>

          </div>

          <?php if($business['address']): ?>

          <div class="col-xs-12 col-sm-12 placeholder">
            <div class="Flexible-container">
                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $business_address; ?>&amp;aq=&amp;ie=UTF8&amp;hq=&amp;z=20&amp;output=embed&amp;iwloc=near"></iframe>
            </div>
          </div>

          <?php endif; ?>

        </div>


<?php include $root.'/includes/footer.php'; ?>