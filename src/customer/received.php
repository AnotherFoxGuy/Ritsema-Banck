<?php require __DIR__ . '/../includes/navbar.php';

$submitted_form = $_GET['submitted_form']
?>

<?php
if (isset($_GET['mortgage'])) {
    $mortgage = $_GET['mortgage'];
    $message_mortgage_request = "U komt in aanmerking voor een hypotheek van €" .$mortgage. ",-";
}

$message_contact = "Bedankt, we nemen zo spoedig mogelijk contact met u op.";


$startMessage = "<div class=\"row toppad\"><div class=\"five wide centered container\"><div class=\"ten wide container\"><h2>";
$endMessage = "</h2></div></div></div>";


if ($submitted_form == "contact") {
    echo $startMessage . $message_contact . $endMessage;
} elseif ($submitted_form == "mortgage_request") {
    echo $startMessage . $message_mortgage_request . $endMessage;
}
?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
