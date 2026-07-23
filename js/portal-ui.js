(function () {
  const finishPreloader = () => {
    document.body.classList.add("preloader-done");
  };

  const waitForImages = () => {
    const images = Array.from(document.images).filter((image) => !image.closest(".preloader"));
    if (!images.length) {
      finishPreloader();
      return;
    }

    let pending = images.length;
    const settle = () => {
      pending -= 1;
      if (pending <= 0) {
        finishPreloader();
      }
    };

    images.forEach((image) => {
      if (image.complete) {
        settle();
        return;
      }
      image.addEventListener("load", settle, { once: true });
      image.addEventListener("error", settle, { once: true });
    });
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", waitForImages, { once: true });
  } else {
    waitForImages();
  }

  const navToggle = document.querySelector(".nav-toggle");
  const navDrawer = document.querySelector(".nav-links");
  const drawerClose = document.querySelector(".drawer-close");
  const drawerScrim = document.querySelector(".drawer-scrim");

  const setDrawer = (open) => {
    document.body.classList.toggle("nav-open", open);
    if (navToggle) {
      navToggle.setAttribute("aria-expanded", open ? "true" : "false");
      navToggle.setAttribute("aria-label", open ? "Close navigation" : "Open navigation");
    }
  };

  navToggle?.addEventListener("click", () => {
    setDrawer(!document.body.classList.contains("nav-open"));
  });
  drawerClose?.addEventListener("click", () => setDrawer(false));
  drawerScrim?.addEventListener("click", () => setDrawer(false));
  navDrawer?.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setDrawer(false));
  });
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") setDrawer(false);
  });

  const selectors = [
    ".reveal",
    ".stat",
    ".info-card",
    ".event-card",
    ".quick-routes a",
    ".vc-portrait",
    ".vc-copy",
    ".portal-tabs a",
    ".chart-card",
    ".gallery-item",
    ".page-figure",
    ".table-wrap",
    ".feature-list li",
    ".action-grid a",
    ".stripe-gate-card",
    ".stripe-vc-frame"
  ];

  const items = document.querySelectorAll(selectors.join(","));
  items.forEach((item, index) => {
    item.classList.add("reveal");
    item.style.transitionDelay = `${Math.min(index % 6, 5) * 55}ms`;
  });

  if (!("IntersectionObserver" in window)) {
    items.forEach((item) => item.classList.add("is-visible"));
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  items.forEach((item) => observer.observe(item));

  const counters = document.querySelectorAll(".counter[data-count]");
  const animateCounter = (counter) => {
    const target = Number(counter.dataset.count || 0);
    const duration = 1400;
    const start = performance.now();
    const tick = (now) => {
      const progress = Math.min(1, (now - start) / duration);
      const eased = 1 - Math.pow(1 - progress, 3);
      counter.textContent = Math.round(target * eased).toLocaleString();
      if (progress < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  if (!("IntersectionObserver" in window)) {
    counters.forEach(animateCounter);
    return;
  }

  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        counterObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach((counter) => counterObserver.observe(counter));

  // Hero Slider
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".pager-dot");
  if (slides.length > 0) {
    let currentSlide = 0;
    let slideInterval;

    const showSlide = (index) => {
      slides.forEach((slide) => slide.classList.remove("active"));
      if (dots.length > 0) {
        dots.forEach((dot) => dot.classList.remove("active"));
      }
      
      currentSlide = (index + slides.length) % slides.length;
      slides[currentSlide].classList.add("active");
      if (dots.length > 0 && dots[currentSlide]) {
        dots[currentSlide].classList.add("active");
      }
    };

    const nextSlide = () => {
      showSlide(currentSlide + 1);
    };

    const startInterval = () => {
      stopInterval();
      slideInterval = setInterval(nextSlide, 6000);
    };

    const stopInterval = () => {
      if (slideInterval) clearInterval(slideInterval);
    };

    if (dots.length > 0) {
      dots.forEach((dot) => {
        dot.addEventListener("click", () => {
          const targetIndex = parseInt(dot.getAttribute("data-goto"), 10);
          showSlide(targetIndex);
          startInterval(); // reset interval on manual click
        });
      });
    }

    // Start auto slider
    startInterval();
  }

  // Scroll-to-top show/hide logic
  const scrollTopBtn = document.querySelector(".scroll-top-btn");
  if (scrollTopBtn) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 300) {
        scrollTopBtn.classList.add("show");
      } else {
        scrollTopBtn.classList.remove("show");
      }
    });
  }
})();
