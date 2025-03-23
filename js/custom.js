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
    { threshold: 0.2 }
  );

  delayedElements.forEach((el) => delayedObserver.observe(el));

  function processQueue() {
    if (isRunning || queue.length === 0) return;

    isRunning = true;
    const el = queue.shift();
    el.classList.add("in-view");

    setTimeout(() => {
      isRunning = false;
      processQueue();
    }, minDelay);
  }

  // Instant observer for text reveals
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
