// Displays the recpatcha form in the element with id "captcha"
Recaptcha.create("your_public_key", "captcha", {
  theme: "clean",
  callback: Recaptcha.focus_response_field
});

// Add reCaptcha validator to form validation
jQuery.validator.addMethod("checkCaptcha", (function() {
  var isCaptchaValid;
  isCaptchaValid = false;
  $.ajax({
    url: "libs/checkCaptcha.php",
    type: "POST",
    async: false,
    data: {
      recaptcha_challenge_field: Recaptcha.get_challenge(),
      recaptcha_response_field: Recaptcha.get_response()
    },
    success: function(resp) {
      if (resp === "true") {
        isCaptchaValid = true;
      } else {
        Recaptcha.reload();
      }
    }
  });
  return isCaptchaValid;
}), "");

// Validation
$("form").validate({
  rules: {
    // your rules here...

    // Add a rule for the reCaptcha field
    recaptcha_response_field: {
      required: true,
      checkCaptcha: true
    }
  },
  messages: {
    recaptcha_response_field: {
      checkCaptcha: "Your Captcha response was incorrect. Please try again."
    }
  },
  onkeyup: false,
  onfocusout: false,
  onclick: false
});