<?php


if (isset($_POST['submit'])) {
    $birthdate = $_POST['birthdate'];
    $gross_anual_income = $_POST['gross_anual_income'];
    $input_money = $_POST['input_money'];
    $dept = $_POST['dept'];
    $purchase_price = $_POST['purchase_price'];
    $email = $_POST['email'];
    $mortgage_duration = $_POST['mortgage_duration'];

    //calculationvariables

    $housing_ratio = 0.265;
    $maximum_gross_mortgage_burden = $gross_anual_income * $housing_ratio;

    if ($mortgage_duration == 5) {
        $key_interest = 1.05;
    } elseif ($mortgage_duration == 10) {
        $key_interest = 1.036;
    } elseif ($mortgage_duration == 15) {
        $key_interest = 1.04;
    } else {
        $key_interest = 1.036;
    }

    $mortgage = $maximum_gross_mortgage_burden * $mortgage_duration * $key_interest;

    if (empty($birthdate) || empty($email)) {
        header("Location: /customer/mortgagerequest.php?mortgagerequest=empty&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration");
        exit();
    } elseif (!preg_match("^\\d{2}/\\d{2}/\\d{4}^", $birthdate)) {
        header("Location: /customer/mortgagerequest.php?mortgagerequest=invaliddate&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /customer/mortgagerequest.php?mortgagerequest=invalidemail&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration");
        exit();
    } elseif (!is_numeric($gross_anual_income) || !is_numeric($dept) || !is_numeric($purchase_price) || !is_numeric($mortgage_duration)) {
        header("Location: /customer/mortgagerequest.php?mortgagerequest=number&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration");
        exit();
    } else {
        header("Location: /customer/received.php?submitted_form=mortgage_request&mortgage=$mortgage");
        exit();
    }


//    || empty($gross_anual_income) || empty($input_money) || empty($dept) || empty($purchase_price) || empty($mortgage_duration)


//    else {
//        $to = "janminne@gmail.com"; // this is your Email address
//        $subject = "Contact form: " . $name;
//        $message = "Naam: " . $name . "\n" . "Emailadres: " . $email . "\n" . "Bericht:" . "\n\n" . $message;
//        $headers = "From: " . $email;
//        mail($to, $subject, $message, $headers);
//        mail($email, "Kopie mail contactformulier", $message, "From: Ritsema Banck");
//
//        header('Location: http://localhost/temp/jmh/index.php');
//        exit();
//    }
}
