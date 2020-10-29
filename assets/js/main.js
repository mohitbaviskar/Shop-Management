(function ($) {
  "use strict";

  $(window).on("load", function () {
    /*
    Adding additional status and creation time to all forms
    */
    $("#form").submit(function (eventObj) {
      // if()
      const password = document.querySelector(
        "#form input[type=password][name=password]"
      );
      const confirmPassword = document.querySelector(
        "#form input[type=password][name=confirmPassword]"
      );

      // If password not entered
      if (password.value == "") {
        alert("Please enter Password");
        password.classList.add("is-invalid");
        password.focus();
        return false;
      }
      // If confirm password not entered
      else if (confirmPassword.value == "") {
        alert("Please enter password again");
        confirmPassword.classList.add("is-invalid");
        confirmPassword.focus();
        return false;
      }
      // If Not same return False.
      else if (password.value != confirmPassword.value) {
        alert("\nPasswords did not match. Please try again.");
        confirmPassword.classList.add("is-invalid");
        confirmPassword.focus();
        return false;
      }

      const userEmail = document.querySelector("#form input[name=userEmail]")
        .value;
      const userPassword = password.value;

      $("<input />")
        .attr("type", "hidden")
        .attr("name", "status")
        .attr("value", "new")
        .appendTo("#form");

      $("<input />")
        .attr("type", "hidden")
        .attr("name", "creationDate")
        .attr("value", Date.now())
        .appendTo("#form");

      return true;
    });

    /*Page Loader active
    ========================================================*/
    $("#preloader").fadeOut();

    // Sticky Nav
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 200) {
        $(".scrolling-navbar").addClass("top-nav-collapse");
      } else {
        $(".scrolling-navbar").removeClass("top-nav-collapse");
      }
    });

    /* ==========================================================================
       countdown timer
       ========================================================================== */
    jQuery("#clock").countdown("2020/08/05", function (event) {
      var $this = jQuery(this).html(
        event.strftime(
          "" +
            '<div class="time-entry days"><span>%-D</span> Days</div> ' +
            '<div class="time-entry hours"><span>%H</span> Hours</div> ' +
            '<div class="time-entry minutes"><span>%M</span> Minutes</div> ' +
            '<div class="time-entry seconds"><span>%S</span> Seconds</div> '
        )
      );
    });

    /* slicknav mobile menu active  */
    $(".mobile-menu").slicknav({
      prependTo: ".navbar-header",
      parentTag: "liner",
      allowParentLinks: true,
      duplicate: true,
      label: "",
    });

    /* WOW Scroll Spy
    ========================================================*/
    var wow = new WOW({
      //disabled for mobile
      mobile: false,
    });
    wow.init();

    /* Nivo Lightbox 
    ========================================================*/
    $(".lightbox").nivoLightbox({
      effect: "fadeScale",
      keyboardNav: true,
    });

    // one page navigation
    $(".navbar-nav").onePageNav({
      currentClass: "active",
    });

    /* Back Top Link active
    ========================================================*/
    var offset = 200;
    var duration = 500;
    $(window).scroll(function () {
      if ($(this).scrollTop() > offset) {
        $(".back-to-top").fadeIn(400);
      } else {
        $(".back-to-top").fadeOut(400);
      }
    });

    $(".back-to-top").on("click", function (event) {
      event.preventDefault();
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        600
      );
      return false;
    });

    $(".popup-chat").on("click", function (event) {
      event.preventDefault();
      $(".chat-popup-container").fadeIn(400);
      return false;
    });
    $(".close-chat").on("click", function (event) {
      event.preventDefault();
      $(".chat-popup-container").fadeOut(400);
      return false;
    });
  });
})(jQuery);

$("#order-add-dish").click(function () {
  var markup = `<tr>
              <td><input
                    type="text"
                    class="form-control"
                    name="object"
                    placeholder="Enter dish name here"
                  /></td>
              <td><input
                   type="text"
                   class="form-control"
                   name="object"
                   placeholder="Enter quantity here"
                  /></td>
              <td>
                  
                  <button
                      type="button"
                      href=""
                      class="btn btn-common btn-nv-sty"
                      onclick="$(this).parent().parent().remove()">Delete</button>
              </td>
          </tr>`;

  $(this).parent().siblings("#orders").append(markup);
});
