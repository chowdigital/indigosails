// ================================
// 1. TEXT + IMAGE REVEAL ON SCROLL
// ================================

document.addEventListener("DOMContentLoaded", function () {
  const delayedElements = document.querySelectorAll(".lux-reveal");
  const textElements = document.querySelectorAll(".text-reveal");

  const queue = [];
  let isRunning = false;
  const minDelay = 120;

  const delayedObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (
          entry.isIntersecting &&
          !entry.target.classList.contains("in-view")
        ) {
          queue.push(entry.target);
          delayedObserver.unobserve(entry.target);
          processQueue();
        }
      });
    },
    {
      threshold: 0,
      rootMargin: "0px 0px -10% 0px",
    }
  );

  delayedElements.forEach((el) => delayedObserver.observe(el));

  function processQueue() {
    if (isRunning || queue.length === 0) return;

    isRunning = true;
    const el = queue.shift();

    setTimeout(() => {
      el.classList.add("in-view");

      setTimeout(() => {
        isRunning = false;
        processQueue();
      }, minDelay);
    }, 100);
  }

  const textObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (
          entry.isIntersecting &&
          !entry.target.classList.contains("in-view")
        ) {
          entry.target.classList.add("in-view");
          textObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2 }
  );

  textElements.forEach((el) => textObserver.observe(el));
});

// ================================
// 2. REVIEWS TICKER (DESKTOP LOOP)
// ================================

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".ticker-slider", {
    type: "loop",
    drag: true,
    arrows: false,
    pagination: false,
    autoWidth: true,
    perPage: 1,
  }).mount(window.splide.Extensions);
});

// ================================
// 3. DESKTOP PROFILES HOVER
// ================================

document.addEventListener("DOMContentLoaded", () => {
  const profiles = document.querySelectorAll(".section-profiles .profile");
  let hoverTimer = null;
  let activeProfile = document.querySelector(
    ".section-profiles .profile.active"
  );
  function activateFirstProfileIfNone() {
    const isDesktop = window.matchMedia("(min-width: 769px)").matches;
    const visible =
      document.querySelector(".section-profiles")?.offsetParent !== null;
    if (isDesktop && visible) {
      // Do nothing to ensure no profile is active on load
      activeProfile = null;
    }
  }

  profiles.forEach((profile) => {
    profile.addEventListener("mouseenter", () => {
      clearTimeout(hoverTimer);

      hoverTimer = setTimeout(() => {
        if (activeProfile && activeProfile !== profile) {
          activeProfile.classList.remove("active", "ready");
        }

        profile.classList.add("active");
        activeProfile = profile;

        setTimeout(() => {
          profiles.forEach((p) => {
            if (p !== profile) {
              p.classList.add("ready");
            } else {
              p.classList.remove("ready");
            }
          });
        }, 300);
      }, 100);
    });

    profile.addEventListener("mouseleave", () => {
      clearTimeout(hoverTimer);
    });
  });

  activateFirstProfileIfNone();
  window.addEventListener("resize", activateFirstProfileIfNone);
});

// ================================
// 4. MOBILE PROFILES SPLIDE INIT
// ================================

let mobileSplideInstance = null;

function initMobileSplide() {
  const isMobile = window.matchMedia("(max-width: 768px)").matches;
  const splideEl = document.querySelector(".section-profiles-mobile.splide");

  if (isMobile && splideEl && !splideEl.classList.contains("is-initialized")) {
    console.log("✅ Mounting Splide");
    mobileSplideInstance = new Splide(splideEl, {
      type: "slide",
      fixedWidth: "70vw",
      focus: "center",
      autoHeight: true,
      gap: "5vw",
      padding: { left: "10vw", right: "10vw" },
      arrows: false,
      pagination: true,
      autoplay: true,
      interval: 5000,
      contain: true, // ✅ prevents horizontal overflow
    }).mount();
  }
}

function maybeInitMobileSplide() {
  // Timeout ensures DOM has settled after resize
  setTimeout(() => {
    initMobileSplide();
  }, 200);
}

window.addEventListener("load", () => {
  initMobileSplide();
});

window.addEventListener("resize", () => {
  maybeInitMobileSplide();
});

// ================================
// 5. Video Splide
// ================================
document.addEventListener("DOMContentLoaded", function () {
  const videoSplide = new Splide(".pvid-splide", {
    type: "slide",
    cover: true,
    video: {
      loop: true,
    },
    pagination: true,
    arrows: true,
    // Removed autoplay and interval to disable auto sliding
  });

  videoSplide.mount(window.splide.Extensions.Video);
});

// ================================
// 6. Add images to editor
// ================================
jQuery(document).ready(function ($) {
  // Handle "Select Image" button click
  $(".select-image-button").on("click", function (e) {
    e.preventDefault();

    const targetInput = $(this).data("target");
    const previewImage = $("#" + targetInput + "_preview");
    const removeButton = $(this).siblings(".remove-image-button");

    // Create a new media uploader instance
    const mediaUploader = wp.media({
      title: "Select Image",
      button: {
        text: "Use This Image",
      },
      multiple: false,
    });

    // When an image is selected, run a callback
    mediaUploader.on("select", function () {
      const attachment = mediaUploader
        .state()
        .get("selection")
        .first()
        .toJSON();
      $("#" + targetInput).val(attachment.url); // Set the hidden input value
      previewImage.attr("src", attachment.url).show(); // Update the preview image
      removeButton.show(); // Show the "Remove Image" button
    });

    // Open the uploader dialog
    mediaUploader.open();
  });

  // Handle "Remove Image" button click
  $(".remove-image-button").on("click", function (e) {
    e.preventDefault();

    const targetInput = $(this).data("target");
    const previewImage = $("#" + targetInput + "_preview");

    $("#" + targetInput).val(""); // Clear the hidden input value
    previewImage.hide(); // Hide the preview image
    $(this).hide(); // Hide the "Remove Image" button
  });
});
//////

// ================================
// 7. Nav dropdown
// ================================
document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item-has-children > a");

  menuItems.forEach((menuItem) => {
    menuItem.addEventListener("click", function (e) {
      e.preventDefault(); // Prevent default link behavior

      const dropdown = this.nextElementSibling; // Get the sub-menu
      if (dropdown.classList.contains("show")) {
        dropdown.classList.remove("show"); // Hide the dropdown if already visible
      } else {
        // Hide other open dropdowns
        document.querySelectorAll(".sub-menu.show").forEach((openDropdown) => {
          openDropdown.classList.remove("show");
        });
        dropdown.classList.add("show"); // Show the clicked dropdown
      }
    });
  });
});
