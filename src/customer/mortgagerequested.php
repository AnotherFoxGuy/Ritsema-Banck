<?php
require __DIR__ . '/../includes/navbar.php';
require __DIR__ . '/mortgagevalidations.php';
?>


<?php
$mortgage = $_GET['mortgage'];

?>
<h1>De maximale hypotheek die u kunt krijgen is <?php echo $mortgage ?></h1>


<?php require __DIR__ . '/../includes/footer.php'; ?>
