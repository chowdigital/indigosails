document.addEventListener("DOMContentLoaded", function () {
  const delayedElements = document.querySelectorAll(".lux-reveal");
  const textElements = document.querySelectorAll(".text-reveal");

  // Queue system for delayed reveals (images)
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
      rootMargin: "0px 0px -10% 0px", // trigger when element is about 70% into view
    }
  );

  delayedElements.forEach((el) => delayedObserver.observe(el));

  function processQueue() {
    if (isRunning || queue.length === 0) return;

    isRunning = true;
    const el = queue.shift();

    // Wait 200ms before triggering the animation
    setTimeout(() => {
      el.classList.add("in-view");

      // Then wait the usual delay before processing the next
      setTimeout(() => {
        isRunning = false;
        processQueue();
      }, minDelay);
    }, 100); // 👈 Initial scroll delay
  }

  // Leave your textObserver as-is
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
//// Reviews Ticker

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".ticker-slider", {
    type: "loop",
    drag: true,
    arrows: false,
    pagination: false,
    autoWidth: true, // ✅ tells Splide not to set width inline
    perPage: 1, // ✅ avoids forced 100% width
    /* autoScroll: {
      speed: 1.5,
      pauseOnHover: true,
      pauseOnFocus: true,
      pauseOnTouch: true,
    },*/
  }).mount(window.splide.Extensions);
});

/// Profiles
document.addEventListener("DOMContentLoaded", () => {
  const profiles = document.querySelectorAll(".profile");
  let hoverTimer = null;
  let activeProfile = document.querySelector(".profile.active");

  profiles.forEach((profile) => {
    profile.addEventListener("mouseenter", () => {
      clearTimeout(hoverTimer);

      hoverTimer = setTimeout(() => {
        // Remove active & ready from current profile
        if (activeProfile && activeProfile !== profile) {
          activeProfile.classList.remove("active", "ready");
        }

        // Add active class to new profile
        profile.classList.add("active");
        activeProfile = profile;

        // Small delay to trigger fade-in of content
        setTimeout(() => {
          profiles.forEach((p) => {
            if (p !== profile) {
              p.classList.add("ready");
            } else {
              p.classList.remove("ready");
            }
          });
        }, 300); // slight delay so width animation starts first
      }, 100); // 200ms hover delay before triggering change
    });

    profile.addEventListener("mouseleave", () => {
      clearTimeout(hoverTimer);
    });
  });
});

/// Profiles Mobile Splide
document.addEventListener("DOMContentLoaded", () => {
  if (window.matchMedia("(max-width: 1024px)").matches) {
    const mobileSplide = document.querySelector(
      ".section-profiles-mobile.splide"
    );
    console.log("mobileSplide found:", mobileSplide); // ✅ Check it exists
    if (mobileSplide) {
      console.log("Mounting Splide…"); // ✅ You should see this
      new Splide(mobileSplide, {
        type: "slide",
        perPage: 1,
        arrows: false,
        pagination: true,
        autoHeight: true, // 👈 makes height match current slide
      }).mount();
    }
  }
});
let splideInstance = null;
let isMobile = window.matchMedia("(max-width: 1024px)").matches;

function initMobileSplide() {
  const mobileSplide = document.querySelector(
    ".section-profiles-mobile.splide"
  );
  if (mobileSplide && !mobileSplide.classList.contains("is-initialized")) {
    splideInstance = new Splide(mobileSplide, {
      type: "slide",
      perPage: 1,
      height: "100vh",
      arrows: false,
      pagination: true,
    });
    splideInstance.mount();
  }
}

function destroyMobileSplide() {
  if (splideInstance) {
    splideInstance.destroy();
    splideInstance = null;
  }
}

// Initial load
window.addEventListener("load", () => {
  if (isMobile) {
    initMobileSplide();
  }
});

// Watch for resize
window.addEventListener("resize", () => {
  const nowMobile = window.matchMedia("(max-width: 1024px)").matches;

  if (nowMobile && !isMobile) {
    // Switched to mobile
    initMobileSplide();
  } else if (!nowMobile && isMobile) {
    // Switched to desktop
    destroyMobileSplide();
  }

  isMobile = nowMobile;
});
