<?php
// Include the reCaptcha library
require_once __DIR__ . "/libs/recaptcha-php/recaptchalib.php";

$privatekey = "your_private_key";

// reCaptcha looks for the POST to confirm
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

// If the entered code is correct it returns true (or false)
if ($resp->is_valid) {
  echo "true";
} else {
  echo "false";
}
?>