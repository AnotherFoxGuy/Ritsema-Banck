<?php
require("token.php");
require("tok.php");
require("cookie.php");
// require('Pieter/PDF.php');

// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times', '', 12);
// for($i = 1; $i <= 10; $i++)
//       $pdf->Cell(0, 10, 'Belangrijke informatie', 0, 1);
// $pdf->Output();

$token = Token::encode("Pieter", 1585749601, 0);
print_r($token);

?>

<?php
// $key = "12345";
// //$key should have been previously generated in a cryptographically safe way, like openssl_random_pseudo_bytes
// $plaintext = "message to be encrypted";
// $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
// $iv = openssl_random_pseudo_bytes($ivlen);
// $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
// $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
// $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

// print($ciphertext);

// $c = base64_decode($ciphertext);
// $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
// $iv = substr($c, 0, $ivlen);
// $hmac = substr($c, $ivlen, $sha2len=32);
// $ciphertext_raw = substr($c, $ivlen+$sha2len);
// $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
// $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
// if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
// {
//     echo $original_plaintext."\n";
// }
?>
