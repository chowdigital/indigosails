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
    autoScroll: {
      speed: 1.5, // slower scroll
      pauseOnHover: true,
      pauseOnFocus: true,
      pauseOnTouch: true,
    },
  }).mount(window.splide.Extensions);
});
