<?php

include realpath($_SERVER["DOCUMENT_ROOT"]).'/includes/includes.php';

/* ID from rewrite. */
if(isset($_GET['id'])){
  $id = $_GET['id'];
} else {
  die();
}

/* Category. */
$query = "SELECT * FROM `categories` WHERE `slug` = '$id'";
$results = mysql_query($query);
$category = mysql_fetch_assoc($results);

$cat_id = $category['id'];
$cat_title = $category['title'];

/* Mmm, listings. */
$query = "SELECT * FROM `businesses` WHERE `category` = '$cat_id' ORDER BY `title` ASC";
$results = mysql_query($query);

$l = 0;
while($row = mysql_fetch_assoc($results)){
  $listings[$l] = $row;
  $l = $l + 1;
}

?>
<?php include $root.'/includes/header.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
          <h1 class="page-header"><?php echo $cat_title; ?></h1>

          <div class="row placeholders">
<?php foreach($listings as $l): ?>
            <div class="col-xs-2 col-sm-2 placeholder">
              <a href="/business/<?php echo $l['slug']; ?>"><img src="/static/img/logos/<?php echo $l['logo']; ?>.png" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4><?php echo $l['title']; ?></h4>
              <span class="text-muted">
                <?php echo $l['slogan']; ?><br/>
                <a href="/business/<?php echo $l['slug']; ?>">Read more.</a>
              </span>
            </div>
<?php endforeach; ?>
          </div>
        </div>


<?php include $root.'/includes/footer.php'; ?>