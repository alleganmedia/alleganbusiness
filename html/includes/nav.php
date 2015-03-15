<?php

/* Categories. */
$query = "SELECT * FROM `categories`";
$results = mysql_query($query);

$cat = 0;
while($row = mysql_fetch_assoc($results)){
  $categories[$cat] = $row;
  $cat = $cat + 1;
}

?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php echo $site_title; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
<?php foreach($categories as $c): ?>
            <li><a href="/category/<?php echo $c['slug']; ?>"><?php echo $c['title']; ?></a></li>
<?php endforeach; ?>
          </ul>
        </div>