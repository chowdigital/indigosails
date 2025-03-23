document.addEventListener("DOMContentLoaded", function () {
  /// Dynamic Title Start

  const titles = document.querySelectorAll(".dynamic-title");

  const detectWrapping = (title) => {
    const lineHeight = parseFloat(getComputedStyle(title).lineHeight);
    const titleHeight = title.offsetHeight;

    // Add a class if the title wraps to a second line
    if (titleHeight > lineHeight) {
      title.classList.add("wrap-two-lines");
    } else {
      title.classList.remove("wrap-two-lines");
    }
  };

  const detectWrappingForAll = () => {
    titles.forEach((title) => detectWrapping(title));
  };

  // Run detection on load and resize
  detectWrappingForAll();
  window.addEventListener("resize", detectWrappingForAll);

  /// Dynamic Title End
  /// Accordian End
  const accordionHeaders = document.querySelectorAll(".accordion-header");

  accordionHeaders.forEach((header) => {
    header.addEventListener("click", function () {
      const currentContent = this.nextElementSibling;

      // Close all other accordions
      accordionHeaders.forEach((otherHeader) => {
        const otherContent = otherHeader.nextElementSibling;

        if (otherHeader !== this) {
          otherHeader.classList.remove("active"); // Remove active class from others
          otherContent.style.maxHeight = null; // Collapse other contents
        }
      });

      // Toggle the current accordion
      this.classList.toggle("active");
      if (currentContent.style.maxHeight) {
        currentContent.style.maxHeight = null; // Collapse
      } else {
        currentContent.style.maxHeight = currentContent.scrollHeight + "px"; // Expand
      }
    });
  });
  /// Accordian End

  /// Scroll Nav Start
  const navbar = document.querySelector(".navbar");
  const scrollThreshold = 50; // Scroll position to trigger the class

  window.addEventListener("scroll", function () {
    if (window.scrollY > scrollThreshold) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });
  /// Scroll Nav End
  /// Nav close on click
  const navToggle = document.getElementById("nav-toggle");
  const menuItems = document.querySelectorAll(".menu-items a");

  menuItems.forEach((item) => {
    item.addEventListener("click", () => {
      if (navToggle.checked) {
        navToggle.checked = false;
      }
    });
  });
  /// Nav close on click end
  /// form js

  /// form js end
});

/// JQuery Start
jQuery(document).ready(function ($) {
  /// Slider Start
  if ($("#responsive").data("lightslider-initialized")) {
    return; // Prevent re-initialization
  }

  $("#responsive").lightSlider({
    item: 3,
    slideMargin: parseInt(
      getComputedStyle(document.documentElement).getPropertyValue(
        "--universal-gap"
      )
    ), // Use the universal gap variable
    loop: true,
    slideMove: 1,
    easing: "cubic-bezier(0.25, 0, 0.25, 1)",
    speed: 1000,
    auto: true,
    enableTouch: true,
    pauseOnHover: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          item: 2,
          slideMove: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          item: 1,
          slideMove: 1,
        },
      },
    ],
  });

  // Mark the slider as initialized
  $("#responsive").data("lightslider-initialized", true);
  /// Slider End
  /// Google Reviews Start

  if ($("#googleReviewsSlider").data("lightslider-initialized")) {
    return; // Prevent re-initialization
  }

  $("#googleReviewsSlider").lightSlider({
    item: 1,
    slideMargin: 0,
    loop: true,
    slideMove: 1,
    speed: 1000,
    auto: true,
    enableTouch: true,
    pauseOnHover: true,
    pager: true,
    controls: true,
    pause: 3000,
    prevHtml:
      '<img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.svg" class="custom-arrow left" alt="Previous" />',
    nextHtml:
      '<img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.svg" class="custom-arrow" alt="Next" />',
  });

  // Mark the slider as initialized
  $("#googleReviewsSlider").data("lightslider-initialized", true);
  /// Google Reviews End
});

/// JQuery End
