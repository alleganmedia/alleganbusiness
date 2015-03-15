<?php

include realpath($_SERVER["DOCUMENT_ROOT"]).'/includes/includes.php';

/* Featured. */
$query = "SELECT * FROM `businesses` WHERE `featured` = 1 ORDER BY `title` ASC";
$results = mysql_query($query);

$f = 0;
while($row = mysql_fetch_assoc($results)){
  $featured[$f] = $row;
  $f = $f + 1;
}
/* ToDO:
   - Random 3 featured
*/

/* Listings. */
$query = "SELECT * FROM `businesses` ORDER BY `title` ASC";
$results = mysql_query($query);

$l = 0;
while($row = mysql_fetch_assoc($results)){
  $listings[$l] = $row;
  $l = $l + 1;
}
/* ToDO:
   - Dedupe listings/featured.
*/



?>
<?php include $root.'/includes/header.php'; ?>

        <div class="col-sm-7 col-sm-offset-3 col-md-8 col-md-offset-2 main">
          <h1 class="page-header">Allegan Business Directory</h1>

          <div class="row placeholders">
<?php foreach($featured as $f): ?>
            <div class="col-xs-4 col-sm-4 placeholder">
              <a href="/business/<?php echo $f['slug']; ?>"><img src="/static/img/logos/<?php echo $f['logo']; ?>.png" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4><?php echo $f['title']; ?></h4>
              <span class="text-muted">
                <?php echo $f['slogan']; ?><br/>
                <a href="/business/<?php echo $f['slug']; ?>">Read more.</a>
              </span>
            </div>
<?php endforeach; ?>
          </div>

<?php $i = 1; ?>
<?php foreach($listings as $l): ?>
<?php if($i - 1 % 6 == 0): ?>
          <div class="row placeholders">
<?php endif; ?>
            <div class="col-xs-2 col-sm-2 placeholder">
              <a href="/business/<?php echo $l['slug']; ?>"><img src="/static/img/logos/<?php echo $l['logo']; ?>.png" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4><?php echo $l['title']; ?></h4>
              <span class="text-muted">
                <?php echo $l['slogan']; ?><br/>
                <a href="/business/<?php echo $l['slug']; ?>">Read more.</a>
              </span>
            </div>
<?php if($i % 6 == 0): ?>
          </div>
<?php endif; ?>
<?php $i += 1; ?>
<?php endforeach; ?>
        </div>


<?php include $root.'/includes/footer.php'; ?>