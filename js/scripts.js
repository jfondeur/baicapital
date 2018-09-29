(function($, root, undefined) {
  $(function() {
    "use strict";

    // Email form validation
    $(".infusion-form .btn").click(function(event) {
      var form = $(this).parents("form:first"); // Get Button Form Parent
      var emailField = $(form).find(".infusion-field-input"); // Get email field
      if ($(emailField).val() == "") {
        // Field validation
        $(form).addClass("animated shake"); // Adds shake animation
        $(emailField).addClass("is-invalid"); // Adds Red border
        // When animation stops removed animations classes
        $(form).one(
          "webkitAnimationEnd` mozAnimationEnd MSAnimationEnd oanimationend animationend",
          function() {
            $(this).removeClass("animated shake");
            $(emailField).removeClass("redError");
          }
        );
        event.preventDefault();
      }
    }); // ends email valiadion
  });
})(jQuery, this);
