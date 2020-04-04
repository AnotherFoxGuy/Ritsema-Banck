<?php


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($message)) {
        header("Location: /contact.php?contact=empty&name=$name&email=$email&message=$message");
        exit();
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        header("Location: /contact.php?contact=char&name=$name&email=$email&message=$message");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /contact.php?contact=invalidemail&name=$name&email=$email&message=$message");
        exit();
    } else {
        $to = "janminne@gmail.com"; // this is your Email address
        $subject = "Contact form: " . $name;
        $message = "Naam: " . $name . "\n" . "Emailadres: " . $email . "\n" . "Bericht:" . "\n\n" . $message;
        $headers = "From: " . $email;
        mail($to, $subject, $message, $headers);
        mail($email, "Kopie mail contactformulier", $message, "From: Ritsema Banck");

        header('Location: /customer/received.php?submitted_form=contact');
        exit();
    }
}

function form_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
