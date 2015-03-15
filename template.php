<?php

if(!isset($_COOKIE['session'])){
  header('Location:/login.php');
  die();
}

include realpath($_SERVER["DOCUMENT_ROOT"]).'/includes/includes.php';

?>
<?php include $root.'/includes/header.php'; ?>


    <p>{{ Content }}</p>

<?php include $root.'/includes/footer.php'; ?>