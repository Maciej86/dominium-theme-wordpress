const dominiumCounter = () => {
  document.addEventListener("DOMContentLoaded", () => {
    const elementCounters = document.querySelectorAll(".js-counter");
    if (!elementCounters.length) return;

    const elementSectionCounter = document.querySelector(".js-count");
    if (!elementSectionCounter) return;

    const speed = 100;
    let started = false;

    const animateCounter = (counter) => {
      const target = +counter.dataset.count;
      let count = 0;

      const updateCount = () => {
        const increment = target / speed;

        if (count < target) {
          count += increment;
          counter.textContent = Math.ceil(count);
          requestAnimationFrame(updateCount);
        } else {
          counter.textContent = target;
        }
      };

      updateCount();
    };

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !started) {
            started = true;
            elementCounters.forEach((counter) => animateCounter(counter));
            observer.unobserve(elementSectionCounter);
          }
        });
      },
      { threshold: 0.7 }
    );

    observer.observe(elementSectionCounter);
  });
};
dominiumCounter();
